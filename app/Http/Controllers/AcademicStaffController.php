<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicStaffRequest;
use App\Http\Services\HelperService;
use App\Models\AcademicStaff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AcademicStaffController extends Controller
{
    public function index(): Factory|View|Application
    {
        $board_members = AcademicStaff::latest()->get();

        return view('user.academic_staff.manage', [
            'board_members' => $board_members
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.academic_staff.add');
    }

    public function store(StoreAcademicStaffRequest $request): ?RedirectResponse
    {
        $prev_order = AcademicStaff::select('order')->latest()->first();
        $image = HelperService::uploadImage(Str::slug($request->names), $request->img, 'website_assets/img/academic-staffs/', 900, 900);

        $added = AcademicStaff::create(array_merge($request->validated(), [
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
        return view('user.academic_staff.view', [
            'academic_staff' => AcademicStaff::where('id', $id)->first()
        ]);
    }

    public function edit($id): Factory|View|Application
    {
        return view('user.academic_staff.edit', [
            'academic_staff' => AcademicStaff::where('id', $id)->first()
        ]);
    }

    public function update(StoreAcademicStaffRequest $request, $id): ?RedirectResponse
    {
        $bot = AcademicStaff::where('id', $id)->first();
        $image_name = $bot->image;
        $image_name = explode('.', $image_name)[0];
        
        if ($request->img) {
            HelperService::removeImage($bot->image, 'website_assets/img/academic-staffs/');
            $image = HelperService::uploadImage(Str::slug($image_name), $request->img, 'website_assets/img/academic-staffs/', 900, 900);
        }
        
        $updated = AcademicStaff::where('id', $id)->update(array_merge($request->validated(), [
            'image' => $request->img ? $image : $bot->image
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated a Staff Member!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $image = AcademicStaff::where('id', $id)->first()->image;
        HelperService::removeImage($image, 'website_assets/img/academic-staffs/');

        if (AcademicStaff::where('id', $id)->delete()) {
            return redirect()->route('academic-staff.index')->with('status', 'You have successfully deleted a Staff Member!');
        }

        return null;
    }
}
