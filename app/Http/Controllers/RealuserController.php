<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realuser;
use App\Models\Realphone;

class RealuserController extends Controller
{
    // Create User with Phone
    public function store(Request $request)
    {
        $user = Realuser::create($request->only(['name', 'email']));
        $phone = new Realphone(['phone' => $request->phone]);
        $user->realphone()->save($phone);

        return response()->json(['message' => 'User and phone created successfully!', 'user' => $user, 'phone' => $phone]);
    }

    // Get User's Phone
    public function getUserPhone($id)
    {
        $user = Realuser::findOrFail($id);
        return response()->json(['user' => $user, 'phone' => $user->realphone]);
    }

    // Get Phone's User
    public function getPhoneUser($id)
    {
        $phone = Realphone::findOrFail($id);
        return response()->json(['phone' => $phone, 'user' => $phone->realuser]);
    }
}

