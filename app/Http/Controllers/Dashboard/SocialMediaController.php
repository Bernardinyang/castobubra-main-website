<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index(): Factory|View|Application
    {
        $social_media = SocialMedia::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('user.social_media.manage', [
            'social_media' => $social_media
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.social_media.add');
    }

    private function getSocialMediaConfig($platformName)
    {
        $configs = [
            'Facebook' => [
                'icon_class' => 'social_facebook',
                'color_class' => 'fb'
            ],
            'Twitter' => [
                'icon_class' => 'social_twitter',
                'color_class' => 'tw'
            ],
            'YouTube' => [
                'icon_class' => 'social_youtube',
                'color_class' => 'pin'
            ],
            'Instagram' => [
                'icon_class' => 'social_instagram',
                'color_class' => 'pin'
            ],
            'LinkedIn' => [
                'icon_class' => 'social_linkedin',
                'color_class' => 'in'
            ],
            'Pinterest' => [
                'icon_class' => 'social_pinterest',
                'color_class' => 'pin'
            ],
            'TikTok' => [
                'icon_class' => 'social_tiktok',
                'color_class' => ''
            ],
            'WhatsApp' => [
                'icon_class' => 'social_whatsapp',
                'color_class' => 'wa'
            ],
        ];

        return $configs[$platformName] ?? [
            'icon_class' => '',
            'color_class' => ''
        ];
    }

    public function store(Request $request): ?RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        $config = $this->getSocialMediaConfig($request->name);

        $added = SocialMedia::create([
            'name' => $request->name,
            'url' => $request->url,
            'icon_class' => $config['icon_class'],
            'color_class' => $config['color_class'],
            'is_active' => $request->has('is_active') ? 1 : 0,
            'order' => $request->order ?? 0,
        ]);

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the social media handle!');
        }

        return null;
    }

    public function show($id): Application|Factory|View
    {
        return view('user.social_media.view', [
            'social_media' => SocialMedia::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.social_media.edit', [
            'social_media' => SocialMedia::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id): ?RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        $config = $this->getSocialMediaConfig($request->name);

        $updated = SocialMedia::where('id', $id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon_class' => $config['icon_class'],
            'color_class' => $config['color_class'],
            'is_active' => $request->has('is_active') ? 1 : 0,
            'order' => $request->order ?? 0,
        ]);

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the social media handle!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (SocialMedia::where('id', $id)->delete()) {
            return redirect()->route('social-media.index')->with('status', 'You have successfully deleted the social media handle!');
        }

        return null;
    }
}

