<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Services\HelperService;
use App\Mail\ApplicationReceivedMail;
use App\Mail\ApplicationSubmittedMail;
use App\Models\AdmissionCheckLog;
use App\Models\Application as ApplicationModel;
use App\Models\CTA;
use App\Models\Programme;
use App\Models\WebsiteNewsBar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        $isAdmissionOpen = HelperService::getSettings()->is_registration_on ?? true;
        
        // Restrict access if admission is closed
        if (!$isAdmissionOpen) {
            return redirect()->route('website.home')
                ->with('status_type', 'warning')
                ->with('status_message', 'Admission is currently closed. Please check back later for updates.');
        }
        
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $programmes = Programme::where('is_active', true)->orderBy('type', 'asc')->orderBy('name', 'asc')->get();

        return view('website.application', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'programmes' => $programmes,
            'isAdmissionOpen' => $isAdmissionOpen,
        ]);
    }

    public function store(StoreApplicationRequest $request): RedirectResponse
    {
        // Check if admission is open
        $isAdmissionOpen = HelperService::getSettings()->is_registration_on ?? true;
        if (!$isAdmissionOpen) {
            return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Admission is currently closed. Please check back later.');
        }

        // Additional duplicate check before validation (extra safety)
        $emailExists = ApplicationModel::where('email', $request->email)->exists();
        if ($emailExists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['email' => 'An application with this email address has already been submitted. Please use a different email or contact support if you believe this is an error.']);
        }

        $phoneExists = ApplicationModel::where('phone_number', $request->phone_number)->exists();
        if ($phoneExists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['phone_number' => 'An application with this phone number has already been submitted. Please use a different phone number or contact support if you believe this is an error.']);
        }

        // Check for similar applications (same name + email combination)
        $similarApplication = ApplicationModel::where('email', $request->email)
            ->where('surname', $request->surname)
            ->where('first_name', $request->first_name)
            ->exists();
        
        if ($similarApplication) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['email' => 'An application with similar details has already been submitted. Please contact support if you need to update your application.']);
        }

        $data = $request->validated();
        
        // Handle file uploads
        $data['ssce_certificate'] = HelperService::uploadImage(
            Str::slug($request->surname . '-' . $request->first_name . '-ssce'),
            $request->file('ssce_certificate'),
            'website_assets/uploads/applications/ssce/',
            null,
            null
        );

        $data['birth_certificate'] = HelperService::uploadImage(
            Str::slug($request->surname . '-' . $request->first_name . '-birth'),
            $request->file('birth_certificate'),
            'website_assets/uploads/applications/birth/',
            null,
            null
        );

        $data['passport_photograph'] = HelperService::uploadImage(
            Str::slug($request->surname . '-' . $request->first_name . '-passport'),
            $request->file('passport_photograph'),
            'website_assets/uploads/applications/passport/',
            400,
            400
        );

        $data['evidence_of_payment'] = HelperService::uploadImage(
            Str::slug($request->surname . '-' . $request->first_name . '-payment'),
            $request->file('evidence_of_payment'),
            'website_assets/uploads/applications/payment/',
            null,
            null
        );

        $data['jamb_result'] = HelperService::uploadImage(
            Str::slug($request->surname . '-' . $request->first_name . '-jamb'),
            $request->file('jamb_result'),
            'website_assets/uploads/applications/jamb/',
            null,
            null
        );

        if ($request->hasFile('other_uploads')) {
            $data['other_uploads'] = HelperService::uploadImage(
                Str::slug($request->surname . '-' . $request->first_name . '-other'),
                $request->file('other_uploads'),
                'website_assets/uploads/applications/other/',
                null,
                null
            );
        }

        $added = ApplicationModel::create(array_merge($data, [
            'unique_id' => strtoupper(Str::random(10)),
            'status' => 'pending',
        ]));

        if ($added) {
            // Load the programme relationship for email
            $added->load('programme');
            
            try {
                // Send confirmation email to applicant
                Mail::to($added->email)->send(new ApplicationSubmittedMail($added));
                
                // Send notification email to admin
                Mail::to('applications@castobubra.ng')->send(new ApplicationReceivedMail($added));
            } catch (\Exception $e) {
                // Log the error but don't fail the application submission
                \Log::error('Failed to send application emails: ' . $e->getMessage());
            }
            
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'Your application has been submitted successfully! We will review it and get back to you.');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong. Please try again.');
    }

    public function admissionChecker(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.admission_checker', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function checkAdmission(Request $request): Factory|View|Application|RedirectResponse|\Illuminate\Http\JsonResponse
    {
        // Handle validation - return JSON for AJAX requests
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'application_code' => ['required', 'string', 'max:20'],
            ], [
                'email.required' => 'Please enter your email address',
                'email.email' => 'Please enter a valid email address',
                'application_code.required' => 'Please enter your application code',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first() ?? 'Validation failed. Please check your input.'
                ], 422);
            }
            throw $e;
        }

        $application = ApplicationModel::with('programme')
            ->where('email', $request->email)
            ->where('unique_id', strtoupper($request->application_code))
            ->first();

        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        if (!$application) {
            $errorMessage = 'No application found with the provided email and application code. Please check your details and try again.';
            
            // Return JSON for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 404);
            }
            
            // Return redirect for regular form submissions
            return redirect()->back()
                ->withInput()
                ->with('status_type', 'danger')
                ->with('status_message', $errorMessage);
        }

        // Log the admission check with browser/system information
        $this->logAdmissionCheck($application, $request);

        // Return JSON for AJAX requests when application is found
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'application' => [
                    'unique_id' => $application->unique_id,
                    'full_name' => $application->full_name,
                    'programme' => $application->programme ? $application->programme->type . ' - ' . $application->programme->name : 'N/A',
                    'status' => $application->status,
                    'remarks' => $application->remarks,
                    'created_at' => $application->created_at->format('F d, Y'),
                ]
            ]);
        }

        return view('website.admission_checker', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'application' => $application,
            'checked' => true,
        ]);
    }

    /**
     * Log admission check with browser and system information
     */
    private function logAdmissionCheck(ApplicationModel $application, Request $request): void
    {
        $userAgent = $request->userAgent();
        $ipAddress = $request->ip();
        $referrer = $request->header('referer');

        // Parse browser information
        $browserInfo = $this->parseBrowserInfo($userAgent);
        $platformInfo = $this->parsePlatformInfo($userAgent);

        AdmissionCheckLog::create([
            'application_id' => $application->id,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'browser' => $browserInfo['browser'],
            'browser_version' => $browserInfo['version'],
            'platform' => $platformInfo['platform'],
            'device_type' => $platformInfo['device_type'],
            'device_name' => $platformInfo['device_name'],
            'referrer' => $referrer,
        ]);
    }

    /**
     * Parse browser information from user agent
     */
    private function parseBrowserInfo(?string $userAgent): array
    {
        if (!$userAgent) {
            return ['browser' => 'Unknown', 'version' => null];
        }

        $browser = 'Unknown';
        $version = null;

        // Chrome
        if (preg_match('/Chrome\/([0-9.]+)/i', $userAgent, $matches)) {
            if (!preg_match('/Edg|OPR/i', $userAgent)) {
                $browser = 'Chrome';
                $version = $matches[1] ?? null;
            }
        }
        // Edge
        if (preg_match('/Edg\/([0-9.]+)/i', $userAgent, $matches)) {
            $browser = 'Edge';
            $version = $matches[1] ?? null;
        }
        // Firefox
        elseif (preg_match('/Firefox\/([0-9.]+)/i', $userAgent, $matches)) {
            $browser = 'Firefox';
            $version = $matches[1] ?? null;
        }
        // Safari
        elseif (preg_match('/Safari\/([0-9.]+)/i', $userAgent, $matches) && !preg_match('/Chrome/i', $userAgent)) {
            $browser = 'Safari';
            $version = $matches[1] ?? null;
        }
        // Opera
        elseif (preg_match('/OPR\/([0-9.]+)/i', $userAgent, $matches)) {
            $browser = 'Opera';
            $version = $matches[1] ?? null;
        }
        // Internet Explorer
        elseif (preg_match('/MSIE ([0-9.]+)/i', $userAgent, $matches)) {
            $browser = 'Internet Explorer';
            $version = $matches[1] ?? null;
        }

        return ['browser' => $browser, 'version' => $version];
    }

    /**
     * Parse platform information from user agent
     */
    private function parsePlatformInfo(?string $userAgent): array
    {
        if (!$userAgent) {
            return ['platform' => 'Unknown', 'device_type' => 'Unknown', 'device_name' => null];
        }

        $platform = 'Unknown';
        $deviceType = 'Desktop';
        $deviceName = null;

        // Windows
        if (preg_match('/Windows NT ([0-9.]+)/i', $userAgent, $matches)) {
            $platform = 'Windows';
            $version = $matches[1] ?? '';
            if ($version === '10.0') $platform = 'Windows 10';
            elseif ($version === '6.3') $platform = 'Windows 8.1';
            elseif ($version === '6.2') $platform = 'Windows 8';
            elseif ($version === '6.1') $platform = 'Windows 7';
        }
        // macOS
        elseif (preg_match('/Mac OS X ([0-9_]+)/i', $userAgent, $matches)) {
            $platform = 'macOS';
            $version = str_replace('_', '.', $matches[1] ?? '');
            $deviceName = 'Mac';
        }
        // Linux
        elseif (preg_match('/Linux/i', $userAgent)) {
            $platform = 'Linux';
        }
        // iOS
        elseif (preg_match('/iPhone OS ([0-9_]+)/i', $userAgent, $matches)) {
            $platform = 'iOS';
            $deviceType = 'Mobile';
            $deviceName = 'iPhone';
        }
        // iPad
        elseif (preg_match('/iPad.*OS ([0-9_]+)/i', $userAgent, $matches)) {
            $platform = 'iOS';
            $deviceType = 'Tablet';
            $deviceName = 'iPad';
        }
        // Android
        elseif (preg_match('/Android ([0-9.]+)/i', $userAgent, $matches)) {
            $platform = 'Android';
            $deviceType = 'Mobile';
            $version = $matches[1] ?? '';
            // Try to get device name
            if (preg_match('/; ([^)]+)\)/i', $userAgent, $deviceMatches)) {
                $deviceName = $deviceMatches[1] ?? null;
            }
        }

        return [
            'platform' => $platform,
            'device_type' => $deviceType,
            'device_name' => $deviceName,
        ];
    }
}
