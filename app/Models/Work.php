<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static create(array $array)
 */
class Work extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'work';

    /**
     * @return MorphMany
     */
    public function scheduleTimes(): MorphMany
    {
        return $this->morphMany(ScheduleTime::class, 'scheduleable');
    }
}
