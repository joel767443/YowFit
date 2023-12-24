<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeightLog;
use App\Models\User;
use Faker\Factory as Faker;

class WeightLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get user IDs to associate weight logs with users
        $userIds = User::pluck('id')->toArray();

        // Create 50 sample weight logs
        foreach (range(1, 50) as $index) {
            WeightLog::create([
                'user_id' => $faker->randomElement($userIds),
                'weight' => $faker->randomFloat(2, 50, 100),
                'logged_at' => $faker->dateTimeThisMonth,
            ]);
        }
    }
}
