<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ldr' => ['required', 'integer', 'min:0'],
            'lampu' => ['required', 'boolean'],
            'mode' => ['required', 'string', 'max:50'],
            'tegangan' => ['nullable', 'numeric', 'min:0'],
            'arus' => ['nullable', 'numeric', 'min:0'],
            'daya' => ['nullable', 'numeric', 'min:0'],
        ]);

        $monitoring = Monitoring::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $monitoring,
        ], 201);
    }
}
