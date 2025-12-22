<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Contracts\Foundation\Application as App;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use ZipArchive;

class ApplicationController extends Controller
{
    public function index(): Factory|View|App
    {
        $applications = Application::with('programme')->latest()->get();
        return view('user.application.manage', [
            'applications' => $applications
        ]);
    }

    public function show($id): Factory|View|App
    {
        return view('user.application.view', [
            'application' => Application::with('programme')->where('id', $id)->first()
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,accepted,rejected',
            'remarks' => 'nullable|string',
        ]);

        $application = Application::findOrFail($id);
        $application->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->back()->with('status_type', 'success')->with('status_message', 'Application status updated successfully!');
    }

    public function export()
    {
        $applications = Application::with('programme')->get();
        
        // Create a temporary directory for the export
        $tempDir = storage_path('app/temp/export_' . time());
        File::makeDirectory($tempDir, 0755, true);
        
        // Create CSV file
        $csvPath = $tempDir . '/applications_' . date('Y-m-d') . '.csv';
        $csvFile = fopen($csvPath, 'w');
        
        // CSV Headers
        fputcsv($csvFile, [
            'ID', 'Unique ID', 'Surname', 'First Name', 'Other Name', 'Email', 'Phone Number',
            'Gender', 'Marital Status', 'State of Origin', 'Local Government', 'Current Address',
            'Programme', 'Status', 'Remarks', 'Submitted At',
            'SSCE Certificate', 'Birth Certificate', 'Passport Photograph', 'Evidence of Payment', 'Other Uploads'
        ]);

        // Process each application
        foreach ($applications as $application) {
            // Write CSV row
            fputcsv($csvFile, [
                $application->id,
                $application->unique_id,
                $application->surname,
                $application->first_name,
                $application->other_name ?? '',
                $application->email,
                $application->phone_number,
                $application->gender ?? '',
                $application->marital_status ?? '',
                $application->state_of_origin ?? '',
                $application->local_government ?? '',
                $application->current_address ?? '',
                $application->programme ? ($application->programme->type . ' - ' . $application->programme->name) : 'N/A',
                ucfirst($application->status),
                $application->remarks ?? '',
                $application->created_at->format('Y-m-d H:i:s'),
                $application->ssce_certificate ? 'Yes' : 'No',
                $application->birth_certificate ? 'Yes' : 'No',
                $application->passport_photograph ? 'Yes' : 'No',
                $application->evidence_of_payment ? 'Yes' : 'No',
                $application->other_uploads ? 'Yes' : 'No',
            ]);

            // Create folder for this application's documents
            $appDir = $tempDir . '/documents/' . $application->unique_id;
            File::makeDirectory($appDir, 0755, true);

            // Copy SSCE Certificate
            if ($application->ssce_certificate) {
                $sourcePath = public_path('website_assets/uploads/applications/ssce/' . $application->ssce_certificate);
                if (File::exists($sourcePath)) {
                    $destPath = $appDir . '/ssce_certificate.' . pathinfo($application->ssce_certificate, PATHINFO_EXTENSION);
                    File::copy($sourcePath, $destPath);
                }
            }

            // Copy Birth Certificate
            if ($application->birth_certificate) {
                $sourcePath = public_path('website_assets/uploads/applications/birth/' . $application->birth_certificate);
                if (File::exists($sourcePath)) {
                    $destPath = $appDir . '/birth_certificate.' . pathinfo($application->birth_certificate, PATHINFO_EXTENSION);
                    File::copy($sourcePath, $destPath);
                }
            }

            // Copy Passport Photograph
            if ($application->passport_photograph) {
                $sourcePath = public_path('website_assets/uploads/applications/passport/' . $application->passport_photograph);
                if (File::exists($sourcePath)) {
                    $destPath = $appDir . '/passport_photograph.' . pathinfo($application->passport_photograph, PATHINFO_EXTENSION);
                    File::copy($sourcePath, $destPath);
                }
            }

            // Copy Evidence of Payment
            if ($application->evidence_of_payment) {
                $sourcePath = public_path('website_assets/uploads/applications/payment/' . $application->evidence_of_payment);
                if (File::exists($sourcePath)) {
                    $destPath = $appDir . '/evidence_of_payment.' . pathinfo($application->evidence_of_payment, PATHINFO_EXTENSION);
                    File::copy($sourcePath, $destPath);
                }
            }

            // Copy Other Uploads
            if ($application->other_uploads) {
                $sourcePath = public_path('website_assets/uploads/applications/other/' . $application->other_uploads);
                if (File::exists($sourcePath)) {
                    $destPath = $appDir . '/other_uploads.' . pathinfo($application->other_uploads, PATHINFO_EXTENSION);
                    File::copy($sourcePath, $destPath);
                }
            }
        }

        fclose($csvFile);

        // Create ZIP file
        $zipPath = storage_path('app/temp/applications_export_' . date('Y-m-d_His') . '.zip');
        $zip = new ZipArchive();
        
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Add CSV file
            $zip->addFile($csvPath, 'applications_' . date('Y-m-d') . '.csv');
            
            // Add all documents
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($tempDir . '/documents'),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = 'documents/' . substr($filePath, strlen($tempDir . '/documents/') + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();
        }

        // Clean up temporary directory
        File::deleteDirectory($tempDir);

        // Return ZIP file as download
        return Response::download($zipPath, 'applications_export_' . date('Y-m-d_His') . '.zip')->deleteFileAfterSend(true);
    }
}
