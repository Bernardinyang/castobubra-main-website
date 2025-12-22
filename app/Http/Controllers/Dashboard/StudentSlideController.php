<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentSlideRequest;
use App\Http\Services\HelperService;
use App\Models\StudentSlide;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StudentSlideController extends Controller
{
    public function index(): View
    {
        return view('user.student_slide.manage', [
            'student_slides' => StudentSlide::latest()->get()
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.student_slide.add');
    }

    public function store(StoreStudentSlideRequest $request): ?RedirectResponse
    {
        $unique_id = Str::random(20);
        $img = HelperService::uploadImage($unique_id, $request->img, 'website_assets/img/student-slide-image/', 36, 36);

        $added = StudentSlide::create(array_merge($request->validated(), [
            'unique_id' => $unique_id,
            'img' => $img
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the slide!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.student_slide.view', [
            'student_slide' => StudentSlide::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.student_slide.edit', [
            'student_slide' => StudentSlide::where('id', $id)->first()
        ]);
    }

    public function update(StoreStudentSlideRequest $request, $id): ?RedirectResponse
    {
        $student_slide = StudentSlide::where('id', $id)->first();
        $image_name = $student_slide->img;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($student_slide->img, 'website_assets/img/student-slide-image/');
            $img = HelperService::uploadImage($image_name, $request->img, 'website_assets/img/student-slide-image/', 36, 36);
        }

        $updated = StudentSlide::where('id', $id)->update(array_merge($request->validated(), [
            'img' => $request->img ? $img : $student_slide->img
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the slide!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        $image = StudentSlide::where('id', $id)->first()->img;
        HelperService::removeImage($image, 'website_assets/img/student-slide-image/');

        if (StudentSlide::where('id', $id)->delete()) {
            return redirect()->route('student-slide.index')->with('status', 'You have successfully deleted the news!');
        }

        return null;
    }
}
