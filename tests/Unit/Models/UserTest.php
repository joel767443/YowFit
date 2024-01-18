<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\UserType;
use App\Models\UserStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class UserTest
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
            'user_type_id' => UserType::factory()->create()->id,
            'user_status_id' => UserStatus::factory()->create()->id,
        ];

        User::create($userData);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function it_can_check_if_user_is_admin()
    {
        // Create a user with admin user type
        $adminUser = User::factory()->create([
            'user_type_id' => UserType::factory()->create(['name' => 'admin'])->id,
        ]);

        // Create a regular user
        $regularUser = User::factory()->create([
            'user_type_id' => UserType::factory()->create(['name' => 'regular'])->id,
        ]);

        $this->assertTrue($adminUser->isAdmin());
        $this->assertFalse($regularUser->isAdmin());
    }

    /** @test */
    public function it_has_user_type_relation()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(UserType::class, $user->userType);
    }

    /** @test */
    public function it_has_user_status_relation()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(UserStatus::class, $user->userStatus);
    }

    /** @test */
    public function it_has_schedules_relation()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $user->schedules);
    }
}
