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
    Route::resource('vacances', JobVacancyController::class);
    Route::resource('users', UserController::class);

    // Trash Categories Route
    Route::get('categories/{id}/restore',[JobCategoryController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{id}/delete',[JobCategoryController::class,'deleteTrash'])->name('categories.delete');
    // Trash Companies Route
    Route::get('companies/{id}/restore',[CompanyController::class,'restore'])->name('companies.restore');
    Route::delete('companies/{id}/delete',[CompanyController::class,'deleteTrash'])->name('companies.delete');
    // Trash JobVacancy Route
    Route::get('vacances/{id}/restore',[JobVacancyController::class,'restore'])->name('vacances.restore');
    Route::delete('vacances/{id}/delete',[JobVacancyController::class,'deleteTrash'])->name('vacances.delete');

});







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
