<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWiseTalkRequest;
use App\Models\WiseTalk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class WiseTalkController extends Controller
{
    public function index(): Factory|View|Application
    {
        $wise_talks = WiseTalk::latest()->get();
        return view('user.wise_talk.manage', [
            'wise_talks' => $wise_talks
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.wise_talk.add');
    }

    public function store(StoreWiseTalkRequest $request): ?RedirectResponse
    {
        $added = WiseTalk::create($request->validated());

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the wise talk!');
        }

        return null;
    }

    public function show($id): Application|Factory|View
    {
        return view('user.wise_talk.view', [
            'wise_talk' => WiseTalk::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.wise_talk.edit', [
            'wise_talk' => WiseTalk::where('id', $id)->first()
        ]);
    }

    public function update(StoreWiseTalkRequest $request, $id): ?RedirectResponse
    {
        $updated = WiseTalk::where('id', $id)->update($request->validated());

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the wise talk!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (WiseTalk::where('id', $id)->delete()) {
            return redirect()->route('wise-talk.index')->with('status', 'You have successfully deleted the wise talk!');
        }

        return null;
    }
}
