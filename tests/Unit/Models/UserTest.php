<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\UserStatus;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('secret'),
            'user_status_id' => UserStatus::factory()->create()->id,
        ];

        $user = User::create($userData);

        $this->assertDatabaseHas('users', ['name' => 'John Doe']);
        $this->assertInstanceOf(User::class, $user);
    }

    /** @test */
    public function it_belongs_to_user_status()
    {
        $userStatus = UserStatus::factory()->create();
        $user = User::factory()->create(['user_status_id' => $userStatus->id]);

        $this->assertInstanceOf(UserStatus::class, $user->userStatus);
        $this->assertEquals($userStatus->id, $user->userStatus->id);
    }

    /** @test */
    public function it_has_many_schedules()
    {
        $user = User::factory()->create();
        $schedule = Schedule::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->schedules->contains($schedule));
    }

    /** @test */
    public function it_can_search_users()
    {
        // Create users for testing
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Doe']);
        User::factory()->create(['name' => 'Another User']);

        // Search for users
        $result = User::search('John')->get();

        // Assert that there is one user matching the search
        $this->assertCount(1, $result);
        $this->assertEquals(['John Doe'], $result->pluck('name')->toArray());
    }

    /** @test */
    public function it_can_add_roles_to_user()
    {
        $role1 = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $role2 = Role::create([
            'name' => 'Normal',
            'guard_name' => 'web'
        ]);

        // Create roles for testing
        $roleIds = [$role1->id, $role2->id];
        $user = User::factory()->create();

        $user->addRoles($roleIds);

        // Assert that the user has the assigned roles
        $this->assertTrue($user->hasRole('Admin'));
        $this->assertTrue($user->hasRole('Normal'));
    }
}
