<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Services\HelperService;
use App\Models\Gallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(): Factory|View|Application
    {
        $galleries = Gallery::orderBy('order', 'asc')->latest()->get();
        return view('user.gallery.manage', [
            'galleries' => $galleries
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.gallery.add');
    }

    public function store(StoreGalleryRequest $request): ?RedirectResponse
    {
        $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'website_assets/img/gallery/', 800, 600);

        $added = Gallery::create(array_merge($request->validated(), [
            'img' => $img,
            'is_active' => $request->has('is_active') ? true : false,
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the gallery image!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.gallery.view', [
            'gallery' => Gallery::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.gallery.edit', [
            'gallery' => Gallery::where('id', $id)->first()
        ]);
    }

    public function update(StoreGalleryRequest $request, $id): ?RedirectResponse
    {
        $gallery = Gallery::where('id', $id)->first();
        $image_name = $gallery->img;
        $image_name = explode('.', $image_name)[0];

        $img = $gallery->img;
        if ($request->img) {
            HelperService::removeImage($gallery->img, 'website_assets/img/gallery/');
            $img = HelperService::uploadImage(Str::slug($request->title), $request->img, 'website_assets/img/gallery/', 800, 600);
        }

        $updated = Gallery::where('id', $id)->update(array_merge($request->except('_token', '_method', 'img'), [
            'img' => $img,
            'is_active' => $request->has('is_active') ? true : false,
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the gallery image!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        $gallery = Gallery::where('id', $id)->first();
        HelperService::removeImage($gallery->img, 'website_assets/img/gallery/');

        if (Gallery::where('id', $id)->delete()) {
            return redirect()->route('gallery.index')->with('status', 'You have successfully deleted the gallery image!');
        }

        return null;
    }
}
