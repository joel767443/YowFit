<?php

namespace Tests\Unit\Repositories;

use App\Models\Meal;
use App\Models\MealType;
use App\Repositories\MealRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class MealRepositoryTest
 */
class MealRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @var MealRepository */
    private MealRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new MealRepository(new Meal());
    }

    /** @test */
    public function it_can_create_meal()
    {
        $mealData = [
            'name' => 'Chicken Salad',
            'description' => 'Delicious chicken salad',
            'ingredients' => 'some ingredients for some good food.',
            'instructions' => 'some ingredients for some good food.',
            'meal_type_id' => MealType::factory()->create()->id,
        ];

        $createdMeal = $this->repository->create($mealData);

        $this->assertInstanceOf(Meal::class, $createdMeal);
        $this->assertDatabaseHas('meals', ['id' => $createdMeal->id]);
    }

    /** @test */
    public function it_can_find_meal_by_id()
    {
        $meal = Meal::factory()->create();
        $foundMeal = $this->repository->findOneBy('id', $meal->id);
        $this->assertInstanceOf(Meal::class, $foundMeal);
        $this->assertEquals($meal->id, $foundMeal->id);
    }

    /** @test */
    public function it_can_update_meal()
    {
        $meal = Meal::factory()->create();
        $updatedData = ['name' => 'Updated Chicken Salad'];

        $updatedMeal = $this->repository->update($meal, $updatedData);

        $this->assertInstanceOf(Meal::class, $updatedMeal);
        $this->assertEquals('Updated Chicken Salad', $updatedMeal->name);
    }

    /** @test */
    public function it_can_delete_meal()
    {
        $meal = Meal::factory()->create();
        $this->repository->delete($meal);
        $this->assertDatabaseMissing('meals', ['id' => $meal->id]);
    }
}
