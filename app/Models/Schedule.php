<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Class Schedule
 * @method static create(string[] $array)
 * @method static inRandomOrder()
 * @method static select(string $string, string $string1)
 * @property mixed $id
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
        'sleeping_time',
    ];

    /**
     * Get the user that owns the schedule.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the relaxation times associated with the schedule.
     * @return hasMany
     */
    public function scheduleTimes(): hasMany
    {
        return $this->hasMany(ScheduleTime::class);
    }

}
