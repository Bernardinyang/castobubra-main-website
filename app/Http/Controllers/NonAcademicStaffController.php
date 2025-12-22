<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNonAcademicStaffRequest;
use App\Http\Services\HelperService;
use App\Models\NonAcademicStaff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class NonAcademicStaffController extends Controller
{
    public function index(): Factory|View|Application
    {
        $non_academic_staff_members = NonAcademicStaff::latest()->get();

        return view('user.non_academic_staff.manage', [
            'non_academic_staff_members' => $non_academic_staff_members
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.non_academic_staff.add');
    }

    public function store(StoreNonAcademicStaffRequest $request): ?RedirectResponse
    {
        $prev_order = NonAcademicStaff::select('order')->latest()->first();
        $image = HelperService::uploadImage(Str::slug($request->names), $request->img, 'website_assets/img/non-academic-staffs/', 900, 900);

        $added = NonAcademicStaff::create(array_merge($request->validated(), [
            'image' => $image,
            'order' => $prev_order ? $prev_order->order + 1 : 1
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added a Staff Member!');
        }

        return null;
    }

    public function show($id): Factory|View|Application
    {
        return view('user.non_academic_staff.view', [
            'non_academic_staff' => NonAcademicStaff::where('id', $id)->first()
        ]);
    }

    public function edit($id): Factory|View|Application
    {
        return view('user.non_academic_staff.edit', [
            'non_academic_staff' => NonAcademicStaff::where('id', $id)->first()
        ]);
    }

    public function update(StoreNonAcademicStaffRequest $request, $id): ?RedirectResponse
    {
        $bot = NonAcademicStaff::where('id', $id)->first();
        $image_name = $bot->image;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($bot->image, 'website_assets/img/non-academic-staffs/');
            $image = HelperService::uploadImage(Str::slug($image_name), $request->img, 'website_assets/img/non-academic-staffs/', 900, 900);
        }

        $updated = NonAcademicStaff::where('id', $id)->update(array_merge($request->validated(), [
            'image' => $request->img ? $image : $bot->image
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated a Staff Member!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $image = NonAcademicStaff::where('id', $id)->first()->image;
        HelperService::removeImage($image, 'website_assets/img/non-academic-staffs/');

        if (NonAcademicStaff::where('id', $id)->delete()) {
            return redirect()->route('non-academic-staff.index')->with('status', 'You have successfully deleted a Staff Member!');
        }

        return null;
    }
}
