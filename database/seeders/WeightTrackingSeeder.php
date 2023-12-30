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
        $userId = 1;
        $startDate = Carbon::now()->subMonths(4);

        for ($i = 0; $i < 16; $i++) {
            $weight = 116.0 - ($i * 1.9);

            WeightTracking::create([
                'user_id' => $userId,
                'weight' => $weight,
                'recorded_at' => $startDate->addWeek()->toDateTimeString(),
            ]);
        }
    }
}
