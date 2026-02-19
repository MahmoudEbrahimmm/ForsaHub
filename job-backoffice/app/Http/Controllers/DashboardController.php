<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $activeUser = User::where('last_login_at', '>=', now()
        ->subDays(30))
        ->where('role','job-seeker')
        ->count();

        $totalJobs = JobVacancy::whereNull('deleted_at')->count();
        $jobApplication = JobApplication::whereNull('deleted_at')->count();

        $mostJobs = JobVacancy::withCount('jobApplications as totalCount')
        ->whereNull('deleted_at')
        ->orderByDesc('totalCount')
        ->limit(7)
        ->get();

        $convertionRates = JobVacancy::withCount('jobApplications as totalCount')
        ->having('totalCount', '>', 0)
        ->orderByDesc('totalCount')
        ->limit(7)
        ->get()
        ->map(function($job){
            if($job->viewCount > 0){
                $job->convertionRates = round($job->totalCount / $job->viewCount * 100, 2);
            }else{
                $job->convertionRates = 0;
            }
            return $job;
        });

        return view("dashboard.index", compact([
            'activeUser', 'totalJobs', 'jobApplication', 'mostJobs', 'convertionRates'
        ]));
    }
}
