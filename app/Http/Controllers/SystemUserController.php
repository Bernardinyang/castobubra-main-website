<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Services\HelperService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class SystemUserController extends Controller
{
    public function index()
    {
        $system_users = User::latest()->get();

        return view('user.system_users.manage', [
            'system_users' => $system_users
        ]);
    }

    public function create()
    {
        return view('user.system_users.add', [
            'roles' => Role::select('id', 'name')->latest()->get()
        ]);
    }

    public function store(StoreUserRequest $request): ?RedirectResponse
    {
        $dev_role = Role::where('name', 'developer')->first();
        $admin_role = Role::where('name', 'admin')->first();

        $user = new User;
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verified_at = now();
        $user->save();

        if ($request->role_id == 1) {
            $user->roles()->attach($dev_role);
        }
        $user->roles()->attach($admin_role);

        return redirect()->back()->with('status', 'You have successfully added a User!');

    }

    public function edit($id): RedirectResponse
    {
        return redirect()->back();
    }

    public function destroy($id): ?RedirectResponse
    {
        return redirect()->back();
//        $image = User::where('id', $id)->first()->image;
//        HelperService::removeImage($image, 'website_assets/images/board-of-directors/');
//
//        if (User::where('id', $id)->delete()) {
//            return redirect()->route('system_user.index')->with('status', 'You have successfully deleted a Board Member!');
//        }
//
//        return null;
    }
}
