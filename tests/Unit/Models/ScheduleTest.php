<?php

namespace Tests\Unit\Models;

use App\Models\EatingTime;
use App\Models\ExerciseTime;
use App\Models\RelaxationTime;
use App\Models\Schedule;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ScheduleTest
 */
class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $schedule->user);
        $this->assertEquals($user->id, $schedule->user->id);
    }

    /** @test */
    public function it_has_many_exercise_times()
    {
        $schedule = Schedule::factory()->create();
        $exerciseTime1 = ExerciseTime::factory()->create(['schedule_id' => $schedule->id]);
        $exerciseTime2 = ExerciseTime::factory()->create(['schedule_id' => $schedule->id]);

        $exerciseTimes = $schedule->exerciseTimes;

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $exerciseTimes);
        $this->assertCount(2, $exerciseTimes);
        $this->assertTrue($exerciseTimes->contains($exerciseTime1));
        $this->assertTrue($exerciseTimes->contains($exerciseTime2));
    }

    /** @test */
    public function it_has_many_eating_times()
    {
        $schedule = Schedule::factory()->create();
        $eatingTime1 = EatingTime::factory()->create(['schedule_id' => $schedule->id]);
        $eatingTime2 = EatingTime::factory()->create(['schedule_id' => $schedule->id]);

        $eatingTimes = $schedule->eatingTimes;

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $eatingTimes);
        $this->assertCount(2, $eatingTimes);
        $this->assertTrue($eatingTimes->contains($eatingTime1));
        $this->assertTrue($eatingTimes->contains($eatingTime2));
    }

    /** @test */
    public function it_has_many_relaxation_times()
    {
        $schedule = Schedule::factory()->create();
        $relaxationTime1 = RelaxationTime::factory()->create(['schedule_id' => $schedule->id]);
        $relaxationTime2 = RelaxationTime::factory()->create(['schedule_id' => $schedule->id]);

        $relaxationTimes = $schedule->relaxationTimes;

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $relaxationTimes);
        $this->assertCount(2, $relaxationTimes);
        $this->assertTrue($relaxationTimes->contains($relaxationTime1));
        $this->assertTrue($relaxationTimes->contains($relaxationTime2));
    }

    /** @test */
    public function it_has_many_work_times()
    {
        $schedule = Schedule::factory()->create();
        $workTime1 = WorkTime::factory()->create(['schedule_id' => $schedule->id]);
        $workTime2 = WorkTime::factory()->create(['schedule_id' => $schedule->id]);

        $workTimes = $schedule->workTimes;

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $workTimes);
        $this->assertCount(2, $workTimes);
        $this->assertTrue($workTimes->contains($workTime1));
        $this->assertTrue($workTimes->contains($workTime2));
    }

    /** @test */
    public function it_can_get_full_schedule_for_a_given_day()
    {
        $user = User::factory()->create();

        $schedule = $user->schedules->where('day_of_week', '=', 'Monday')->first();
        // Create associated exercise, eating, and relaxation times
        ExerciseTime::factory()->create(['schedule_id' => $schedule->id]);
        EatingTime::factory()->create(['schedule_id' => $schedule->id]);
        RelaxationTime::factory()->create(['schedule_id' => $schedule->id]);

        $fullSchedule = Schedule::getFullSchedule($user->id, 'Monday');

        $this->assertInstanceOf(Schedule::class, $fullSchedule);
        $this->assertEquals('Monday', $fullSchedule->day_of_week);
        $this->assertCount(1, $fullSchedule->exerciseTimes);
        $this->assertCount(1, $fullSchedule->eatingTimes);
        $this->assertCount(1, $fullSchedule->relaxationTimes);
    }
}
