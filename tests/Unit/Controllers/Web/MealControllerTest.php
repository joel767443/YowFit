<?php

namespace Tests\Unit\Controllers\Web;

use App\Models\Meal;
use App\Models\MealType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class MealControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        Route::middleware(['web', 'auth'])
            ->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_meal_index_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('meals.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_meal_show_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $meal = Meal::factory()->create();

        $response = $this->get(route('meals.show', $meal));

        $response->assertStatus(200);
        // Add more assertions based on your application logic
    }

    /** @test */
    public function it_displays_meal_edit_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $meal = Meal::factory()->create();

        $response = $this->get(route('meals.edit', $meal));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_meal_create_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('meals.create'));

        $response->assertStatus(200);
        // Add more assertions based on your application logic
    }

    /** @test */
    public function it_creates_meal()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $fakeMealData = [
            'name' => $this->faker()->name(),
            'description' => $this->faker()->text(),
            'ingredients' => $this->faker()->text(),
            'instructions' => $this->faker()->text(),
            'meal_type_id' => MealType::inRandomOrder()->first()->id,
        ];

        $response = $this->post(route('meals.store'), $fakeMealData);

        $response->assertRedirect(route('meals.index'));
        $response->assertSessionHas('success', 'Meal created successfully.');
    }

    /** @test */
    public function it_updates_meal()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $meal = Meal::factory()->create();
        $fakeMealData = [
            'name' => $this->faker()->word(),
            'description' => $this->faker()->realText,
            'meal_type_id' => MealType::inRandomOrder()->first()->id,
        ];

        $response = $this->put(route('meals.update', $meal), $fakeMealData);

        $response->assertRedirect(route('meals.show', $meal));
    }
}
