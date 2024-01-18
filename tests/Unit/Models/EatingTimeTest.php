<?php

namespace Tests\Unit\Models;

use App\Models\EatingTime;
use App\Models\Meal;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class EatingTimeTest
 */
class EatingTimeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_meal()
    {
        $eatingTime = EatingTime::factory()->create();
        $this->assertInstanceOf(Meal::class, $eatingTime->meal);
    }

    /** @test */
    public function it_can_create_an_eating_time()
    {
        $eatingTimeData = [
            'eating_time_from' => '12:00',
            'eating_time_to' => '12:30',
            'schedule_id' => Schedule::factory()->create()->id,
            'meal_id' => Meal::factory()->create()->id,
        ];

        EatingTime::create($eatingTimeData);

        $this->assertDatabaseHas('eating_times', $eatingTimeData);
    }

    /** @test */
    public function it_can_update_an_eating_time()
    {
        $eatingTime = EatingTime::factory()->create();
        $updatedData = [
            'eating_time_from' => '13:00',
        ];

        $eatingTime->update($updatedData);

        $this->assertDatabaseHas('eating_times', $updatedData);
    }

    /** @test */
    public function it_can_delete_an_eating_time()
    {
        $eatingTime = EatingTime::factory()->create();
        $eatingTime->delete();

        $this->assertDatabaseMissing('eating_times', ['id' => $eatingTime->id]);
    }
}
