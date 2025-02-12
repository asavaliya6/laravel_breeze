<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->lang;

        if (!in_array($lang, ['en', 'gu', 'hi'])) {
            abort(400, 'Invalid Language Selection');
        }

        Session::put('locale', $lang);
        App::setLocale($lang);

        return redirect()->back();
    }
}
