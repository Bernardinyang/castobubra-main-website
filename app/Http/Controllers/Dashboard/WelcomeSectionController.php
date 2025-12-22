<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WelcomeSectionRequest;
use App\Http\Services\HelperService;
use App\Models\WelcomeSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeSectionController extends Controller
{
    public function edit()
    {
        return view('user.welcome-section', [
            'section' => WelcomeSection::find(1)
        ]);
    }

    public function update(WelcomeSectionRequest $request): ?RedirectResponse
    {
        $section = WelcomeSection::find(1);

        if ($request->main_image) {
            HelperService::removeImage($section->main_image, 'website_assets/img/welcome-section/');
            $main_image = HelperService::uploadImage(Str::slug($request->title . ' main image'), $request->main_image, 'website_assets/img/welcome-section/',740, 880);
        }

        if ($request->sub_image) {
            HelperService::removeImage($section->sub_image, 'website_assets/img/welcome-section/');
            $sub_image = HelperService::uploadImage(Str::slug($request->title . ' sub image'), $request->sub_image, 'website_assets/img/welcome-section/',480, 620);
        }

        $updated = WelcomeSection::find(1)->update(array_merge($request->except('_token', '_method'), [
            'main_image' => $request->main_image ? $main_image : $section->main_image,
            'sub_image' => $request->sub_image ? $sub_image : $section->sub_image
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated this section!');
        }

        return null;

    }
}
