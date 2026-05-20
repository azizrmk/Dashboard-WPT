<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Models\Monitoring;

Route::get('/sensor', function () {

    return response()->json([

        'status' => 'API AKTIF'
    ]);
});

Route::post('/sensor', [SensorController::class, 'store']);

Route::get('/latest', function () {

    $data = Monitoring::latest()->first();

    return response()->json([

        'ldr' => $data->ldr,

        'lampu' => $data->lampu,

        'mode' => $data->mode,

        // =======================
        // DUMMY DATA
        // =======================

        'tegangan' => rand(11,13),

        'arus' => rand(70,95) / 100,

        'daya' => rand(8,15)
    ]);
});