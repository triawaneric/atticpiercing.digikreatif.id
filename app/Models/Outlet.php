<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'province',
        'phone',
        'email',
        'pic',
        'lat',
        'long',
        'thumbnail',
        'is_open',
        'is_active',
        'operational_hours',
    ];

    protected $casts = [
        'operational_hours' => 'array', // Mengkonversi kolom operational_hours ke array
    ];
}
