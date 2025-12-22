<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FAQController extends Controller
{
    public function index(): Factory|View|Application
    {
        $faqs = FAQ::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('user.faq.manage', [
            'faqs' => $faqs
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.faq.add');
    }

    public function store(FAQRequest $request): ?RedirectResponse
    {
        $added = FAQ::create(array_merge($request->validated(), [
            'user_id' => auth()->user()->id,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'order' => $request->order ?? 0,
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'You have successfully added the FAQ!');
        }

        return null;
    }

    public function show($id): Application|Factory|View
    {
        return view('user.faq.view', [
            'faq' => FAQ::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.faq.edit', [
            'faq' => FAQ::where('id', $id)->first()
        ]);
    }

    public function update(FAQRequest $request, $id): ?RedirectResponse
    {
        $updated = FAQ::where('id', $id)->update(array_merge($request->validated(), [
            'is_active' => $request->has('is_active') ? 1 : 0,
            'order' => $request->order ?? 0,
        ]));

        if ($updated) {
            return redirect()->back()->with('status', 'You have successfully updated the FAQ!');
        }

        return null;
    }

    public function destroy($id): ?RedirectResponse
    {
        if (FAQ::where('id', $id)->delete()) {
            return redirect()->route('faq.index')->with('status', 'You have successfully deleted the FAQ!');
        }

        return null;
    }
}

