<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EatingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
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
