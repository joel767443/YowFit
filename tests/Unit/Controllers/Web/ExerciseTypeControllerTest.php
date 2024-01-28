<?php

namespace Tests\Unit\Controllers\Web;
use App\Models\User;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\TestCase;

class ExerciseTypeControllerTest extends TestCase
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
    public function it_displays_exercise_type_index_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('exercise-types.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_exercise_type_create_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('exercise-types.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_creates_exercise_type()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $name = $this->faker->word;
        $fakeExerciseTypeData = [
            'name' => $name,
            'slug' => Str::slug($name),
        ];

        $this->mock(ExerciseTypeRepositoryInterface::class, function ($mock) use ($fakeExerciseTypeData) {
            $mock->shouldReceive('create')->once()->with($fakeExerciseTypeData);
        });

        $response = $this->post(route('exercise-types.store'), $fakeExerciseTypeData);

        $response->assertRedirect(route('exercise-types.index'));

        $response->assertSessionHas('success', 'ExerciseType created successfully.');
    }
}
