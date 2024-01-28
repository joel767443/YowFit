<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ScheduleTest
 */
class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_schedule()
    {
        $userData = [
            'name' => 'first last',
            'email' => 'email@same.com',
            'user_status_id' => UserStatus::factory()->create()->id,
            'password' => 'password',
        ];

        $user = User::create($userData);

        $scheduleData = [
            'user_id' => $user->id,
            'day_of_week' => 'Monday',
            'wakeup_time' => '08:00:00',
            'sleeping_time' => '22:00:00',
        ];

        $schedule = Schedule::create($scheduleData);

        $this->assertDatabaseHas('schedules', $scheduleData);
        $this->assertInstanceOf(Schedule::class, $schedule);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $schedule->user);
        $this->assertEquals($user->id, $schedule->user->id);
    }

    /** @test */
    public function it_has_schedule_times_relationship()
    {
        /** @var Schedule $schedule */
        $schedule = Schedule::factory()->create();
        $exercise = Exercise::factory()->create();
        $scheduleTime = $schedule->scheduleTimes()->create([
            'start_time' => '12:00',
            'end_time' => '14:00',
            'schedule_id' => $schedule->id,
            'scheduleable_id' => $exercise->id,
            'scheduleable_type' => Exercise::class,
        ]);

        $this->assertTrue($schedule->scheduleTimes->contains($scheduleTime));
    }
}
