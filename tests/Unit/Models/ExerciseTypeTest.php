<?php

namespace Tests\Unit\Models;

use App\Models\ExerciseType;
use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExerciseTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_exercise_type()
    {
        $exerciseTypeData = [
            'name' => 'Strength Training',
            'slug' => 'strength-training',
        ];

        $exerciseType = ExerciseType::create($exerciseTypeData);

        $this->assertDatabaseHas('exercise_types', $exerciseTypeData);
        $this->assertInstanceOf(ExerciseType::class, $exerciseType);
    }

    /** @test */
    public function it_can_search_for_exercise_types()
    {
        // Create exercise types for testing
        ExerciseType::factory()->create(['name' => 'Strength Training']);
        ExerciseType::factory()->create(['name' => 'Cardio Training']);
        ExerciseType::factory()->create(['name' => 'Yoga']);

        // Search for exercise types
        $result = ExerciseType::search('Training')->get();

        // Assert that there are two exercise types matching the search
        $this->assertCount(2, $result);
        $this->assertEquals(['Strength Training', 'Cardio Training'], $result->pluck('name')->toArray());
    }

    /** @test */
    public function it_has_exercises_relationship()
    {
        $exerciseType = ExerciseType::factory()->create();
        $exercise = Exercise::factory()->create(['exercise_type_id' => $exerciseType->id]);

        $this->assertTrue($exerciseType->exercises->contains($exercise));
    }
}
