<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        Monitoring::create([

            'ldr' => $request->ldr,

            'lampu' => $request->lampu,

            'mode' => $request->mode
        ]);

        return response()->json([

            'status' => 'success'
        ]);
    }
}