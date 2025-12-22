<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicBoardRequest;
use App\Http\Services\HelperService;
use App\Models\AcademicBoard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AcademicBoardController extends Controller
{
    public function index(): Factory|View|Application
    {
        $board_members = AcademicBoard::latest()->get();

        return view('user.academic_board.manage', [
            'board_members' => $board_members
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.academic_board.add');
    }

    public function store(StoreAcademicBoardRequest $request): ?RedirectResponse
    {
        $prev_order = AcademicBoard::select('order')->latest()->first();
        $image = HelperService::uploadImage(Str::slug($request->names), $request->img, 'website_assets/img/academic-boards/', 900, 900);

        $added = AcademicBoard::create(array_merge($request->validated(), [
            'image' => $image,
            'order' => $prev_order ? $prev_order->order + 1 : 1
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added a Board Member!');
        }

        return null;
    }

    public function show($id): Factory|View|Application
    {
        return view('user.academic_board.view', [
            'academic_board' => AcademicBoard::where('id', $id)->first()
        ]);
    }

    public function edit($id): Factory|View|Application
    {
        return view('user.academic_board.edit', [
            'academic_board' => AcademicBoard::where('id', $id)->first()
        ]);
    }

    public function update(StoreAcademicBoardRequest $request, $id): ?RedirectResponse
{
    $bot = AcademicBoard::findOrFail($id);

    // Preserve current image filename
    $currentImage = $bot->image;

    // Build a base filename prefix from current image (safe fallback)
    $image_name_prefix = $currentImage ? explode('.', $currentImage)[0] : Str::slug($request->input('names', 'board-member-' . time()));

    $data = $request->validated();

    // Ensure we don't accidentally send the uploaded temp path into the DB
    // Remove any 'img' key from the payload so update() won't try to set it
    if (array_key_exists('img', $data)) {
        unset($data['img']);
    }

    // If there's a real uploaded file, handle it
    if ($request->hasFile('img')) {
        $uploadedFile = $request->file('img');

        // Remove old image file if exists
        if (!empty($currentImage)) {
            HelperService::removeImage($currentImage, 'website_assets/img/academic-boards');
        }

        // Upload new file. Note: pass location without trailing slash.
        $savedFilename = HelperService::uploadImage(
            Str::slug($image_name_prefix),
            $uploadedFile,
            'website_assets/img/academic-boards', // no trailing slash
            900,
            900
        );

        // Set the image column to the saved filename
        $data['image'] = $savedFilename;
    } else {
        // No new file uploaded — keep existing image
        $data['image'] = $currentImage;
    }

    $updated = AcademicBoard::where('id', $id)->update($data);

    if ($updated) {
        return redirect()->back()->with('status', 'You have successfully updated a Board Member!');
    }

    return null;
}

    public function destroy($id): ?RedirectResponse
    {
        $image = AcademicBoard::where('id', $id)->first()->image;
        HelperService::removeImage($image, 'website_assets/img/academic-boards/');

        if (AcademicBoard::where('id', $id)->delete()) {
            return redirect()->route('academic-board.index')->with('status', 'You have successfully deleted a Board Member!');
        }

        return null;
    }
}
