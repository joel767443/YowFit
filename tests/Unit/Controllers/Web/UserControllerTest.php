<?php

namespace Tests\Unit\Controllers\Web;

use App\Http\Controllers\Web\UserController;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * Class UserControllerTest
 */
class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        Route::middleware(['web', 'auth'])
            ->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_user_index_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $response = $this->get(route('users.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_user_show_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $viewUser = User::factory()->create();

        $response = $this->get(route('users.show', $viewUser));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_user_edit_page()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $editUser = User::factory()->create();

        $response = $this->get(route('users.edit', $editUser));

        $response->assertStatus(200);
    }


    /** @test */
    public function it_updates_user()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);
        $adminRole = Role::where('name', User::ROLE_ADMIN)->first();

        // Simulate a valid request
        $requestData = [
            'name' => 'Updated Name',
            'email' => 'email@same.com',
            'roles' => [$adminRole->id],
        ];

        // Assuming your update route is something like 'users/{user}'
        $response = $this->put(route('users.update', ['user' => $user->id]), $requestData);

        // Assert that the user roles have been updated
        $this->assertEquals([User::ROLE_ADMIN], $user->roles->pluck('name')->toArray());

        $this->assertEquals(route('users.show', $user), $response->headers->get('Location'));
    }

    /** @test */
    public function it_deletes_user()
    {
        $user = User::factory()->create();
        $user->assignRole(User::ROLE_ADMIN);
        $this->actingAs($user);

        $deleteUser = User::factory()->create();

        $response = $this->delete(route('users.destroy', $deleteUser));

        $response->assertRedirect(route('users.index'));
    }
}
