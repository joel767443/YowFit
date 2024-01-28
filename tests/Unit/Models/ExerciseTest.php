<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\Meal;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ExerciseTest
 */
class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_exercise()
    {
        $exerciseData = [
            'name' => 'Test Exercise',
            'link' => 'https://example.com/exercise',
            'description' => 'This is a test exercise',
            'exercise_type_id' => ExerciseType::factory()->create()->id,
        ];

        $exercise = Exercise::create($exerciseData);

        $this->assertDatabaseHas('exercises', $exerciseData);
        $this->assertInstanceOf(Exercise::class, $exercise);
    }

    /** @test */
    public function it_can_search_for_exercises()
    {
        // Create exercises for testing
        Exercise::factory()->create(['name' => 'Test Exercise 1']);
        Exercise::factory()->create(['name' => 'Test Exercise 2']);
        Exercise::factory()->create(['name' => 'Another Exercise']);

        // Search for exercises
        $result = Exercise::search('Test Exercise')->get();

        // Assert that there are two exercises matching the search
        $this->assertCount(2, $result);
        $this->assertEquals(['Test Exercise 1', 'Test Exercise 2'], $result->pluck('name')->toArray());
    }

    /** @test */
    public function it_has_schedule_times_relationship()
    {
        $exercise = Exercise::factory()->create();
        $meal = Exercise::factory()->create();

        $scheduleTime = $exercise->scheduleTimes()->create([
            'start_time' => '06:00',
            'end_time' => '12:00',
            'schedule_id' => Schedule::factory()->create()->id,
            'scheduleable_id' => $meal->id,
            'scheduleable_type' => Meal::class,
        ]);

        $this->assertTrue($exercise->scheduleTimes->contains($scheduleTime));
    }

    /** @test */
    public function it_belongs_to_an_exercise_type()
    {
        $exerciseType = ExerciseType::factory()->create();
        $exercise = Exercise::factory()->create(['exercise_type_id' => $exerciseType->id]);

        $this->assertInstanceOf(ExerciseType::class, $exercise->exerciseType);
        $this->assertEquals($exerciseType->id, $exercise->exerciseType->id);
    }
}
