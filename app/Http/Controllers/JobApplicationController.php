<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        // Active
        $query = JobApplication::latest();
        if (auth()->user()->role == 'company-owner') {
            $query->whereHas('jobVacancy', function ($q) {
                $q->where('company_id', auth()->user()->company->id);
            });
        }

        // Archived
        if ($request->input("archived") == true) {
            $query->onlyTrashed();
        }

        $applications = $query->paginate(10)->onEachSide(2);
        return view("dashboard.applications.index", compact(['applications']));
    }

    public function show($id)
    {
        $application = JobApplication::findOrFail($id);
        return view('dashboard.applications.show', compact(['application']));
    }

    public function edit($id)
    {
        $application = JobApplication::findOrFail($id);
        return view('dashboard.applications.edit', compact(['application']));
    }

    public function update(JobApplicationRequest $request, $id)
    {
        $application = JobApplication::findOrFail($id);
        $application->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->route('dashboard.applications.index')->with('success', 'Updated job application successfully!');
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();
        return redirect()->route('dashboard.applications.index')->with('success', 'Deleted archived a job application');
    }

    public function restore($id)
    {
        $application = JobApplication::withTrashed()->findOrFail($id);
        $application->restore();
        return redirect()->route("dashboard.applications.index", ['archived' => 'true'])->with("success", "Restored a job application Successfully!");
    }
    public function deleteTrash($id)
    {
        $application = JobApplication::withTrashed()->findOrFail($id);
        $application->forceDelete();
        return redirect()->route("dashboard.applications.index", ['archived' => 'true'])->with("success", "Deleted a job application successfull");
    }
}
