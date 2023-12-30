<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static paginate(mixed $env)
 * @method static when(mixed $keyword, \Closure $param)
 * @method static search(mixed $input)
 * @method static pluck(string $string)
 * @property integer $id
 */
class Meal extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
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

    /**
     * @param $query
     * @param $keyword
     * @return mixed
     */
    public function scopeSearch($query, $keyword): mixed
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }
}
