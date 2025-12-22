<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemServerSettingRequest;
use App\Http\Requests\StoreSystemSettingRequest;
use App\Models\SystemSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('user.system_setting', [
            'setting' => SystemSetting::find(1)
        ]);
    }

    public function update(StoreSystemSettingRequest $request): RedirectResponse
    {
        $added = SystemSetting::find(1)->update($request->validated());

        if($added) {
            return redirect()->back()->with('status_type', 'success')->with('status_message', 'You have successfully updated the system settings!');
        }

        return redirect()->back()->with('status_type', 'danger')->with('status_message', 'Something went wrong, Kindly try again!');
    }

    public function serverUpdate(StoreSystemServerSettingRequest $request): RedirectResponse
    {
        $added = SystemSetting::find(1)->update($request->validated());

        if($added) {
            return redirect()->back()->with('server_status_type', 'success')->with('server_status_message', 'You have successfully updated the system settings!');
        }

        return redirect()->back()->with('server_status_type', 'danger')->with('server_status_message', 'Something went wrong, Kindly try again!');
    }
}
