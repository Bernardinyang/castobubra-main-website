<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComingSoonSliderImageRequest;
use App\Http\Services\HelperService;
use App\Models\ComingSoonSliderImage;
use App\Models\SystemSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ComingSoonSliderImageController extends Controller
{
    public function index()
    {
        $coming_soon_slider_images = ComingSoonSliderImage::latest()->get();
        return view('user.coming_soon_slider_image.manage', [
            'coming_soon_slider_images' => $coming_soon_slider_images
        ]);
    }

    public function create()
    {
        return view('user.coming_soon_slider_image.add');
    }

    public function store(ComingSoonSliderImageRequest $request): ?RedirectResponse
    {
        $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'coming_soon_assets/img/coming-soon-slider-image/', 1000, 1400);

        $added = ComingSoonSliderImage::create(array_merge($request->validated(), [
            'img' => $img
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the coming_soon_slider_image!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.coming_soon_slider_image.view', [
            'coming_soon_slider_image' => ComingSoonSliderImage::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.coming_soon_slider_image.edit', [
            'coming_soon_slider_image' => ComingSoonSliderImage::where('id', $id)->first()
        ]);
    }

    public function update(ComingSoonSliderImageRequest $request, $id): ?RedirectResponse
    {
        $coming_soon_slider_image = ComingSoonSliderImage::where('id', $id)->first();
        $image_name = $coming_soon_slider_image->img;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($coming_soon_slider_image->img, 'coming_soon_assets/img/coming-soon-slider-image/');
            $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'coming_soon_assets/img/coming-soon-slider-image/', 1000, 1400);
        }

        $updated = ComingSoonSliderImage::where('id', $id)->update(array_merge($request->except('_token', '_method'), [
            'img' => $request->img ? $img : $coming_soon_slider_image->img
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the coming_soon_slider_image!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $image = ComingSoonSliderImage::where('id', $id)->first()->img;
        HelperService::removeImage($image, 'coming_soon_assets/img/coming-soon-slider-image/');

        if (ComingSoonSliderImage::where('id', $id)->delete()) {
            return redirect()->route('coming-soon-slider-image.index')->with('status', 'You have successfully deleted the coming_soon_slider_image!');
        }

        return null;
    }
}
