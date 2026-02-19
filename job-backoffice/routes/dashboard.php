<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(["as"=> "dashboard.", 'middleware' => ['auth', 'role:admin,company-owner'] ], function () {
    // Shared Routes
    Route::get('/', [DashboardController::class,'index'])->name('index');

    // JobVacancy Route
    Route::resource('vacances', JobVacancyController::class);
    Route::get('vacances/{id}/restore',[JobVacancyController::class,'restore'])->name('vacances.restore');
    Route::delete('vacances/{id}/delete',[JobVacancyController::class,'deleteTrash'])->name('vacances.delete');

    // JobApplication Route
    Route::resource('applications', JobApplicationController::class);
    Route::get('applications/{id}/restore',[JobApplicationController::class,'restore'])->name('applications.restore');
    Route::delete('applications/{id}/delete',[JobApplicationController::class,'deleteTrash'])->name('applications.delete');

});

// Company Routes
Route::group(["as"=> "dashboard.", 'middleware' => ['auth', 'role:company-owner'] ], function () {
    Route::get('my-company/show', [CompanyController::class,'show'])->name('my-company.show');
    Route::get('my-company/edit', [CompanyController::class,'edit'])->name('my-company.edit');
    Route::put('my-company/update', [CompanyController::class,'update'])->name('my-company.update');
});

// Admin Routes
Route::group(["as"=> "dashboard.", 'middleware' => ['auth', 'role:admin'] ], function () {
    // Resumes Route
    Route::resource('resumes', ResumeController::class);
    // Categories Route
    Route::resource('categories', JobCategoryController::class);
    Route::get('categories/{id}/restore',[JobCategoryController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{id}/delete',[JobCategoryController::class,'deleteTrash'])->name('categories.delete');

    // Companies Route
    Route::resource('companies', CompanyController::class);
    Route::get('companies/{id}/restore',[CompanyController::class,'restore'])->name('companies.restore');
    Route::delete('companies/{id}/delete',[CompanyController::class,'deleteTrash'])->name('companies.delete');

    // User Route
    Route::resource('users', UserController::class);
    Route::get('users/{id}/restore',[UserController::class,'restore'])->name('users.restore');
    Route::delete('users/{id}/delete',[UserController::class,'deleteTrash'])->name('users.delete');

});
