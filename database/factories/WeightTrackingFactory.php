<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WeightTracking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WeightTracking>
 */
class WeightTrackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();

        return [
            'user_id' => $user->id,
            'weight' => 90.5,
        ];
    }
}
