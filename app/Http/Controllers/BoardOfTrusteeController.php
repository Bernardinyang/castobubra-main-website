<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardOfTrusteeRequest;
use App\Http\Services\HelperService;
use App\Models\BoardOfTrustee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BoardOfTrusteeController extends Controller
{
    public function index()
    {
        $bot_members = BoardOfTrustee::latest()->get();

        return view('user.bot.manage', [
            'bot_members' => $bot_members
        ]);
    }

    public function create()
    {
        return view('user.bot.add');
    }

    public function store(StoreBoardOfTrusteeRequest $request): ?RedirectResponse
    {
        $prev_order = BoardOfTrustee::select('order')->latest()->first();
        $image = HelperService::uploadImage(Str::slug($request->names), $request->img, 'website_assets/img/board-of-directors/', 900, 900);

        $added = BoardOfTrustee::create(array_merge($request->validated(), [
            'image' => $image,
            'order' => $prev_order ? $prev_order->order + 1 : 1
        ]));

        if($added) {
            return redirect()->back()->with('status', 'You have successfully added a Board Member!');
        }

        return null;
    }

    public function show($id)
    {
        return view('user.bot.view', [
            'bot' => BoardOfTrustee::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.bot.edit', [
            'bot' => BoardOfTrustee::where('id', $id)->first()
        ]);
    }

    public function update(StoreBoardOfTrusteeRequest $request, $id): ?RedirectResponse
    {
        $bot = BoardOfTrustee::where('id', $id)->first();
        $image_name = $bot->image;
        $image_name = explode('.', $image_name)[0];

        if ($request->img) {
            HelperService::removeImage($bot->image, 'website_assets/img/board-of-directors/');
            $image = HelperService::uploadImage(Str::slug($image_name), $request->img, 'website_assets/img/board-of-directors/', 900, 900);
        }

        $updated = BoardOfTrustee::where('id', $id)->update(array_merge($request->except('_token', '_method', 'img'), [
            'image' => $request->img ? $image : $bot->image
        ]));

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated a Board Member!');
        }

        return null;

    }

    public function destroy($id): ?RedirectResponse
    {
        $image = BoardOfTrustee::where('id', $id)->first()->image;
        HelperService::removeImage($image, 'website_assets/img/board-of-directors/');

        if (BoardOfTrustee::where('id', $id)->delete()) {
            return redirect()->route('bot.index')->with('status', 'You have successfully deleted a Board Member!');
        }

        return null;
    }
}
