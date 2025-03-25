<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;

class PiechartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(MonthlyUsersChart $chart)
    {
        return view('piechart', ['chart' => $chart->build()]);
    }
}
