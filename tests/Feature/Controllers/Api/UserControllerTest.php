<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test the login method of the UserController.
     *
     * @return void
     */
    public function test_login_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create a test user
        $password = 'testpassword';
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        // Make a request to the controller's login method
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $response['token'], // Adjust this based on the actual response structure
        ]);
    }

    /**
     * Test the register method of the UserController.
     *
     * @return void
     */
    public function test_register_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create test data
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'testpassword',
        ];

        // Make a request to the controller's register method
        $response = $this->postJson('/api/register', $userData);

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $response['token'], // Adjust this based on the actual response structure
        ]);
    }

}
