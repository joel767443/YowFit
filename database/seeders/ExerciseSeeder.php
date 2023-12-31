<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\Schedule;
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
                'name' => 'Plyometrics',
                'description' => 'Explosive and powerful exercises for strength and agility',
            ],
            [
                'name' => 'Skiing',
                'description' => 'Winter sport that combines cardio and lower body strength',
            ],
            [
                'name' => 'Surfing',
                'description' => 'Water sport that engages core muscles for balance',
            ],
            [
                'name' => 'Calisthenics',
                'description' => 'Bodyweight exercises for strength and flexibility',
            ],
            [
                'name' => 'Functional Training',
                'description' => 'Exercises that mimic everyday movements for practical strength',
            ],
            [
                'name' => 'Kickboxing',
                'description' => 'Combines martial arts and cardio exercises',
            ],
            [
                'name' => 'Parkour',
                'description' => 'Obstacle-based movement discipline for agility and creativity',
            ],
            [
                'name' => 'Circus Arts',
                'description' => 'Acrobatics, juggling, and aerial arts for a unique workout',
            ],
            [
                'name' => 'Mountain Biking',
                'description' => 'Off-road cycling for cardiovascular fitness and leg strength',
            ],
            [
                'name' => 'Synchronized Swimming',
                'description' => 'Artistic swimming combining dance and swimming techniques',
            ],
            [
                'name' => 'CrossFit',
                'description' => 'High-intensity functional fitness training',
            ],
            [
                'name' => 'Barre',
                'description' => 'Ballet-inspired workout for strength and flexibility',
            ],
            [
                'name' => 'Rock Climbing',
                'description' => 'Indoor or outdoor climbing for strength and endurance',
            ],
            [
                'name' => 'Martial Arts',
                'description' => 'Training in disciplines like karate, taekwondo, or judo',
            ],
            [
                'name' => 'Hiking',
                'description' => 'Outdoor walking on natural trails or hills',
            ],
            [
                'name' => 'Paddleboarding',
                'description' => 'Balancing on a paddleboard for a core workout',
            ],
            [
                'name' => 'Elliptical Training',
                'description' => 'Low-impact cardio exercise using an elliptical machine',
            ],
            [
                'name' => 'Jump Rope',
                'description' => 'Simple and effective cardiovascular exercise',
            ],
            [
                'name' => 'Zumba',
                'description' => 'Dance-based workout for cardiovascular fitness',
            ],
            [
                'name' => 'TRX Suspension Training',
                'description' => 'Full-body resistance training using suspension straps',
            ],
            [
                'name' => 'Running',
                'description' => 'Sprint or jog for cardio exercise',
            ],
            [
                'name' => 'Yoga',
                'description' => 'Mindful practice for flexibility and relaxation',
            ],
            [
                'name' => 'Cycling',
                'description' => 'Biking for cardiovascular fitness',
            ],
            [
                'name' => 'Swimming',
                'description' => 'Full-body workout in the pool',
            ],
            [
                'name' => 'Pilates',
                'description' => 'Core-strengthening exercises for stability',
            ],
            [
                'name' => 'HIIT (High-Intensity Interval Training)',
                'description' => 'Short bursts of intense exercise followed by rest periods',
            ],
            [
                'name' => 'Dancing',
                'description' => 'Fun way to stay active with various dance styles',
            ],
            [
                'name' => 'Circuit Training',
                'description' => 'Rotating through different exercises for a full-body workout',
            ],
            [
                'name' => 'Rowing',
                'description' => 'Low-impact exercise using a rowing machine',
            ],
            [
                'name' => 'Kickboxing',
                'description' => 'Combines martial arts and cardio exercises',
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
