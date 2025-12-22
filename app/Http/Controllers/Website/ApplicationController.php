<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Services\HelperService;
use App\Models\Application as ApplicationModel;
use App\Models\CTA;
use App\Models\Programme;
use App\Models\WebsiteNewsBar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'Your application has been submitted successfully! We will review it and get back to you.');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong. Please try again.');
    }
}
