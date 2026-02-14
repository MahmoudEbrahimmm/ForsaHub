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


Route::group(["as"=> "dashboard.","middleware"=> "auth"], function () {

    Route::get('/', [DashboardController::class,'index'])->name('index');
    Route::resource('companies', CompanyController::class);
    Route::resource('resumes', ResumeController::class);
    Route::resource('applications', JobApplicationController::class);
    Route::resource('categories', JobCategoryController::class);
    Route::resource('Vacances', JobVacancyController::class);
    Route::resource('users', UserController::class);

});







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
