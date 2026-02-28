<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Active
        $query = User::latest();
        // Archived
        if ($request->input("archived") == true) {
            $query->onlyTrashed();
        }

        $users = $query->paginate(10)->onEachSide(2);
        return view("dashboard.users.index", compact(['users']));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact(['user']));
    }

    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);
        return redirect()->route('dashboard.users.index')->with('success', 'Updated data-user successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'Deleted archived a job user');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route("dashboard.users.index", ['archived' => 'true'])->with("success", "Restored a job user Successfully!");
    }
    public function deleteTrash($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->route("dashboard.users.index", ['archived' => 'true'])->with("success", "Deleted a job user successfull");
    }
}
