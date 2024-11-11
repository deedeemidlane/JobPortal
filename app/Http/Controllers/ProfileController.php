<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update()
    {
        $current_user = Auth::user();

        return view('hr.profile', [
            "tab_name" => "Quản lý tài khoản",
            "breadcrumb_url" => "/company/profile",
            "current_user" => $current_user
        ]);
    }

    public function post_update(UpdateProfileRequest $request)
    {
        $validated = $request->validated();
        $user = User::findOrFail(Auth::user()->id);
        $user->name = !is_null($validated['name']) ? $validated['name'] : $user->name;
        $user->email = !is_null($validated['email']) ? $validated['email'] : $user->email;
        $user->phone = !is_null($validated['phone']) ? $validated['phone'] : $user->phone;
        $user->password = !is_null($validated['password']) ? bcrypt($validated['password']) : $user->password;
        $user->save();

        session()->flash('success', 'Cập nhật tài khoản thành công!');

        return redirect('/company/profile');
    }
}
