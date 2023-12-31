<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(string[] $array)
 * @method static search(mixed $input)
 * @method static pluck(string $string)
 * @property integer $id
 */
class Exercise extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'link',
        'description',
        'exercise_type_id'
    ];

    /**
     * Get the exercise times associated with the exercise.
     * @return HasMany
     */
    public function exerciseTimes(): HasMany
    {
        return $this->hasMany(ExerciseTime::class);
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

    /**
     * @return BelongsTo
     */
    public function exerciseType(): BelongsTo
    {
        return $this->belongsTo(ExerciseType::class);
    }
}
