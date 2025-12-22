<?php

namespace App\Http\Services;

use App\Models\SugSetting;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class HelperService
{
    public static function getSettings()
    {
        return SystemSetting::find(1);
    }

    public static function getSugSettings()
    {
        return SugSetting::find(1);
    }

    public static function removeImage($filename, $location): void
    {
        $path = public_path(trim($location, '/') . '/' . $filename);
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    /**
     * Upload an image using native Laravel file move.
     * Returns the saved filename (same as Intervention version).
     */
    public static function uploadImage($file_name, $file, $location, $width = null, $height = null): string
    {
        $extension = $file->extension() ?: 'png';
        $upload_image = strtolower('castobubra-' . $file_name) . '.' . $extension;

        // Normalize and ensure destination folder exists
        $location = trim($location, '/');
        $destinationDir = public_path($location);

        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // Move uploaded file
        $file->move($destinationDir, $upload_image);
        
        return $upload_image;
    }

    public static function isRoute($route): string
    {
        return Request::routeIs($route) ? 'active' : '';
    }
}