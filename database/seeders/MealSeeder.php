<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meals')->insert([
            'name' => 'Vegetarian Pasta',
            'description' => 'A delicious and healthy vegetarian pasta meal.',
        ]);

        DB::table('meals')->insert([
            'name' => 'Grilled Chicken Salad',
            'description' => 'A light and refreshing salad with grilled chicken.',
        ]);
    }
}
