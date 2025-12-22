<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgrammeRequest;
use App\Models\Programme;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProgrammeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $programmes = Programme::orderBy('order', 'asc')->orderBy('type', 'asc')->latest()->get();
        return view('user.programme.manage', [
            'programmes' => $programmes
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('user.programme.add');
    }

    public function store(StoreProgrammeRequest $request): RedirectResponse
    {
        $added = Programme::create(array_merge($request->validated(), [
            'is_active' => $request->has('is_active')
        ]));

        if ($added) {
            return redirect()->route('programme.index')->with('status_type', 'success')->with('status_message', 'You have successfully added the programme!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }

    public function show($id): Factory|View|Application
    {
        return view('user.programme.view', [
            'programme' => Programme::where('id', $id)->first()
        ]);
    }

    public function edit($id): Factory|View|Application
    {
        return view('user.programme.edit', [
            'programme' => Programme::where('id', $id)->first()
        ]);
    }

    public function update(StoreProgrammeRequest $request, $id): RedirectResponse
    {
        $updated = Programme::where('id', $id)->update(array_merge($request->except('_token', '_method'), [
            'is_active' => $request->has('is_active')
        ]));

        if ($updated) {
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'You have successfully updated the programme!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }

    public function destroy($id): RedirectResponse
    {
        if (Programme::where('id', $id)->delete()) {
            return redirect()->route('programme.index')->with('status_type', 'success')->with('status_message', 'You have successfully deleted the programme!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }
}
