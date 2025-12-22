<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Services\HelperService;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('editor.post.manage', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('editor.post.add', [
            'categories' => Category::all()
        ]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {

        $slug = Str::slug($request->title);
        $banner = HelperService::uploadImage($slug, $request->banner_img, 'website_assets/img/posts/', 800, 562);

        $added = Post::create(array_merge($request->validated(), [
            'slug' => $slug,
            'user_id' => auth()->user()->id,
            'banner_img' => $banner,
            'published_at' => $request->publish ? now() : NULL
        ]));

        if($added) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                Tag::create([
                    'name' => $tag,
                    'post_id' => $added->id,
                    'slug' => Str::slug($tag)
                ]);
            }

            return redirect()->back()->with([
                'status' => 'You have successfully added the post!',
                'post' => $added->id
            ]);
        }

        return redirect()->back()->with('status', 'There was an error, kindly try again');
    }

    public function show($id)
    {
        return view('editor.post.view', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('editor.post.edit', [
            'post' => Post::where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    public function update(StorePostRequest $request, $id): ?RedirectResponse
    {
        $post = Post::where('id', $id)->first();
        $slug = Str::slug($request->title);

        if ($request->banner_img) {
            HelperService::removeImage($post->banner_img, 'website_assets/img/posts/');
            $banner = HelperService::uploadImage($slug, $request->banner_img, 'website_assets/img/posts/', 800, 562);
        }

        $updated = Post::where('id', $id)->update(array_merge($request->validated(), [
            'slug' => $slug,
            'user_id' => auth()->user()->id,
            'banner_img' => $request->banner_img ? $banner : $post->banner_img,
            'published_at' => $request->publish ? now() : NULL
        ]));

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the post!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        $post = Post::where('id', $id)->first();
        HelperService::removeImage($post->banner_img, 'website_assets/img/posts/');

        if (Post::where('id', $id)->delete()) {
            return redirect()->route('post.index')->with('status', 'You have successfully deleted the post!');
        }

        return null;
    }

    public function publish($id): RedirectResponse
    {
        $published_at = (bool)Post::where([
            ['id', $id],
        ])->first()->published_at;

        if ($published_at) {
            Post::where([
                ['id', $id],
                ['published_at', '!=', NULL]
            ])->update([
                'published_at' => NULL
            ]);
        } else {
            Post::where([
                ['id', $id],
                ['published_at', NULL]
            ])->update([
                'published_at' => now()
            ]);
        }

        return redirect()->back()->with('status_message', 'You have successfully changed the status of the post!')->with('status_type', 'success');
    }
}
