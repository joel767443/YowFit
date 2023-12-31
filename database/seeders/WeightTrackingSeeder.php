<?php

namespace Database\Seeders;

use App\Models\WeightTracking;
use Carbon\Carbon;
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
        $recordedAtPlaces = [
            "home",
            "gym",
            "GF's house",
            "Other",
        ];
        $userId = 1;


        for ($i = 0; $i < 16; $i++) {
            $weight = 116.0 - ($i * 1.9);

            WeightTracking::create([
                'user_id' => $userId,
                'weight' => $weight,
                'recorded_at' => collect($recordedAtPlaces)->random(),
            ]);
        }
    }
}
