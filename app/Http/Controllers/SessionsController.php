<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login');
    }

    public function store(SignInRequest $request)
    {
        $attributes = $request->validated();

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            $user = Auth::user();
            session()->flash('success', 'Đăng nhập thành công!');

            switch ($user->role) {
                case "ADMIN":
                    return redirect('/company/users');
                    break;
                case "HR":
                    return redirect('/company/recruitment-news');
                default:
                    return redirect("/");
            }
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
