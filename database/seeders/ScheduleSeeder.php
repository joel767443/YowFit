<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            DB::table('schedules')->insert([
                'user_id' => $userId,
                'wakeup_time' => '07:00:00',
                'exercise_time' => '08:00:00',
                'eating_time' => '12:00:00',
                'relaxation_time' => '18:00:00',
                'sleeping_time' => '22:00:00',
            ]);
        }
    }
}
