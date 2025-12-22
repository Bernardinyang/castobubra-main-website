<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderImageRequest;
use App\Http\Services\HelperService;
use App\Models\SliderImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class SliderImageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $slider_images = SliderImage::latest()->get();
        return view('user.slider_image.manage', [
            'slider_images' => $slider_images
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.slider_image.add');
    }

    public function store(SliderImageRequest $request): ?RedirectResponse
    {
        $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'website_assets/img/slider-image/', 1920, 950);
        
        $mobile_img = null;
        if ($request->mobile_img) {
            $mobile_img = HelperService::uploadImage(Str::slug($request->title) . '-mobile', $request->mobile_img, 'website_assets/img/slider-image/', 768, 1024);
        }

        $added = SliderImage::create(array_merge($request->validated(), [
            'img' => $img,
            'mobile_img' => $mobile_img
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the slider image!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.slider_image.view', [
            'slider_image' => SliderImage::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.slider_image.edit', [
            'slider_image' => SliderImage::where('id', $id)->first()
        ]);
    }

    public function update(SliderImageRequest $request, $id): ?RedirectResponse
    {
        $slider_image = SliderImage::where('id', $id)->first();
        $image_name = $slider_image->img;
        $image_name = explode('.', $image_name)[0];

        $img = $slider_image->img;
        if ($request->img) {
            HelperService::removeImage($slider_image->img, 'website_assets/img/slider-image/');
            $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'website_assets/img/slider-image/',1920, 950);
        }

        $mobile_img = $slider_image->mobile_img;
        if ($request->mobile_img) {
            if ($slider_image->mobile_img) {
                HelperService::removeImage($slider_image->mobile_img, 'website_assets/img/slider-image/');
            }
            $mobile_img = HelperService::uploadImage(Str::slug($request->title) . '-mobile', $request->mobile_img, 'website_assets/img/slider-image/', 768, 1024);
        }

        $updated = SliderImage::where('id', $id)->update(array_merge($request->except('_token', '_method', 'img', 'mobile_img'), [
            'img' => $img,
            'mobile_img' => $mobile_img
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the slider image!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $slider_image = SliderImage::where('id', $id)->first();
        HelperService::removeImage($slider_image->img, 'website_assets/img/slider-image/');
        if ($slider_image->mobile_img) {
            HelperService::removeImage($slider_image->mobile_img, 'website_assets/img/slider-image/');
        }

        if (SliderImage::where('id', $id)->delete()) {
            return redirect()->route('slider-image.index')->with('status', 'You have successfully deleted the slider image!');
        }

        return null;
    }
}
