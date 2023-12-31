<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;


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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exercise times associated with the schedule.
     * @return hasMany
     */
    public function exerciseTimes(): hasMany
    {
        return $this->hasMany(ExerciseTime::class);
    }

    /**
     * Get the eating times associated with the schedule.
     * @return hasMany
     */
    public function eatingTimes(): hasMany
    {
        return $this->hasMany(EatingTime::class);
    }

    /**
     * Get the relaxation times associated with the schedule.
     * @return hasMany
     */
    public function relaxationTimes(): hasMany
    {
        return $this->hasMany(RelaxationTime::class);
    }

    /**
     * Get the relaxation times associated with the schedule.
     * @return hasMany
     */
    public function workTimes(): hasMany
    {
        return $this->hasMany(WorkTime::class);
    }

    /**
     * Retrieve the full schedule for a given day.
     *
     * @param int $userId
     * @param string $dayOfWeek
     * @return Model|null
     */
    public static function getFullSchedule(int $userId, string $dayOfWeek): Model|null
    {
        return self::with(['exerciseTimes', 'eatingTimes', 'relaxationTimes'])
            ->where('user_id', '=', $userId)
            ->where('day_of_week', '=', $dayOfWeek)
            ->with(['exerciseTimes' => function ($query) {
                $query->orderBy('time');
            }])
            ->with(['eatingTimes' => function ($query) {
                $query->orderBy('time');
            }])
            ->with(['relaxationTimes' => function ($query) {
                $query->orderBy('time');
            }])
            ->first();
    }
}
