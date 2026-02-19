<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index(Request $request)
    {
        // Active
        $query = Company::latest();
        $users = User::all();
        // Archived
        if ($request->input("archived") == true) {
            $query->onlyTrashed();
        }

        $companies = $query->paginate(10)->onEachSide(2);
        return view("dashboard.companies.index", compact(['companies', 'users']));
    }

    public function create()
    {
        $owners = User::all();
        return view("dashboard.companies.create", compact(["owners"]));
    }

    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        Company::create($validated);
        return redirect()->route("dashboard.companies.index")->with("success", "Created company Successfully");
    }

    public function show($id = null)
    {
        if($id)
            $company = Company::findOrFail($id);
        else{
            $company = Company::where('owner_id', auth()->user()->id)->first();
        }
        return view('dashboard.companies.show', compact('company'));
    }

    public function edit($id = null)
    {
        $owners = User::all();
        if($id)
            $company = Company::findOrFail($id);
        else{
            $company = Company::where('owner_id', auth()->user()->id)->first();
        }
        return view("dashboard.companies.edit", compact(['company','owners']));
    }

    public function update(CompanyRequest $request, $id = null)
    {
        $validated = $request->validated();
        if($id){
            $company = Company::findOrFail($id);
        }else {
            $company = Company::where('owner_id',auth()->user()->id)->first();
        }
        $company->update($validated);

        if(auth()->user()->role == 'company-owner'){
        return redirect()->route("dashboard.my-company.show")->with("success", "Updated company success");
        }

        return redirect()->route("dashboard.companies.index")->with("success", "Updated company name success");
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route("dashboard.companies.index")->with("success", "Deleted archived a company");
    }

    public function restore($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->restore();
        return redirect()->route("dashboard.companies.index", ['archived' => 'true'])->with("success", "Restored company Successfully!");
    }
    public function deleteTrash($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->forceDelete();
        return redirect()->route("dashboard.companies.index", ['archived' => 'true'])->with("success", "Deleted company successfull");
    }
}

