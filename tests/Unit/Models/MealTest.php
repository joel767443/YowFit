<?php

namespace Tests\Unit\Models;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class MealTest
 */
class MealTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_meal()
    {
        $mealData = [
            'name' => 'Test Meal',
            'description' => 'This is a test meal',
            'ingredients' => 'Ingredient 1, Ingredient 2',
            'instructions' => 'Step 1: Do this, Step 2: Do that',
            'meal_type_id' => MealType::factory()->create()->id,
        ];

        $meal = Meal::create($mealData);

        $this->assertDatabaseHas('meals', $mealData);
        $this->assertInstanceOf(Meal::class, $meal);
    }

    /** @test */
    public function it_can_search_for_meals()
    {
        // Create meals for testing
        Meal::factory()->create(['name' => 'Test Meal 1']);
        Meal::factory()->create(['name' => 'Test Meal 2']);
        Meal::factory()->create(['name' => 'Another Meal']);

        // Search for meals
        $result = Meal::search('Test Meal')->get();

        // Assert that there are two meals matching the search
        $this->assertCount(2, $result);
        $this->assertEquals(['Test Meal 1', 'Test Meal 2'], $result->pluck('name')->toArray());
    }

    /** @test */
    public function it_has_schedule_times_relationship()
    {
        /** @var Meal $meal */
        $meal = Meal::factory()->create();
        $scheduleTime = $meal->scheduleTimes()->create([
            'start_time' => '08:00',
            'end_time' => '12:00',
            'schedule_id' => Schedule::factory()->create()->id,
            'scheduleable_id' => $meal->id,
            'scheduleable_type' => Meal::class,
        ]);

        $this->assertTrue($meal->scheduleTimes->contains($scheduleTime));
    }

    /** @test */
    public function it_belongs_to_a_meal_type()
    {
        $mealType = MealType::factory()->create();
        $meal = Meal::factory()->create(['meal_type_id' => $mealType->id]);

        $this->assertInstanceOf(MealType::class, $meal->mealType);
        $this->assertEquals($mealType->id, $meal->mealType->id);
    }
}
