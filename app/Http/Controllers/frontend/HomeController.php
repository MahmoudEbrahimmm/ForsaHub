<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $companies = Company::select('name')
            ->latest()->paginate(20);
        $jobVacancy = JobVacancy::paginate(10);
        $categories = JobCategory::paginate(10);

        return view('home', compact([
            'companies',
            'jobVacancy',
            'categories',
        ]));
    }

    public function index(Request $request)
    {
        $query = JobVacancy::query();
        if ($request->has('search')) {
            $query->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('location', 'like', '%'.$request->search.'%')
                ->orWhereHas('company', function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->search.'%');
                });
        }

        if ($request->has('filter')) {
            $query->where('type', $request->filter);
        }

        $jobs = $query->latest()->paginate(10)->withQueryString();

        return view('frontend.job-vacancy.index', compact(['jobs']));
    }

}
