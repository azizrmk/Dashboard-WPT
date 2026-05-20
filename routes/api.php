<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;

Route::get('/sensor', function () {

    return response()->json([

        'status' => 'API AKTIF'
    ]);
});

Route::post('/sensor', [SensorController::class, 'store']);