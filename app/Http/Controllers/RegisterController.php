<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('recruiter.session.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        // $attributes = request()->validate([
        //     'name' => ['required', 'max:50'],
        //     'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
        //     'password' => ['required', 'min:5', 'max:20'],
        //     'agreement' => ['accepted']
        // ]);

        // $attributes['password'] = bcrypt($attributes['password']);

        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();

        try {
            $user = User::create([
                'email' => $validated['email'],
                'password' => $validated['password'],
                'name' => $validated['name'],
                'phone' => $validated['phone']
            ]);

            Auth::login($user);

            Company::create([
                'name' => $validated['company_name'],
                'address' => $validated['address'],
                'hr_id' => $user->id
            ]);

            session()->flash('success', 'Tạo tài khoản thành công!');

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect('/dashboard');
    }
}
