<?php

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\HR\CanidateController;
use App\Http\Controllers\HR\InterviewController;
use App\Http\Controllers\HR\RecruitmentController;
use App\Http\Controllers\Manager\CampaignController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'home']);
Route::get('/jobs', [JobController::class, 'list_jobs']);
Route::get('/jobs/{id}', [JobController::class, 'job_detail'])->where('id', '[0-9]+');
Route::post('/jobs/{id}', [JobController::class, 'apply'])->where('id', '[0-9]+');

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::prefix('company')->middleware(['auth'])->group(function () {
    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'update']);
    Route::post('/profile', [ProfileController::class, 'post_update']);

    // Only-admin routes
    Route::middleware([AuthAdmin::class])->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'list_users']);
            Route::get('create-account', [UserController::class, 'create']);
            Route::post('create-account', [UserController::class, 'post_create']);
            Route::get('update-account/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
            Route::post('update-account/{id}', [UserController::class, 'post_update'])->where('id', '[0-9]+');
            Route::get('delete-account/{id}', [UserController::class, 'delete'])->where('id', '[0-9]+');
        });
    });

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

    Route::prefix('campaign')->group(function () {
        Route::get('/', [CampaignController::class, 'list_campaigns']);
    });
});
