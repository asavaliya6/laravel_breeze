<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realuser;
use App\Models\Realrole;

class RealroleController extends Controller
{
    // Assign Roles to User
    public function assignRoles(Request $request, $userId)
    {
        $user = Realuser::findOrFail($userId);
        $user->realroles()->sync($request->role_ids);

        return response()->json(['message' => 'Roles assigned successfully!', 'user' => $user]);
    }

    // Get User's Roles
    public function getUserRoles($userId)
    {
        $user = Realuser::findOrFail($userId);
        return response()->json(['user' => $user, 'roles' => $user->realroles]);
    }

    // Get Role's Users
    public function getRoleUsers($roleId)
    {
        $role = Realrole::findOrFail($roleId);
        return response()->json(['role' => $role, 'users' => $role->realusers]);
    }
}

