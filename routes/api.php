<?php

use App\Http\Controllers\SensorController;
use App\Models\Monitoring;
use Illuminate\Support\Facades\Route;

Route::get('/sensor', function () {

    return response()->json([

        'status' => 'API AKTIF',
    ]);
});

Route::post('/sensor', [SensorController::class, 'store']);

Route::get('/latest', function () {

    $timeoutSeconds = 10;
    $data = Monitoring::latest()->first();

    if (! $data) {
        return response()->json([
            'status' => 'offline',
            'is_online' => false,
            'last_seen_seconds' => null,
            'timeout_seconds' => $timeoutSeconds,
            'ldr' => 0,
            'lampu' => false,
            'mode' => '-',
            'tegangan' => 0,
            'arus' => 0,
            'daya' => 0,
            'created_at' => null,
        ]);
    }

    $lastSeenSeconds = (int) $data->created_at->diffInSeconds(now());
    $isOnline = $lastSeenSeconds <= $timeoutSeconds;

    return response()->json([

        'status' => $isOnline ? 'online' : 'offline',

        'is_online' => $isOnline,

        'last_seen_seconds' => $lastSeenSeconds,

        'timeout_seconds' => $timeoutSeconds,

        'ldr' => $isOnline ? $data->ldr : 0,

        'lampu' => $isOnline ? $data->lampu : false,

        'mode' => $data->mode,

        'tegangan' => $isOnline ? ($data->tegangan ?? 0) : 0,

        'arus' => $isOnline ? ($data->arus ?? 0) : 0,

        'daya' => $isOnline ? ($data->daya ?? 0) : 0,

        'created_at' => $data->created_at,
    ]);
});
