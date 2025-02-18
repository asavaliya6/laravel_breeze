<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traitpost;

class TraitpostController extends Controller
{
    public function index(Request $request) {
          
        $traitpost = Traitpost::create([
            "title" => "Example Traitpost",
            "content" => "This is an example traitpost.",
        ]);
  
        $traitpost2 = Traitpost::create([
            "title" => "Example Traitpost",
            "content" => "This is an example traitpost 2.",
        ]);
  
        $traitpost3 = Traitpost::create([
            "title" => "Example Traitpost",
            "content" => "This is an example traitpost 3.",
        ]);
  
        dd($traitpost->toArray(), $traitpost2->toArray(), $traitpost3->toArray());
    }
}
