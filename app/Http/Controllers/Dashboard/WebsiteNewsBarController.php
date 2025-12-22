<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebsiteNewsBarRequest;
use App\Models\WebsiteNewsBar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class WebsiteNewsBarController extends Controller
{
    public function index(): View
    {
        return view('user.website_news_bar.manage', [
            'news' => WebsiteNewsBar::latest()->get()
        ]);
    }


    public function create(): Factory|View|Application
    {
        return view('user.website_news_bar.add');
    }

    public function store(StoreWebsiteNewsBarRequest $request): ?RedirectResponse
    {
        $unique_id = Str::random(20);

        $added = WebsiteNewsBar::create(array_merge($request->validated(), [
            'unique_id' => $unique_id,
        ]));

        if($added) {
            return redirect()->back()->with('status', 'You have successfully added the news!');
        }

        return null;
    }

    public function edit($id)
    {
        return view('user.website_news_bar.edit', [
            'news_bar' => WebsiteNewsBar::where('id', $id)->first()
        ]);
    }

    public function update(StoreWebsiteNewsBarRequest $request, $id): ?RedirectResponse
    {

        $updated = WebsiteNewsBar::where('id', $id)->update($request->validated());

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the news!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (WebsiteNewsBar::where('id', $id)->delete()) {
            return redirect()->route('news-bar.index')->with('status', 'You have successfully deleted the news!');
        }

        return null;
    }

    public function activateNewsBar($id): ?RedirectResponse
    {
        $activated = WebsiteNewsBar::where([
            ['id', $id],
            ['is_active', false]
        ])->update([
            'is_active' => true
        ]);

        if ($activated) {
            return redirect()->back()->with('status_message', 'Website News Bar activated successfully!')->with('status_type', 'primary');
        }

        return null;
    }

    public function deactivateNewsBar($id): RedirectResponse
    {
        WebsiteNewsBar::where([
            ['id', $id],
            ['is_active', true]
        ])->update([
            'is_active' => false
        ]);

        return redirect()->back()->with('status_message', 'Website News Bar deactivated successfully!')->with('status_type', 'danger');
    }
}
