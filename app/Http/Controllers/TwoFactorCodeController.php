<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorCodeController extends Controller
{
    public function verify()
    {
        return view('auth.verify');
    }

    public function verifyPost(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        $user = Auth::user();

        if ($user->two_factor_code == $request->code && now()->lt($user->two_factor_expires_at)) {
            $user->update(['two_factor_verified' => true]);
            return redirect()->intended('dashboard')->with('success', 'OTP Verified Successfully!');
        }

        return back()->withErrors(['code' => 'Invalid or expired OTP.']);
    }

    public function resend()
    {
        $user = Auth::user();
        $user->regenerateTwoFactorCode();
        $user->notify(new TwoFactorCodeNotification());

        return back()->with('success', 'OTP code has been resent.');
    }
}
