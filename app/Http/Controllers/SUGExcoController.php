<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSUGExcoRequest;
use App\Http\Services\HelperService;
use App\Models\SUGExco;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class SUGExcoController extends Controller
{
    public function index()
    {
        $sug_exco_members = SUGExco::latest()->get();

        return view('user.sug_exco.manage', [
            'sug_exco_members' => $sug_exco_members
        ]);
    }

    public function create()
    {
        return view('user.sug_exco.add');
    }

    public function store(StoreSUGExcoRequest $request): ?RedirectResponse
    {
        $prev_order = SUGExco::select('order')->latest()->first();
        $image = HelperService::uploadImage(Str::slug($request->names), $request->img, 'coming_soon_assets/img/sug-excos/', 900, 900);

        $added = SUGExco::create(array_merge($request->validated(), [
            'image' => $image,
            'order' => $prev_order ? $prev_order->order + 1 : 1
        ]));

        if($added) {
            return redirect()->back()->with('status', 'You have successfully added a SUG Exco Member!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.sug_exco.view', [
            'sug_exco' => SUGExco::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.sug_exco.edit', [
            'sug_exco' => SUGExco::where('id', $id)->first()
        ]);
    }

    public function update(StoreSUGExcoRequest $request, $id): ?RedirectResponse
    {
        $sug_exco = SUGExco::where('id', $id)->first();
        $image_name = $sug_exco->image;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($sug_exco->image, 'coming_soon_assets/img/sug-excos/');
            $image = HelperService::uploadImage(Str::slug($image_name), $request->img, 'coming_soon_assets/img/sug-excos/', 900, 900);
        }

        $updated = SUGExco::where('id', $id)->update(array_merge($request->except('_token', '_method', 'img'), [
            'image' => $request->img ? $image : $sug_exco->image
        ]));

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated a SUG Exco Member!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $image = SUGExco::where('id', $id)->first()->image;
        HelperService::removeImage($image, 'coming_soon_assets/img/sug-excos/');

        if (SUGExco::where('id', $id)->delete()) {
            return redirect()->route('sug_exco.index')->with('status', 'You have successfully deleted a SUG Exco Member!');
        }

        return null;
    }
}
