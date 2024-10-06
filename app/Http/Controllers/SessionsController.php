<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('recruiter.session.login-session');
    }

    public function store(SignInRequest $request)
    {
        $attributes = $request->validated();

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect('dashboard')->with(['success' => 'Đăng nhập thành công']);
        } else {

            return back()->withErrors(['error' => 'Email hoặc mật khẩu không đúng']);
        }
    }

    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
