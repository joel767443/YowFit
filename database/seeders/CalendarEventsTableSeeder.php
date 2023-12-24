<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CalendarEvent;
use App\Models\User;
use Faker\Factory as Faker;

class CalendarEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get user IDs to associate events with users
        $userIds = User::pluck('id')->toArray();

        // Create 50 sample calendar events
        foreach (range(1, 50) as $index) {
            CalendarEvent::create([
                'user_id' => $faker->randomElement($userIds),
                'event_type' => $faker->word,
                'start_time' => $faker->time,
                'end_time' => $faker->time,
            ]);
        }
    }
}
