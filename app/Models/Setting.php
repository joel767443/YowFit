<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where()
 * @method static find($id)
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hours_sleep',
        'sleeping_time',
        'wakeup_time',
        'exercise_times',
        'meals_per_day',
        'eating_times',
        'work_times',
        'relaxation_times',
        'exercises_per_day',
        'weighing_frequency',
    ];

    protected $casts = [
        'eating_times' => 'array',
        'exercise_times' => 'array',
        'work_times' => 'array',
        'relaxation_times' => 'array',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getSleepingTimeAttribute($value): string
    {
        return Carbon::parse($value)->format('H:i');
    }

    /**
     * Mutator for exercise_times attribute.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setExerciseTimesAttribute(mixed $value): void
    {
        $this->attributes['exercise_times'] = json_encode($value);
    }

    /**
     * Accessor for exercise_times attribute.
     *
     * @param mixed $value
     * @return mixed
     */
    public function getExerciseTimesAttribute(mixed $value): mixed
    {
        return json_decode($value, true);
    }

}
