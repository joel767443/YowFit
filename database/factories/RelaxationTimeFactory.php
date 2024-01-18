<?php

namespace Database\Factories;

use App\Models\EatingTime;
use App\Models\Meal;
use App\Models\RelaxationTime;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RelaxationTime>
 */
class RelaxationTimeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = RelaxationTime::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => $this->faker->time,
            'description' => $this->faker->text,
        ];
    }
}
