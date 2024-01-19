<?php

namespace App\Observers;

use App\Models\Schedule;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

/**
 * @property UserRepositoryInterface $userRepository
 */
class UserObserver
{

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,)
    {
        $this->userRepository = $userRepository;
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
            $this->userRepository->create([
                'user_id' => $user->id,
                'day_of_week' => $dayName,
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

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
