<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use DB;
    
class ChartJSController extends Controller
{
    public function index(): View
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
              
        return view('chartjs', compact('labels', 'data'));
    }
}
