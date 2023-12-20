<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @method static create(mixed $validated)
 * @property mixed $id
 */
class Exercise extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function calendarEntries(): HasMany
    {
        return $this->hasMany(CalendarEntry::class);
    }
}
