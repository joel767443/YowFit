<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class EatingTime
 * @method static create(array $eatingTimeData)
 */
class EatingTime extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'eating_time_from',
        'eating_time_to',
        'schedule_id',
        'meal_id',
    ];

    /**
     * Get the meal associated with the eating time.
     * @return BelongsTo
     */
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}
