<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'growth_time_days',
        'description',
        'image_path',
    ];

    protected $casts = [
        'growth_time_days' => 'integer',
    ];
}
