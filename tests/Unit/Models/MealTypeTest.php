<?php

namespace Tests\Unit\Models;

use App\Models\MealType;
use App\Models\Meal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class MealTypeTest
 */
class MealTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_meal_type()
    {
        $mealTypeData = [
            'name' => 'Breakfast',
            'slug' => 'breakfast',
        ];

        $mealType = MealType::create($mealTypeData);

        $this->assertDatabaseHas('meal_types', $mealTypeData);
        $this->assertInstanceOf(MealType::class, $mealType);
    }

    /** @test */
    public function it_can_search_for_meal_types()
    {
        // Create meal types for testing
        MealType::factory()->create(['name' => 'Breakfast']);
        MealType::factory()->create(['name' => 'Lunch']);
        MealType::factory()->create(['name' => 'Dinner']);

        // Search for meal types
        $result = MealType::search('Lunch')->get();

        // Assert that there is one meal type matching the search
        $this->assertCount(1, $result);
        $this->assertEquals(['Lunch'], $result->pluck('name')->toArray());
    }

    /** @test */
    public function it_has_meals_relationship()
    {
        $mealType = MealType::factory()->create();
        $meal = Meal::factory()->create(['meal_type_id' => $mealType->id]);

        $this->assertTrue($mealType->meals->contains($meal));
    }
}
