<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserType;

/**
 * Class UserControllerTest
 */
class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    public function test_update_user_with_valid_data()
    {
        $user = User::factory()->create();
        Auth::login($user);
        $userType = UserType::factory()->create();

        $newUserData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'user_type_id' => $userType->id,
        ];

        $response = $this->put("/users/$user->id", $newUserData);
        $response->assertRedirect("/users/$user->id");
        $this->assertDatabaseHas('users', $newUserData);
    }

    /**
     * @return void
     */
    public function test_update_user_with_invalid_data()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $invalidUserData = [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'user_type_id' => 'non-integer-value',
        ];

        $response = $this->put("/users/$user->id", $invalidUserData);

        $response->assertSessionHasErrors(['name', 'email', 'password', 'user_type_id']);
    }

    /**
     * @return void
     */
    public function test_update_user_with_partial_data()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $newUserData = [
            'name' => $this->faker->name,
        ];

        $response = $this->put("/users/$user->id", $newUserData);

        $response->assertRedirect("/users/$user->id");
        $this->assertDatabaseHas('users', ['name' => $newUserData['name']]);
    }

    /**
     * @return void
     */
    public function test_update_non_existing_user()
    {
        $user = User::factory()->create();
        Auth::login($user);
        $response = $this->put("/users/999", ['name' => 'John Doe']);

        $response->assertStatus(404);
    }

    /**
     * @return void
     */
    public function test_update_user_type()
    {
        $user = User::factory()->create();
        Auth::login($user);
        $newUserType = UserType::factory()->create();

        $response = $this->put("/users/$user->id", [
            'user_type_id' => $newUserType->id,
        ]);

        $response->assertRedirect("/users/$user->id");
        $this->assertDatabaseHas('users', ['user_type_id' => $newUserType->id]);
    }
}
