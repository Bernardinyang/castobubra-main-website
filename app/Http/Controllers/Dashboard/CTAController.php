<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCTARequest;
use App\Http\Services\HelperService;
use App\Models\CTA;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class CTAController extends Controller
{
    public function create(): Factory|View|Application
    {
        $cta = CTA::find(1);
        if (!$cta) {
            $cta = CTA::create([
                'unique_id' => Str::random(10),
                'type' => 'text',
                'sup_text' => '',
                'title' => '',
                'content' => '',
                'url' => '',
                'url_text' => ''
            ]);
        }
        return view('user.cta', [
            'cta' => $cta
        ]);
    }

    public function update(StoreCTARequest $request): RedirectResponse
    {
        $cta = CTA::find(1);
        $data = $request->validated();

        // Handle image upload if type is image or if image is being updated
        if ($request->hasFile('img')) {
            // Remove old image if exists
            if ($cta->img) {
                HelperService::removeImage($cta->img, 'website_assets/img/cta/');
            }
            $data['img'] = HelperService::uploadImage(
                Str::slug($request->title ?: 'cta-image'),
                $request->file('img'),
                'website_assets/img/cta/',
                1920,
                600
            );
        } elseif ($request->input('type') === 'text' && $cta->img) {
            // Remove image if switching to text type
            HelperService::removeImage($cta->img, 'website_assets/img/cta/');
            $data['img'] = null;
        }

        // Ensure null values are set properly for optional fields
        if ($request->input('type') === 'image') {
            // For image type, set text fields to null if not provided
            if (empty($data['sup_text'])) {
                $data['sup_text'] = null;
            }
            if (empty($data['title'])) {
                $data['title'] = null;
            }
            if (empty($data['content'])) {
                $data['content'] = null;
            }
            if (empty($data['subtitle'])) {
                $data['subtitle'] = null;
            }
        } else {
            // For text type, set image to null if not provided
            if (!isset($data['img'])) {
                $data['img'] = null;
            }
        }

        // Handle empty strings as null for optional fields
        $optionalFields = ['url', 'url_text', 'sup_text', 'title', 'subtitle', 'content'];
        foreach ($optionalFields as $field) {
            if (isset($data[$field]) && $data[$field] === '') {
                $data[$field] = null;
            }
        }

        $updated = $cta->update($data);

        if($updated) {
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'You have successfully updated the CTA!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }
}
