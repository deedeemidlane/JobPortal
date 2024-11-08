<?php

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\HR\CanidateController;
use App\Http\Controllers\HR\InterviewController;
use App\Http\Controllers\HR\RecruitmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'home']);
Route::get('/jobs', [JobController::class, 'list_jobs']);
Route::get('/jobs/{id}', [JobController::class, 'job_detail'])->where('id', '[0-9]+');
Route::post('/jobs/{id}', [JobController::class, 'apply'])->where('id', '[0-9]+');

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

Route::prefix('hr')->middleware(['auth'])->group(function () {
    Route::prefix('recruitment-news')->group(function () {
        Route::get('/', [RecruitmentController::class, 'list_recruitment_news']);
        Route::get('create', [RecruitmentController::class, 'create']);
        Route::post('create', [RecruitmentController::class, 'post_create']);
        Route::get('update/{id}', [RecruitmentController::class, 'update'])->where('id', '[0-9]+');
        Route::post('update/{id}', [RecruitmentController::class, 'post_update'])->where('id', '[0-9]+');
        Route::get('delete/{id}', [RecruitmentController::class, 'delete'])->where('id', '[0-9]+');
    });

    Route::prefix('applications')->group(function () {
        Route::get('/', [CanidateController::class, 'list_applications']);
        Route::get('delete/{id}', [CanidateController::class, 'delete'])->where('id', '[0-9]+');
    });

    Route::get('interview-management', [InterviewController::class, 'list_interviews']);

    Route::get('/logout', [SessionsController::class, 'destroy']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::get('/login', function () {
    return view('session.login');
})->name('login');
