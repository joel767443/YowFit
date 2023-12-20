<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CalendarEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $exerciseIds = DB::table('exercises')->pluck('id');
        $recipeIds = DB::table('meals')->pluck('id');
        $scheduleIds = DB::table('schedules')->pluck('id');

        foreach ($userIds as $userId) {
            DB::table('calendar_entries')->insert([
                'user_id' => $userId,
                'exercise_id' => $exerciseIds->random(),
                'recipe_id' => $recipeIds->random(),
                'schedule_id' => $scheduleIds->random(),
                'activity_type' => 'exercise',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
