<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
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

Route::prefix("admin")->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('user-management', [UserController::class, 'list_users'])->name('user-management');

    Route::get('create-account', [UserController::class, 'create']);

    Route::post('create-account', [UserController::class, 'store']);

    Route::get('/logout', [SessionsController::class, 'destroy']);
});





Route::group(['middleware' => 'auth'], function () {
    // Route::get('dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');

    Route::get('billing', function () {
        return view('admin.billing', ["tab_name" => "Profile"]);
    })->name('billing');

    Route::get('profile', function () {
        return view('admin.profile', ["tab_name" => "Profile"]);
    })->name('profile');



    Route::get('tables', function () {
        return view('admin.tables', ["tab_name" => "Profile"]);
    })->name('tables');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('admin.dashboard');
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
    return view('admin.session.login-session');
})->name('login');
