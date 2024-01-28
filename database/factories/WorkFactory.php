<?php

namespace Database\Factories;

use App\Models\ExerciseType;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Work>
 */
class WorkFactory extends Factory
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
