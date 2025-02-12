<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;
use Illuminate\View\View;
    
class UserController extends Controller
{   
    // ---Send Email Via Notification---
    // public function index(Request $request)
    // {
    //     $user = User::find(1);
  
    //     $messages["hi"] = "Hey, Happy Birthday {$user->name}";
    //     $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";
          
    //     $user->notify(new BirthdayWish($messages));
  
    //     dd('Done');
    // }


    public function index(Request $request): View
    {
        $users = User::search($request->search ?? '')->get();
          
        return view('users', compact('users'));
    }
}
