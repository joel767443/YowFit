<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Schedule
 */
class Schedule extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'day_of_week',
        'wakeup_time',
        'exercise_time',
        'eating_time',
        'sleeping_time',
        'relaxation_time',
    ];

    /**
     * Get the user that owns the schedule.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exercise times associated with the schedule.
     * @return BelongsToMany
     */
    public function exerciseTimes(): BelongsToMany
    {
        return $this->belongsToMany(ExerciseTime::class, 'schedule_exercise_time');
    }

    /**
     * Get the eating times associated with the schedule.
     * @return BelongsToMany
     */
    public function eatingTimes(): BelongsToMany
    {
        return $this->belongsToMany(EatingTime::class, 'schedule_eating_time');
    }

    /**
     * Get the relaxation times associated with the schedule.
     * @return BelongsToMany
     */
    public function relaxationTimes(): BelongsToMany
    {
        return $this->belongsToMany(RelaxationTime::class, 'schedule_relaxation_time');
    }

    /**
     * Retrieve the full schedule for a given day.
     *
     * @param int $userId
     * @param string $dayOfWeek
     * @return Builder
     */
    public static function getFullSchedule(int $userId, string $dayOfWeek): object
    {
        return self::with(['exerciseTimes', 'eatingTimes', 'relaxationTimes'])
            ->where('user_id', '=', $userId)
            ->where('day_of_week', '=', $dayOfWeek)
            ->first();
    }
}
