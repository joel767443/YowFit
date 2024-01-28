<?php

namespace Tests\Unit\Models;

use App\Models\WeightTracking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeightTrackingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_weight_tracking_entry()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('secret'),
        ];

        $user = User::create($userData);

        $weightTrackingData = [
            'user_id' => $user->id,
            'weight' => 75.5,
        ];

        $weightTracking = WeightTracking::create($weightTrackingData);

        $this->assertDatabaseHas('weight_tracking', $weightTrackingData);
        $this->assertInstanceOf(WeightTracking::class, $weightTracking);
    }

    /** @test */
    public function it_belongs_to_user()
    {
        $user = User::factory()->create();
        $weightTracking = WeightTracking::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $weightTracking->user);
        $this->assertEquals($user->id, $weightTracking->user->id);
    }

    /** @test */
    public function it_can_filter_by_weight()
    {
        // Create weight tracking entries for testing
        WeightTracking::factory()->create(['weight' => 70.0]);
        WeightTracking::factory()->create(['weight' => 75.5]);
        WeightTracking::factory()->create(['weight' => 80.0]);

        // Query weight tracking entries with weight greater than 75
        $result = WeightTracking::where('weight', '>', 70.0)->get();

        // Assert that there are two entries matching the condition
        $this->assertCount(2, $result);
        $this->assertEquals([75.5, 80.0], $result->pluck('weight')->toArray());
    }
}
