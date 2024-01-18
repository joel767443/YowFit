<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\ExerciseTime;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ExerciseTimeTest
 */
class ExerciseTimeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_an_exercise()
    {
        $exercise = Exercise::factory()->create();
        $exerciseTime = ExerciseTime::factory()->create(['exercise_id' => $exercise->id]);

        $this->assertInstanceOf(Exercise::class, $exerciseTime->exercise);
        $this->assertEquals($exercise->id, $exerciseTime->exercise->id);
    }

    /** @test */
    public function it_can_create_an_exercise_time()
    {
        $schedule = Schedule::factory()->create();
        $exercise = Exercise::factory()->create();

        $exerciseTimeData = [
            'exercise_time_from' => '09:00:00',
            'exercise_time_to' => '10:00:00',
            'schedule_id' => $schedule->id,
            'exercise_id' => $exercise->id,
        ];

        ExerciseTime::create($exerciseTimeData);

        $this->assertDatabaseHas('exercise_times', $exerciseTimeData);
    }

    /** @test */
    public function it_can_filter_exercise_times_by_schedule()
    {
        $schedule1 = Schedule::factory()->create();
        $schedule2 = Schedule::factory()->create();

        ExerciseTime::factory()->create(['schedule_id' => $schedule1->id]);
        ExerciseTime::factory()->create(['schedule_id' => $schedule2->id]);

        $filteredExerciseTimes = ExerciseTime::where('schedule_id', $schedule1->id)->get();

        $this->assertCount(1, $filteredExerciseTimes);
        $this->assertEquals($schedule1->id, $filteredExerciseTimes->first()->schedule_id);
    }

    /** @test */
    public function it_can_filter_exercise_times_by_exercise_id()
    {
        $exercise1 = Exercise::factory()->create();
        $exercise2 = Exercise::factory()->create();

        ExerciseTime::factory()->create(['exercise_id' => $exercise1->id]);
        ExerciseTime::factory()->create(['exercise_id' => $exercise2->id]);

        $filteredExerciseTimes = ExerciseTime::whereIn('exercise_id', [$exercise1->id])->get();

        $this->assertCount(1, $filteredExerciseTimes);
        $this->assertEquals($exercise1->id, $filteredExerciseTimes->first()->exercise_id);
    }
}
