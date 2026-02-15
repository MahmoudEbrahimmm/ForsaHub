<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobCategoryRequest;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Active
        $query = JobCategory::latest();
        // Archived
        if($request->input("archived") == true){
            $query->onlyTrashed();
        }

        $categories = $query->paginate(10)->onEachSide(2);
        return view("dashboard.categories.index" , compact("categories"));

    }

    public function create()
    {
        return view("dashboard.categories.create");
    }

    public function store(JobCategoryRequest $request)
    {
        $validated = $request->validated();
        JobCategory::create($validated);
        return redirect()->route("dashboard.categories.index")->with("success","Created Category Successfully");
    }

    public function edit($id)
    {
        $category = JobCategory::findOrFail($id);
        return view("dashboard.categories.edit" , compact("category"));
    }

    public function update(JobCategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = JobCategory::findOrFail($id);
        $category->update($validated);

        return redirect()->route("dashboard.categories.index")->with("success","Updated Category name success");
    }

    public function destroy($id)
    {
        $category = JobCategory::findOrFail($id);
        $category->delete();
        return redirect()->route("dashboard.categories.index")->with("success","Deleted archived a category");
    }

    public function restore($id){
        $category = JobCategory::withTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route("dashboard.categories.index", ['archived' => 'true'])->with("success","Restored Category Successfully!");
    }
    public function deleteTrash($id){
        $category = JobCategory::withTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route("dashboard.categories.index", ['archived' => 'true'])->with("success","Deleted category successfull");
    }
}
