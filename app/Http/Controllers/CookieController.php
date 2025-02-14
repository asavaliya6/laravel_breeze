<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class CookieController extends Controller
{
    public function setCookie()
    {
        Cookie::queue('test-cookie', 'This is a test cookie.', 120);
        return response()->json(['message' => 'Cookies set successfully.'])
            ->cookie('test-cookie-2', 'Another test cookie.', 120);
    }

    public function getCookie(Request $request)
    {
        $cookie1 = Cookie::get('test-cookie');
        $cookie2 = $request->cookie('test-cookie-2');

        return response()->json([
            'test-cookie' => $cookie1,
            'test-cookie-2' => $cookie2
        ]);
    }

    public function deleteCookie()
    {
        Cookie::queue(Cookie::forget('test-cookie'));
        Cookie::queue(Cookie::forget('test-cookie-2'));

        return response()->json(['message' => 'Cookies deleted successfully.']);
    }
}
