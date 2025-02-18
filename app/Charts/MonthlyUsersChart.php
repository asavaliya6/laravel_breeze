<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;
use DB;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
    
    public function build()
    {
        $months = collect([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ]);

        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("MONTHNAME(created_at)"))
                    ->orderBy(DB::raw("MONTH(created_at)"))
                    ->get()
                    ->pluck('count', 'month_name');

        $data = $months->map(function ($month) use ($users) {
            return $users->get($month, 0);
        });

        return $this->chart->pieChart()
            ->setTitle('New Users - '.date('Y'))
            ->addData($data->values()->toArray())
            ->setLabels($months->toArray());
    }
}
