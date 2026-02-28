<?php

use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\JobApplicationsController;
use App\Http\Controllers\frontend\JobVacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');

Route::resource('/contact',ContactController::class);

Route::middleware('auth')->group(function () {
    Route::get('/job-vacancy/index',[HomeController::class,'index'])->name('frontend.job-vacancy.index');
    Route::get('/applications/index',[JobApplicationsController::class,'index'])->name('frontend.applications.index');
    // JobVacancy
    Route::get('/job-vacancy/show/{id}',[JobVacancyController::class,'show'])->name('frontend.job-vacancy.show');
    Route::get('/job-vacancy/apply/{id}',[JobVacancyController::class,'apply'])->name('frontend.job-vacancy.apply');
    Route::post('/job-vacancy/apply/{id}',[JobVacancyController::class,'proccessApplication'])->name('frontend.job-vacancy.proccess-Application');

    });

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
