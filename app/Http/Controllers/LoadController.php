<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Load;

class LoadController extends Controller
{
    public function index(Request $request)
    {
        $loads = Load::paginate(3);
  
        if ($request->ajax()) {
            $view = view('autodata', compact('loads'))->render();
  
            return response()->json(['html' => $view]);
        }
  
        return view('loads', compact('loads'));
    }
}
