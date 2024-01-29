<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightTracking;
use Illuminate\Database\Seeder;

/**
 * Class WeightTrackingSeeder
 */
class WeightTrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::where('email', 'test-admin@yowfit.com')->first()?->id;

        for ($i = 0; $i < 16; $i++) {
            $weight = 116.0 - ($i * 1.9);

            WeightTracking::create([
                'user_id' => $userId,
                'weight' => $weight,
            ]);
        }
    }
}
