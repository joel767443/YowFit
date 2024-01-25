<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class ScheduleTime
 * @method static create(array $array)
 * @method static where(string $string)
 * @method static whereIn(string $string, int $int)
 */
class ScheduleTime extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'schedule_id',
        'exercise_id',
    ];

    /**
     * @return MorphTo
     */
    public function scheduleable(): MorphTo
    {
        return $this->morphTo();
    }
}
