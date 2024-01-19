<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\WeightTracking;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class WeightTrackingTest
 */
class WeightTrackingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $weightTracking = WeightTracking::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $weightTracking->user);
        $this->assertEquals($user->id, $weightTracking->user->id);
    }

    /** @test */
    public function it_can_create_a_weight_tracking_entry()
    {
        $user = User::factory()->create();

        $weightTrackingData = [
            'user_id' => $user->id,
            'weight' => 70.5,
        ];

        WeightTracking::create($weightTrackingData);

        $this->assertDatabaseHas('weight_tracking', $weightTrackingData);
    }

    /** @test */
    public function it_can_search_by_user_id()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        WeightTracking::factory()->create(['user_id' => $user1->id]);
        WeightTracking::factory()->create(['user_id' => $user2->id]);

        $searchedEntries = WeightTracking::where('user_id', $user1->id)->get();

        $this->assertCount(1, $searchedEntries);
        $this->assertEquals($user1->id, $searchedEntries->first()->user_id);
    }
}
