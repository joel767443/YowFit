<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class WeightTracking
 * @method static create(array $array)
 * @method static where(string $string, int|string|null $id)
 * @method static select(string $string, string $string1, string $string2)
 * @method static whereWeight(string $string, float $param)
 * @property int user_id
 * @property double weight
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
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime',
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
