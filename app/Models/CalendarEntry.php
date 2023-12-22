<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int $id)
 */
class CalendarEntry extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function activityType(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }
}
