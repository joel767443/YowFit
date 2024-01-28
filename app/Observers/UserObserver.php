<?php

namespace App\Observers;

use App\Models\User;
use App\Repositories\Contracts\ScheduleRepositoryInterface;

/**
 * @property ScheduleRepositoryInterface $scheduleRepository
 */
class UserObserver
{

    /**
     * @param ScheduleRepositoryInterface $scheduleRepository
     */
    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $daysOfWeek = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];

        foreach ($daysOfWeek as $dayName) {
            $this->scheduleRepository->create([
                'user_id' => $user->id,
                'day_of_week' => $dayName,
                'wakeup_time' => '06:00:00',
                'sleeping_time' => '22:00:00',
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }
}
