<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class MealTypeSeeder
 */
class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mealTypes = [
            "Breakfast",
            "Lunch",
            "Dinner",
            "Snack",
            "Brunch",
            "Dessert",
            "Appetizer",
            "Beverage",
            "Pre-Workout",
            "Post-Workout",
            "Main Course",
            "Side Dish",
            "Salad",
            "Soup",
            "Smoothie",
            "Grill",
            "Vegetarian",
            "Vegan",
            "Gluten-Free",
            "Low-Carb",
        ];

        foreach ($mealTypes as $type) {

            DB::table('meal_types')->insert([
                'name' => $type,
                'slug' => Str::slug($type),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
