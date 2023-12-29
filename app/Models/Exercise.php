<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(string[] $array)
 */
class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'description',
    ];

    /**
     * Get the exercise times associated with the exercise.
     * @return HasMany
     */
    public function exerciseTimes(): HasMany
    {
        return $this->hasMany(ExerciseTime::class);
    }
}
