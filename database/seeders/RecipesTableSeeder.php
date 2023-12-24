<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use Faker\Factory as Faker;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 50 sample recipes
        foreach (range(1, 50) as $index) {
            Recipe::create([
                'name' => $faker->words(3, true),
                'ingredients' => $faker->paragraph,
                'instructions' => $faker->paragraphs(3, true),
            ]);
        }
    }
}
