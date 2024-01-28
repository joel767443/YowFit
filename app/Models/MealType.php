<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class MealType
 * @property int $id
 * @property string $name
 * @property string $slug
 * @method static inRandomOrder()
 * @method static search(string $string)
 * @method static create(string[] $mealTypeData)
 * @method static pluck(string $string)
 */
class MealType extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * @param $query
     * @param $keyword
     * @return mixed
     */
    public function scopeSearch($query, $keyword): mixed
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }

    /**
     * Define the inverse relationship with Meal model.
     *
     * @return HasMany
     */
    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class);
    }
}
