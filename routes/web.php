<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('user-management')->group(function () {
        Route::get('/', [UserController::class, 'list_users'])->name('user-management');
        Route::get('create-account', [UserController::class, 'create']);
        Route::post('create-account', [UserController::class, 'post_create']);
        Route::get('update-account/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
        Route::post('update-account/{id}', [UserController::class, 'post_update'])->where('id', '[0-9]+');
        Route::get('delete-account/{id}', [UserController::class, 'delete'])->where('id', '[0-9]+');
    });

    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::get('/login', function () {
    return view('session.login');
})->name('login');
