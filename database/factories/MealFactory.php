<?php

namespace Database\Factories;

use App\Models\MealType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mealType = MealType::factory()->create();

        return [
            'name' =>  $this->faker->name,
            'description' =>  $this->faker->text,
            'ingredients' =>  $this->faker->text,
            'instructions' =>  $this->faker->text,
            'meal_type_id' => $mealType->id,
        ];
    }
}
