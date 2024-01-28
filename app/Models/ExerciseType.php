<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static pluck(string $string)
 * @method static inRandomOrder()
 * @method static create(string[] $exerciseTypeData)
 * @method static search(string $string)
 * @property int $id
 * @property string name
 * @property string slug
 */
class ExerciseType extends Model
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
     * Define the inverse relationship with Exercise model.
     *
     * @return HasMany
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}
