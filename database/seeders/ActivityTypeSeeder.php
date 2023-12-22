<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activityTypes = [
            ['title' => 'wakeup', 'description' => 'wake up time', 'url' => 'none'],
            ['title' => 'exercise', 'description' => 'wake up', 'url' => 'none'],
            ['title' => 'work', 'description' => 'time to work', 'url' => 'none'],
            ['title' => 'break', 'description' => 'time to take a break', 'url' => 'none'],
            ['title' => 'lunch', 'description' => 'time to eat something', 'url' => 'none'],
            ['title' => 'relax', 'description' => 'time to relax', 'url' => 'none'],
            ['title' => 'wind down', 'description' => 'time to wind down', 'url' => 'none'],
            ['title' => 'sleep', 'description' => 'time to sleep', 'url' => 'none'],
            ['title' => 'research', 'description' => 'time to do some research', 'url' => 'none'],
        ];

        DB::table('activity_types')->insert($activityTypes);
    }
}
