<?php

namespace Tests\Unit\Models;

use App\Models\Meal;
use App\Models\ScheduleTime;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ScheduleTimeTest
 */
class ScheduleTimeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_schedule_time()
    {
        $scheduleData = [
             'user_id' => User::factory()->create()->id,
             'day_of_week' => 'Monday',
             'wakeup_time' => '08:00:00',
             'sleeping_time' => '22:00:00',
        ];

        $schedule = Schedule::create($scheduleData);
        $meal = Meal::factory()->create();

        $scheduleTimeData = [
            'start_time' => '09:00:00',
            'end_time' => '11:00:00',
            'schedule_id' => $schedule->id,
            'scheduleable_id' => $meal->id,
            'scheduleable_type' => Meal::class,
        ];

        $scheduleTime = ScheduleTime::create($scheduleTimeData);

        $this->assertDatabaseHas('schedule_times', $scheduleTimeData);
        $this->assertInstanceOf(ScheduleTime::class, $scheduleTime);
    }

    /** @test */
    public function it_belongs_to_schedule()
    {
        $schedule = Schedule::factory()->create();
        $meal = Meal::factory()->create();

        $scheduleTime = ScheduleTime::factory()->create([
            'schedule_id' => $schedule->id,
            'scheduleable_id' => $meal->id,
            'scheduleable_type' => Meal::class,
        ]);

        $this->assertInstanceOf(Schedule::class, $scheduleTime->schedule);
        $this->assertEquals($schedule->id, $scheduleTime->schedule->id);
    }

    /** @test */
    public function it_has_morph_to_relationship()
    {
        $schedule = Schedule::factory()->create();
        $scheduleTime = ScheduleTime::factory()->create(['schedule_id' => $schedule->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\MorphTo', $scheduleTime->scheduleable());
    }
}
