<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;
use Stevebauman\Location\Facades\Location;
use Illuminate\View\View;
    
class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  this code is send email via notification
    // public function index(Request $request)
    // {
    //     $user = User::find(1);
  
    //     $messages["hi"] = "Hey, Happy Birthday {$user->name}";
    //     $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";
          
    //     $user->notify(new BirthdayWish($messages));
  
    //     dd('Done');
    // }


    // this code is Get User Location using IP Address
    public function index(Request $request): View
    {
        $ipData = file_get_contents("https://api.ipify.org?format=json");
        $ip = json_decode($ipData)->ip;
        $currentUserInfo = Location::get($ip);
        return view('user', compact('currentUserInfo'));
    }
}
