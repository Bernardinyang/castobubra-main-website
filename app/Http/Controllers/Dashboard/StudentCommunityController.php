<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentCommunityRequest;
use App\Http\Services\HelperService;
use App\Models\StudentCommunity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentCommunityController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('user.student_community', [
            'community' => StudentCommunity::find(1)
        ]);
    }

    public function update(StoreStudentCommunityRequest $request): RedirectResponse
    {

        $student_community = StudentCommunity::find(1);
        $image_name = $student_community->img;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($student_community->img, 'website_assets/img/student-community/');
            $img = HelperService::uploadImage($image_name, $request->img, 'website_assets/img/student-community/',1920, 2300);
        }

        $added = StudentCommunity::find(1)->update(array_merge($request->validated(), [
            'img' => $request->img ? $img : $student_community->img
        ]));

        if($added) {
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'You have successfully updated the student community!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }
}
