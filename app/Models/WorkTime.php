<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkTime
 *
 * @property int $id
 * @property string eating_time_from
 * @property string eating_time_to
 * @property int meal_id
 * @property int schedule_id
 */
class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'eating_time_from',
        'eating_time_to',
        'meal_id',
        'schedule_id',
    ];

    /**
     * @var array|string[]
     */
    public static array $workTypes = ['Job', 'Personal', 'Freelance'];
}
