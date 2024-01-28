<?php

namespace Tests\Unit\Models;

use App\Models\Exercise;
use App\Models\Schedule;
use App\Models\Work;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_work_entry()
    {
        $workData = [
            'name' => 'name',
            'slug' => 'slug',
            'description' => 'description',
        ];

        $work = Work::create($workData);

        $this->assertDatabaseHas('work', $workData);
        $this->assertInstanceOf(Work::class, $work);
    }

    /** @test */
    public function it_has_schedule_times_relationship()
    {
        $work = Work::factory()->create();
        $schedule = Schedule::factory()->create();

        $scheduleTime = $work->scheduleTimes()->create([
            'start_time' => '12:00',
            'end_time' => '14:00',
            'schedule_id' => $schedule->id,
            'scheduleable_id' => $work->id,
            'scheduleable_type' => Work::class,
        ]);

        $this->assertTrue($work->scheduleTimes->contains($scheduleTime));
    }
}
