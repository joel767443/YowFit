<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class WeightTracking
 * @method static create(array $array)
 * @method static where(string $string, int|string|null $id)
 */
class WeightTracking extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'weight_tracking';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'weight',
        'recorded_at',
    ];

    /**
     * Get the user that owns the weight tracking entry.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
