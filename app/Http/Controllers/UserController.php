<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showAll(Request $request) : View
    {
        $users = User::all();
        return view('user.all', ['users' => $users]);
    }

    public function showAllRoles(Request $request) : View
    {
        $roles = Role::with('users')->get();
        return view('role.all', ['roles' => $roles]);
    }

    public function addRoleToUser(Request $request) : RedirectResponse {
        $user = $request->user();
        if ($user->roles()->where('name', 'Admin')->exists()) {
            $validated = $request->validate([
                'user_id' => ['required', 'integer', 'exists:users,id'],
                'role_id' => ['required', 'integer', 'exists:roles,id'],
            ]);
            $userId = $validated['user_id'];
            $roleId = $validated['role_id'];

            $user = User::findOrFail($userId);

            $user->roles()->syncWithoutDetaching([$roleId]);
        }
        else
        {
            abort(403);
        }
        return redirect()->route('tasks.index');
    }
}
