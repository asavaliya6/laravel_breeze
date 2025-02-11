<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function index(Request $request): View
    {
        $ipData = file_get_contents("https://api.ipify.org?format=json");
        $ip = json_decode($ipData)->ip;
        $currentUserInfo = Location::get($ip);
        return view('address', compact('currentUserInfo'));
    }
}
