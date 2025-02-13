<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
    public function changeDateFormat()
    {

        $date = '2024-03-24 15:30:00'; 

        $formattedDate1 = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
        $formattedDate2 = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y');
        $formattedDate3 = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M, Y');

        return response()->json([
            'original' => $date,
            'd-m-Y'   => $formattedDate1, 
            'm/d/Y'   => $formattedDate2, 
            'd M, Y'  => $formattedDate3  
        ]);
    }

    public function showDateInBlade()
    {
        $date = Carbon::now();
        $user = \App\Models\User::first(); 
        return view('date', compact('date', 'user'));
    }

}
