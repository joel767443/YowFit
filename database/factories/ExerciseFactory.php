<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\ExerciseType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exercise>
 */
class ExerciseFactory extends Factory
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
            'description' =>  $this->faker->text,
            'link' =>  $this->faker->text,
            'exercise_type_id' => $exerciseType->id,
        ];
    }
}
