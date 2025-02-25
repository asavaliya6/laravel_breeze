<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\View\View;

class HighchartController extends Controller
{
    public function index(): View
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("MONTH(created_at)"))
                    ->orderBy(DB::raw("MONTH(created_at)"))
                    ->pluck('count', 'month'); 
                    
        $monthlyData = array_fill(1, 12, 0);
        foreach ($users as $month => $count) {
            $monthlyData[$month] = $count;
        }

        return view('chart', ['users' => array_values($monthlyData)]);
    }

}
