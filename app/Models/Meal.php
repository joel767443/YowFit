<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 * @method static create(mixed $validated)
 * @property int $id
 */
class Meal extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'description'];

    /**
     * @return HasMany
     */
    public function calendarEntries(): HasMany
    {
        return $this->hasMany(CalendarEntry::class);
    }
}
