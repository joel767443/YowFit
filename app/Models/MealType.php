<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MealType
 * @property mixed $id
 */
class MealType extends Model
{
    use HasFactory;

    /**
     * @param $query
     * @param $keyword
     * @return mixed
     */
    public function scopeSearch($query, $keyword): mixed
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }
}
