<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

    use RefreshDatabase;

    /** @var UserRepository */
    private UserRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new UserRepository(new User());
    }

    /** @test */
    public function it_can_create_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
        ];

        $createdUser = $this->repository->create($userData);

        $this->assertInstanceOf(User::class, $createdUser);
        $this->assertDatabaseHas('users', ['id' => $createdUser->id]);
    }

    /** @test */
    public function it_can_find_user_by_id()
    {
        $user = User::factory()->create();
        $foundUser = $this->repository->findById($user->id);
        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($user->id, $foundUser->id);
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = User::factory()->create();
        $updatedData = ['name' => 'Updated Name'];

        $updatedUser = $this->repository->update($user, $updatedData);

        $this->assertInstanceOf(User::class, $updatedUser);
        $this->assertEquals('Updated Name', $updatedUser->name);
    }

    /** @test */
    public function it_can_delete_user()
    {
        $user = User::factory()->create();
        $this->repository->delete($user);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
    }

    /** @test */
    public function it_can_get_more_than_one_by_specified_column_or_get_all()
    {
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Doe']);

        $result = $this->repository->findBy('name', 'John Doe');

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
        $this->assertCount(2, $result);

        $resultAll = $this->repository->getAll();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $result);
        $this->assertCount(3, $resultAll);
    }
}
