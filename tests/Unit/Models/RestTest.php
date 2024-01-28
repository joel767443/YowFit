<?php

namespace Tests\Unit\Models;

use App\Models\Rest;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_rest_entry()
    {
        $restData = [
            'name' => 'name',
            'slug' => 'slug',
            'description' => 'description',
        ];

        $rest = Rest::create($restData);

        $this->assertDatabaseHas('rest', $restData);
        $this->assertInstanceOf(Rest::class, $rest);
    }

    /** @test */
    public function it_has_schedule_times_relationship()
    {
        /** @var Rest $rest */
        $rest = Rest::factory()->create();
        $scheduleTime = $rest->scheduleTimes()->create([
            'start_time' => '06:00',
            'end_time' => '12:00',
            'schedule_id' => Schedule::factory()->create()->id,
            'scheduleable_id' => $rest->id,
            'scheduleable_type' => Rest::class,
        ]);

        $this->assertTrue($rest->scheduleTimes->contains($scheduleTime));
    }
}
