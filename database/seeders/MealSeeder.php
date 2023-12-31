<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealType;
use Illuminate\Database\Seeder;

/**
 * Class MealSeeder
 */
class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mealTypes = MealType::pluck('id');

        $meals = [
            [
                'name' => 'Mediterranean Chickpea Salad',
                'description' => 'Refreshing salad with chickpeas, feta, and olives',
                'ingredients' => 'Chickpeas, cherry tomatoes, feta cheese, olives, olive oil',
                'instructions' => 'Combine chickpeas, cherry tomatoes, feta cheese, and olives. Drizzle with olive oil.',
            ],
            [
                'name' => 'Taco Bowl',
                'description' => 'Mexican-inspired bowl with seasoned beef, rice, and toppings',
                'ingredients' => 'Ground beef, rice, black beans, salsa, avocado',
                'instructions' => 'Season and cook ground beef, serve over rice with black beans, salsa, and sliced avocado.',
            ],
            [
                'name' => 'Spinach and Mushroom Omelette',
                'description' => 'Fluffy omelette filled with spinach and mushrooms',
                'ingredients' => 'Eggs, spinach, mushrooms, cheese',
                'instructions' => 'Whisk eggs and pour into a pan with sautéed spinach and mushrooms. Add cheese and fold.',
            ],
            [
                'name' => 'Shrimp Stir-Fry',
                'description' => 'Quick stir-fry with shrimp, vegetables, and soy sauce',
                'ingredients' => 'Shrimp, broccoli, snow peas, soy sauce',
                'instructions' => 'Stir-fry shrimp and vegetables in a wok, then add soy sauce for flavor.',
            ],
            [
                'name' => 'Caprese Sandwich',
                'description' => 'Italian sandwich with mozzarella, tomatoes, and basil',
                'ingredients' => 'Mozzarella cheese, tomatoes, fresh basil, balsamic glaze',
                'instructions' => 'Layer mozzarella, tomatoes, and basil on bread. Drizzle with balsamic glaze and close the sandwich.',
            ],
            [
                'name' => 'Salmon Salad',
                'description' => 'Refreshing salad with grilled salmon',
                'ingredients' => 'Salmon fillet, mixed greens, cherry tomatoes, olive oil',
                'instructions' => 'Grill the salmon and toss with mixed greens and cherry tomatoes. Drizzle with olive oil.',
            ],
            [
                'name' => 'Spaghetti Bolognese',
                'description' => 'Classic Italian pasta dish with meat sauce',
                'ingredients' => 'Spaghetti, ground beef, tomatoes, onions, garlic',
                'instructions' => 'Cook the spaghetti and simmer ground beef with tomatoes, onions, and garlic for the sauce.',
            ],
            [
                'name' => 'Vegetarian Stir-Fry',
                'description' => 'Colorful stir-fry with a variety of vegetables',
                'ingredients' => 'Broccoli, bell peppers, carrots, tofu, soy sauce',
                'instructions' => 'Stir-fry vegetables and tofu in a wok, then add soy sauce for flavor.',
            ],
            [
                'name' => 'Quinoa Salad',
                'description' => 'Healthy salad with quinoa, vegetables, and feta cheese',
                'ingredients' => 'Quinoa, cucumber, cherry tomatoes, feta cheese, olive oil',
                'instructions' => 'Cook quinoa and mix with chopped vegetables. Top with crumbled feta and drizzle with olive oil.',
            ],
            [
                'name' => 'Chicken Caesar Wrap',
                'description' => 'Wrap filled with grilled chicken, romaine lettuce, and Caesar dressing',
                'ingredients' => 'Grilled chicken, romaine lettuce, Caesar dressing, tortilla wrap',
                'instructions' => 'Fill tortilla wrap with grilled chicken, romaine lettuce, and Caesar dressing. Roll it up and enjoy.',
            ],
        ];

        foreach ($meals as $meal) {
            Meal::create([
                'name' => $meal['name'],
                'description' => $meal['description'],
                'ingredients' => $meal['ingredients'],
                'instructions' => $meal['instructions'],
                'meal_type_id' => collect($mealTypes)->random()
            ]);
        }
    }
}
