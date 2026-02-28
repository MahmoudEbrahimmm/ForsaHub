<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    View::composer('components.header-job', function ($view) {
        $view->with([
            'totalUsers'     => User::count(),
            'totalCompanies' => Company::count(),
            'totalJobs'      => JobVacancy::count(),
        ]);
    });

        Paginator::useBootstrapFive();
    }
}
