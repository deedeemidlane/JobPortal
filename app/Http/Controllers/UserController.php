<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.create-account', ["tab_name" => "Quản lý tài khoản"]);
    }

    public function store(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();

        try {
            User::create([
                'email' => $validated['email'],
                'password' => $validated['password'],
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'role' => $validated['role']
            ]);

            session()->flash('success', 'Tạo tài khoản thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('/admin/user-management');
    }

    public function list_users()
    {
        $users = User::where("role", "HR")->orWhere("role", "MANAGER")->get();
        return view('admin.user-management', [
            "tab_name" => "Quản lý tài khoản",
            "users" => $users
        ]);
    }
}
