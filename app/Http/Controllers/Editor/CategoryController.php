<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('editor.category.manage', [
            'categories' => Category::latest()->get()
        ]);
    }


    public function create()
    {
        return view('editor.category.add');
    }

    public function store(StoreCategoryRequest $request): ?RedirectResponse
    {
        $slug = Str::slug($request->name);

        $added = Category::create(array_merge($request->validated(), [
            'slug' => $slug,
        ]));

        if($added) {
            return redirect()->back()->with('status', 'You have successfully added the category!');
        }

        return null;
    }

    public function edit($id)
    {
        return view('editor.category.edit', [
            'category' => Category::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id): ?RedirectResponse
    {
        $updated = Category::where('id', $id)->update(array_merge($request->except('_token', '_method'), [
            'slug' => Str::slug($request->name),
        ]));

        if($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the category!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (Category::where('id', $id)->delete()) {
            return redirect()->route('category.index')->with('status', 'You have successfully deleted the category!');
        }

        return null;
    }
}
