<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobVacanceRequest;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
public function index(Request $request)
    {
        // Active
        $query = JobVacancy::latest();
        // Archived
        if ($request->input("archived") == true) {
            $query->onlyTrashed();
        }

        $vacances = $query->paginate(7)->onEachSide(2);
        return view("dashboard.vacances.index", compact(['vacances']));
    }

    public function create()
    {
        $categories = JobCategory::all();
        $companies = Company::all();
        return view('dashboard.vacances.create', compact(['categories','companies']));
    }

    public function store(JobVacanceRequest $request)
    {
        $validated = $request->validated();
        JobVacancy::create($validated);

        return redirect()->route('dashboard.vacances.index')->with('success','job vacances created successfully!');
    }

    public function show($id)
    {
        $vacance = JobVacancy::findOrFail($id);
        return view('dashboard.vacances.show', compact(['vacance']));
    }

    public function edit($id)
    {
        $vacance = JobVacancy::findOrFail($id);
        $categories = JobCategory::all();
        $companies = Company::all();
        return view('dashboard.vacances.edit', compact(['vacance','categories','companies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobVacanceRequest $request, $id)
    {
        $validated = $request->validated();
        $vacance = JobVacancy::findOrFail($id);
        $vacance->update($validated);
        
        return redirect()->route('dashboard.vacances.index')->with('success','job vacances updated successfully!');
    }

public function destroy($id)
    {
        $vacance = JobVacancy::findOrFail($id);
        $vacance->delete();
        return redirect()->route("dashboard.vacances.index")->with("success", "Deleted archived a vacance");
    }

    public function restore($id)
    {
        $vacance = JobVacancy::withTrashed()->findOrFail($id);
        $vacance->restore();
        return redirect()->route("dashboard.vacances.index", ['archived' => 'true'])->with("success", "Restored vacance Successfully!");
    }
    public function deleteTrash($id)
    {
        $vacance = JobVacancy::withTrashed()->findOrFail($id);
        $vacance->forceDelete();
        return redirect()->route("dashboard.vacances.index", ['archived' => 'true'])->with("success", "Deleted vacance successfull");
    }
}
