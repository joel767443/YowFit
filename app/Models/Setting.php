<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where()
 */
class Setting extends Model
{
    use HasFactory;

    protected $casts = [
        'eating_times' => 'array',
        'exercise_times' => 'array',
        'work_times' => 'array',
        'relaxation_times' => 'array',
    ];
}
