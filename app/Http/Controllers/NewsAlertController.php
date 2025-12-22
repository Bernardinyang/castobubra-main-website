<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsAlertRequest;
use App\Models\NewsAlert;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class NewsAlertController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('user.news_alert.manage', [
            'news_alerts' => NewsAlert::latest()->get()
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.news_alert.add');
    }

    public function store(StoreNewsAlertRequest $request): ?RedirectResponse
    {

        if ($request->validated()['is_active']) {
            NewsAlert::where('is_active', true)->update([
                'is_active' => false
            ]);
        }

        $added = NewsAlert::create(array_merge($request->validated(), [
            'unique_id' => Str::random(10),
            'is_active' => $request->validated()['is_active']
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the news!');
        }

        return null;
    }

    public function show($id): Factory|View|Application
    {
        return view('user.news_alert.view', [
            'news_alert' => NewsAlert::where('id', $id)->first()
        ]);
    }

    public function edit($id): Factory|View|Application
    {
        return view('user.news_alert.edit', [
            'news_alert' => NewsAlert::where('id', $id)->first(),
        ]);
    }

    public function update(StoreNewsAlertRequest $request, $id): ?RedirectResponse
    {
        $updated = NewsAlert::where('id', $id)->update($request->validated());

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the message!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (NewsAlert::where('id', $id)->delete()) {
            return redirect()->route('news-alert.index')->with('status', 'You have successfully deleted the news!');
        }

        return null;
    }

    public function activateNewsAlert($id): ?RedirectResponse
    {
        NewsAlert::where([
            ['is_active', true]
        ])->update([
            'is_active' => false
        ]);

        $activated = NewsAlert::where([
            ['id', $id],
            ['is_active', false]
        ])->update([
            'is_active' => true
        ]);

        if ($activated) {
            return redirect()->back()->with('status_message', 'NewsAlert activated successfully!')->with('status_type', 'primary');
        }

        return null;
    }

    public function deactivateNewsAlert($id): RedirectResponse
    {
        NewsAlert::where([
            ['id', $id],
            ['is_active', true]
        ])->update([
            'is_active' => false
        ]);

        return redirect()->back()->with('status_message', 'News Alert deactivated successfully!')->with('status_type', 'danger');
    }
}
