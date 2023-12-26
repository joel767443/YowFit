<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelaxationTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eatingTimes = [
            Carbon::createFromTime(12, 00, 0),
            Carbon::createFromTime(20, 00, 0),
        ];

        foreach ($eatingTimes as $eatingTime) {
            DB::table('relaxation_times')->insert([
                'time' => $eatingTime,
                'description' => 'watch TV',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
