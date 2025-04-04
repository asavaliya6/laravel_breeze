<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;
use Illuminate\View\View;
    
class UserController extends Controller
{   
    public function index(Request $request): View
    {
        $users = User::search($request->search ?? '')->orderBy('id', 'asc')->get();
          
        return view('users', compact('users'));
    }
    
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function notification(Request $request)
    {
        $user = User::find(1);
  
        $messages["hi"] = "Hey, Happy Birthday {$user->name}";
        $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";
          
        $user->notify(new BirthdayWish($messages));
  
        dd('Done');
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('q');

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($users);
    }
}
