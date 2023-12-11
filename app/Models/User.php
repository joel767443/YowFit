<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function MongoDB\BSON\toJSON;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * @return array[]
     */
    public function todaySchedules(): array
    {
        return [
            [
                "id" => 1,
                "name" => "Yoweli",
                "start_time" => Carbon::now(),
                "end_time" => Carbon::now(),
            ],
            [
                "id" => 2,
                "name" => "kachala",
                "start_time" => Carbon::now(),
                "end_time" => Carbon::now(),
            ],
            [
                "id" => 3,
                "name" => "zone",
                "start_time" => Carbon::now(),
                "end_time" => Carbon::now(),
            ]
        ];

    }
}
