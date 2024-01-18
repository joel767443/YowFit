<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

    use RefreshDatabase;

    /** @var UserRepository */
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository(new User());
    }

    /** @test */
    public function it_can_create_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
        ];

        $createdUser = $this->userRepository->create($userData);

        $this->assertInstanceOf(User::class, $createdUser);
        $this->assertDatabaseHas('users', ['id' => $createdUser->id]);
    }

    /** @test */
    public function it_can_find_user_by_id()
    {
        $user = User::factory()->create();
        $foundUser = $this->userRepository->findById($user->id);
        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = User::factory()->create();
        $updatedData = ['name' => 'Updated Name'];

        $updatedUser = $this->userRepository->update($user, $updatedData);

        $this->assertInstanceOf(User::class, $updatedUser);
        $this->assertEquals('Updated Name', $updatedUser->name);
    }

    /** @test */
    public function it_can_delete_user()
    {
        $user = User::factory()->create();
        $this->userRepository->delete($user);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }

}
