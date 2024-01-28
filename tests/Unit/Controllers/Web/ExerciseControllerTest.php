<?php

namespace Tests\Unit\Controllers\Web;

use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\User;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ExerciseControllerTest extends TestCase
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
    public function it_displays_exercise_index_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('exercises.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_exercise_show_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $exercise = Exercise::factory()->create();

        $response = $this->get(route('exercises.show', $exercise));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_exercise_edit_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $exercise = Exercise::factory()->create();

        $response = $this->get(route('exercises.edit', $exercise));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_exercise_create_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('exercises.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_creates_exercise()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $fakeExerciseData = [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'link' => $this->faker->url,
            'exercise_type_id' => ExerciseType::inRandomOrder()->first()->id,
        ];

        $this->mock(ExerciseRepositoryInterface::class, function ($mock) use ($fakeExerciseData) {
            $mock->shouldReceive('create')->once()->with($fakeExerciseData);
        });

        $response = $this->post(route('exercises.store'), $fakeExerciseData);

        $response->assertRedirect(route('exercises.index'));

        $response->assertSessionHas('success', 'Exercise stored.');
    }

    /** @test */
    public function it_updates_exercise()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $exercise = Exercise::factory()->create();
        $fakeExerciseData = [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'link' => $this->faker->url,
            'exercise_type_id' => ExerciseType::inRandomOrder()->first()->id,
        ];

        $response = $this->put(route('exercises.update', $exercise), $fakeExerciseData);

        $response->assertRedirect(route('exercises.show', $exercise));
    }
}
