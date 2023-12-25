<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService
{

    /**
     * @param User $instance
     * @return void
     */
    public static function deleteUser(User $instance): void
    {
//        DB::transaction(function () use ($instance) {
//            foreach ($instance->schedules as $schedule) {
//                $schedule->exercises()->delete();
//                $schedule->delete();
//            }
//            $instance->weightLogs()->delete();
//            $instance->workSchedules()->delete();
//            $instance->calendarEvents()->delete();
        $instance->delete();
//        });
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public static function getPaginatedUsers(Request $request): mixed
    {
        return User::when($request->input('search'), function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('email', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        })->paginate(10);
    }
}
