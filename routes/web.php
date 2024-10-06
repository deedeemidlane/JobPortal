<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('candidate.home', [
        'current_page' => 'home',
    ]);
});

Route::get('/job-list', function () {
    return view('candidate.job-list', [
        'current_page' => 'job-list',
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('recruiter.dashboard');
    })->name('dashboard');

    Route::get('billing', function () {
        return view('recruiter.billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('recruiter.profile');
    })->name('profile');

    Route::get('user-management', function () {
        return view('recruiter.laravel-examples.user-management');
    })->name('user-management');

    Route::get('tables', function () {
        return view('recruiter.tables');
    })->name('tables');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('recruiter.dashboard');
    })->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
    return view('recruiter/session/login-session');
})->name('login');
