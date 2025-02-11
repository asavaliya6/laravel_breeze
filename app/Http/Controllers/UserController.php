<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;
    
class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(1);
  
        $messages["hi"] = "Hey, Happy Birthday {$user->name}";
        $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";
          
        $user->notify(new BirthdayWish($messages));
  
        dd('Done');
    }
}
