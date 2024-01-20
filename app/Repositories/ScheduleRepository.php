<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScheduleRepository
 */
class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    /**
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        parent::__construct($schedule);
        $this->model = $schedule;
    }

    /**
     * Retrieve the full schedule for a given day.
     *
     * @param int $userId
     * @param string $dayOfWeek
     * @return Model|null
     */
    public function getFullSchedule(int $userId, string $dayOfWeek): Model|null
    {
        return $this->model::with([
            'exerciseTimes' => function ($query) {
                $query->orderBy('exercise_time_from');
            },
            'eatingTimes' => function ($query) {
                $query->orderBy('eating_time_from');
            },
            'relaxationTimes' => function ($query) {
                $query->orderBy('time');
            },
        ])
            ->where('user_id', $userId)
            ->where('day_of_week', $dayOfWeek)
            ->first();
    }
}
