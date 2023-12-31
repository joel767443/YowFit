<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseType;
use Illuminate\Database\Seeder;

/**
 * Class ExerciseSeeder
 */
class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exerciseTypes = ExerciseType::pluck('id');

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
                'exercise_type_id' => collect($exerciseTypes)->random()
            ]);
        }
    }
}
