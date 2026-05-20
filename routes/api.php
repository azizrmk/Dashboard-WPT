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

    return Monitoring::latest()->first();
});