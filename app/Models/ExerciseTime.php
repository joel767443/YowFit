<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ExerciseTime
 * @method static create(array $array)
 * @method static where(string $string)
 * @method static whereIn(string $string, int $int)
 */
class ExerciseTime extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'exercise_time_from',
        'exercise_time_to',
        'schedule_id',
        'exercise_id',
    ];

    /**
     * Get the exercise associated with the exercise time.
     * @return BelongsTo
     */
    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}
