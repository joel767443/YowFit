<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RelaxationTime
 * @property  string time
 * @property string description
 * @property mixed $id
 */
class RelaxationTime extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'time',
        'description',
    ];
}
