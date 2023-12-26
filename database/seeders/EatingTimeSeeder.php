<?php

namespace Database\Seeders;

use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EatingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eatingTimes = [
            Carbon::createFromTime(7, 0, 0),
            Carbon::createFromTime(13, 0, 0),
            Carbon::createFromTime(19, 0, 0),
        ];

        foreach ($eatingTimes as $eatingTime) {
            $meal = collect(Meal::pluck('id')->random())->random();
            DB::table('eating_times')->insert([
                'time' => $eatingTime,
                'meal_id' => $meal,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
