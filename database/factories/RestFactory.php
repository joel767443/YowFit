<?php

namespace Database\Factories;

use App\Models\ExerciseType;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rest>
 */
class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var ExerciseType $exerciseType */
        $exerciseType = ExerciseType::factory()->create();

        return [
            'name' =>  $this->faker->name,
            'slug' =>  $this->faker->name,
            'description' =>  $this->faker->text,
        ];
    }
}
