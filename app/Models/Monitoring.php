<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $fillable = [
        'ldr',
        'lampu',
        'mode',
        'tegangan',
        'arus',
        'daya',
    ];

    protected $casts = [
        'lampu' => 'boolean',
        'tegangan' => 'float',
        'arus' => 'float',
        'daya' => 'float',
    ];
}
