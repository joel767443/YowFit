<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{

    /**
     * @param User $instance
     * @return void
     */
    public static function deleteUser(User $instance): void
    {
        DB::transaction(function () use ($instance) {
            foreach ($instance->schedules as $schedule) {
                $schedule->exercises()->delete();
                $schedule->delete();
            }
            $instance->weightLogs()->delete();
            $instance->workSchedules()->delete();
            $instance->calendarEvents()->delete();
            $instance->delete();
        });
    }
}
