<?php

namespace Tests\Unit\Models;

use App\Models\EatingTime;
use App\Models\Meal;
use App\Models\MealType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class MealTest
 */
class MealTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_eating_times_relation()
    {
        $meal = Meal::factory()->create();
        $eatingTime1 = EatingTime::factory()->create(['meal_id' => $meal->id]);
        $eatingTime2 = EatingTime::factory()->create(['meal_id' => $meal->id]);

        $eatingTimes = $meal->eatingTimes;

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $eatingTimes);
        $this->assertCount(2, $eatingTimes);
        $this->assertTrue($eatingTimes->contains($eatingTime1));
        $this->assertTrue($eatingTimes->contains($eatingTime2));
    }

    /** @test */
    public function it_can_be_searched_by_name()
    {
        // Create meals with specific names
        Meal::factory()->create(['name' => 'Breakfast']);
        Meal::factory()->create(['name' => 'Lunch']);
        Meal::factory()->create(['name' => 'Dinner']);

        // Search for a meal
        $results = Meal::search('Breakfast')->get();

        // Assert that the search returned the correct result
        $this->assertCount(1, $results);
        $this->assertEquals('Breakfast', $results->first()->name);
    }

    /** @test */
    public function it_belongs_to_a_meal_type()
    {
        $meal = Meal::factory()->create();
        $this->assertInstanceOf(MealType::class, $meal->mealType);
    }

    /** @test */
    public function it_can_create_a_meal()
    {
        $mealType = MealType::factory()->create();

        $mealData = [
            'name' => 'Spaghetti Bolognese',
            'description' => 'Classic Italian dish',
            'ingredients' => 'Pasta, meat, tomatoes',
            'instructions' => 'Cook pasta, make sauce, mix together',
            'meal_type_id' => $mealType->id,
        ];

        Meal::create($mealData);

        $this->assertDatabaseHas('meals', $mealData);
    }

    /** @test */
    public function it_can_update_a_meal()
    {
        $meal = Meal::factory()->create();
        $updatedData = [
            'name' => 'Updated Meal',
        ];

        $meal->update($updatedData);

        $this->assertDatabaseHas('meals', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_meal()
    {
        $meal = Meal::factory()->create();
        $meal->delete();

        $this->assertDatabaseMissing('meals', ['id' => $meal->id]);
    }
}
