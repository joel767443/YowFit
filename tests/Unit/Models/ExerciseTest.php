<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\ExerciseTime;
use App\Models\ExerciseType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ExerciseTest
 */
class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_exercise_times()
    {
        $exercise = Exercise::factory()->create();
        $exerciseTime1 = ExerciseTime::factory()->create(['exercise_id' => $exercise->id]);
        $exerciseTime2 = ExerciseTime::factory()->create(['exercise_id' => $exercise->id]);

        $exerciseTimes = $exercise->exerciseTimes;

        $this->assertInstanceOf(Collection::class, $exerciseTimes);
        $this->assertCount(2, $exerciseTimes);
        $this->assertTrue($exerciseTimes->contains($exerciseTime1));
        $this->assertTrue($exerciseTimes->contains($exerciseTime2));
    }

    /** @test */
    public function it_can_be_searched_by_name()
    {
        // Create exercises with specific names
        Exercise::factory()->create(['name' => 'Push-up']);
        Exercise::factory()->create(['name' => 'Sit-up']);
        Exercise::factory()->create(['name' => 'Running']);

        // Search for an exercise
        $results = Exercise::search('Push-up')->get();

        // Assert that the search returned the correct result
        $this->assertCount(1, $results);
        $this->assertEquals('Push-up', $results->first()->name);
    }

    /** @test */
    public function it_belongs_to_an_exercise_type()
    {
        $exercise = Exercise::factory()->create();
        $this->assertInstanceOf(ExerciseType::class, $exercise->exerciseType);
    }

    /** @test */
    public function it_can_create_an_exercise()
    {
        $exerciseData = [
            'name' => 'Jumping Jacks',
            'link' => 'https://example.com/jumping-jacks',
            'description' => 'A cardiovascular exercise',
            'exercise_type_id' => ExerciseType::factory()->create()->id,
        ];

        Exercise::create($exerciseData);

        $this->assertDatabaseHas('exercises', $exerciseData);
    }

    /** @test */
    public function it_can_update_an_exercise()
    {
        $exercise = Exercise::factory()->create();
        $updatedData = [
            'name' => 'Updated Exercise',
        ];

        $exercise->update($updatedData);

        $this->assertDatabaseHas('exercises', $updatedData);
    }

    /** @test */
    public function it_can_delete_an_exercise()
    {
        $exercise = Exercise::factory()->create();
        $exercise->delete();

        $this->assertDatabaseMissing('exercises', ['id' => $exercise->id]);
    }
}
