<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

/**
 * Class UserServiceTest
 */
class UserServiceTest extends TestCase
{
    /** @test */
    /** @test */
    public function it_soft_deletes_user()
    {
        $user = User::factory()->create();
        UserService::delete($user);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }

    /** @test */
    public function it_gets_paginated_users()
    {
        User::factory(15)->create();
        $request = new Request(['search' => '']);
        $result = UserService::getPaginatedUsers($request);
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);

        $this->assertEquals(env('PER_PAGE'), $result->perPage());
    }

    /** @test */
    public function it_gets_users()
    {
        User::factory(5)->create();
        $request = new Request(['search' => '']);
        $result = UserService::getUsers($request);

        $this->assertCount(20, $result); // 15 added above
    }

    /** @test */
    public function it_queries_users_by_search_term()
    {
        $user1 = User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);
        $user2 = User::factory()->create(['name' => 'Jane Doe', 'email' => 'jane@example.com']);
        $user3 = User::factory()->create(['name' => 'Bob Smith', 'email' => 'bob@example.com']);
        $request = new Request(['search' => 'Doe']); // Searching for users with 'Doe' in name or email
        $result = UserService::getUsers($request);
        $this->assertCount(2, $result);
        $this->assertContains($user1->id, $result->pluck('id'));
        $this->assertContains($user2->id, $result->pluck('id'));
        $this->assertNotContains($user3->id, $result->pluck('id'));
    }
}
