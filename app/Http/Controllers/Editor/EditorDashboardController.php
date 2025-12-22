<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SystemSetting;
use App\Models\Tag;
use App\Models\UserLoginInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorDashboardController extends Controller
{
    private function getSettings()
    {
        return SystemSetting::find(1);
    }

    public function index()
    {
        $posts_count = Post::count();
        $categories_count = Category::count();
        $tags_count = Tag::count();

        return view('editor.dashboard', [
            'posts' => $posts_count,
            'categories' => $categories_count,
            'tags' => $tags_count,
        ]);
    }

    public function profileAction()
    {
        return view('editor.profile.profile', [
            'settings' => $this->getSettings(),
        ]);
    }

    public function profileSettingAction()
    {
        return view('editor.profile.setting', [
            'settings' => $this->getSettings(),
        ]);
    }

    public function profileActivityAction()
    {
        $activities = UserLoginInfo::where('user_id', auth()->user()->id)->latest()->get();
        return view('editor.profile.activities', [
            'settings' => $this->getSettings(),
            'activities' => $activities
        ]);
    }

    public function deleteActivityAction($id): RedirectResponse
    {
        $activities = UserLoginInfo::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function deleteAllActivitiesAction(): RedirectResponse
    {
        $activities = UserLoginInfo::where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }
}
