<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static create(string[] $array)
 * @method static search(string $input)
 * @method static pluck(string $string)
 * @method static inRandomOrder()
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
     * @return MorphMany
     */
    public function scheduleTimes(): MorphMany
    {
        return $this->morphMany(ScheduleTime::class, 'scheduleable');
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
