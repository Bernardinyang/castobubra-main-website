<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentNewsBarRequest;
use App\Models\StudentNewsBar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StudentNewsBarController extends Controller
{
    public function index(): View
    {
        return view('user.student_news_bar.manage', [
            'news' => StudentNewsBar::latest()->get()
        ]);
    }


    public function create(): Factory|View|Application
    {
        return view('user.student_news_bar.add');
    }

    public function store(StoreStudentNewsBarRequest $request): ?RedirectResponse
    {
        $unique_id = Str::random(20);

        $added = StudentNewsBar::create(array_merge($request->validated(), [
            'unique_id' => $unique_id,
        ]));

        if($added) {
            return redirect()->back()->with('status', 'You have successfully added the news!');
        }

        return null;
    }

    public function edit($id)
    {
        return view('user.student_news_bar.edit', [
            'news_bar' => StudentNewsBar::where('id', $id)->first()
        ]);
    }

    public function update(StoreStudentNewsBarRequest $request, $id): ?RedirectResponse
    {

        $updated = StudentNewsBar::where('id', $id)->update($request->validated());

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the news!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (StudentNewsBar::where('id', $id)->delete()) {
            return redirect()->route('student-news-bar.index')->with('status', 'You have successfully deleted the news!');
        }

        return null;
    }
}
