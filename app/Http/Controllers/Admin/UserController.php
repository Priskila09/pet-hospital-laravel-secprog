<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('pages.admin.users.index', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('pages.admin.users.edit_role', [
            'title' => 'Edit User Role',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'roles' => 'required|in:user,admin',
        ]);

        // Update the roles field
        $user->roles = $validatedData['roles'];
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully!');
    }
}
