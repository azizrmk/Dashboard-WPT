<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;

class DashboardController extends Controller
{
    public function index()
    {
        $latest = Monitoring::latest()->first();

        $chart = Monitoring::latest()
                    ->take(10)
                    ->get()
                    ->reverse();

        return view('dashboard', compact(

            'latest',
            'chart'
        ));
    }
}