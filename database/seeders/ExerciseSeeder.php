<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            [
                'name' => 'Walking',
                'description' => '5 KM walk',
            ],
            [
                'name' => 'weight lifting',
                'description' => 'Hands',
            ],
            [
                'name' => 'Aerobics',
                'description' => 'from youtube videos',
            ],
        ];

        foreach ($exercises as $exercise) {
            Exercise::create([
                'name' => $exercise['name'],
                'description' => $exercise['description'],
            ]);
        }
    }
}
