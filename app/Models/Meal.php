<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'instructions',
    ];

    /**
     * Get the eating times associated with the meal.
     * @return HasMany
     */
    public function eatingTimes(): HasMany
    {
        return $this->hasMany(EatingTime::class);
    }
}
