<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @property mixed $id
 * @property string name
 * @property string slug
 * @property int sortOrder
 */
class UserStatus extends Model
{
    use HasFactory;
}
