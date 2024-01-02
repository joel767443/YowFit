<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkTime
 */
class WorkTime extends Model
{
    use HasFactory;

    /**
     * @var array|string[]
     */
    public static array $workTypes = ['Job', 'Personal', 'Freelance'];
}
