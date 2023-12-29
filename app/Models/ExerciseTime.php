<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExerciseTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
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
