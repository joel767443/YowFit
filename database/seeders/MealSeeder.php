<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            [
                'name' => 'Veggies and boiled eggs',
                'description' => 'Veggies and boiled eggs',
                'ingredients' => 'Veggies and boiled eggs',
                'instructions' => 'Boil the eggs and steam the veggies',
            ],
            [
                'name' => 'Rice and Chicken',
                'description' => 'cook the rice and the chicken',
                'ingredients' => 'cook the rice and the chicken',
                'instructions' => 'cook the rice and the chicken',
            ],
            [
                'name' => 'pap and beef',
                'description' => 'pap and beef',
                'ingredients' => 'pap and beef',
                'instructions' => 'pap and beef',
            ],
        ];

        foreach ($meals as $meal) {
            Meal::create([
                'name' => $meal['name'],
                'description' => $meal['description'],
                'ingredients' => $meal['ingredients'],
                'instructions' => $meal['instructions'],
            ]);
        }
    }
}
