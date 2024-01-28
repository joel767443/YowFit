<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static pluck(string $string)
 * @method static inRandomOrder()
 * @property int $id
 * @property string name
 * @property string slug
 * @property int sortOrder
 */
class UserStatus extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'sort_order',
    ];
}
