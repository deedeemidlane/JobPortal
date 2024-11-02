<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('admin.session.login-session');
    }

    public function store(SignInRequest $request)
    {
        $attributes = $request->validated();

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            $user = Auth::user();

            switch ($user->role) {
                case "ADMIN":
                    session()->flash('success', 'Đăng nhập thành công!');
                    return redirect('/admin/dashboard');
                    break;
                default:
                    return redirect("/");
            }

            return redirect('dashboard')->with(['success' => 'Đăng nhập thành công']);
        } else {
            return back()->withErrors(['error' => 'Email hoặc mật khẩu không đúng']);
        }
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success' => 'Bạn đã đăng xuất']);
    }
}
