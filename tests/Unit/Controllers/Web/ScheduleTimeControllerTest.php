<?php

namespace Tests\Unit\Controllers\Web;

use App\Models\Exercise;
use App\Models\ScheduleTime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ScheduleTimeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Route::middleware(['web', 'auth'])
            ->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_my_schedule_page()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('schedule.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_updates_schedule_time()
    {
        $this->actingAs(User::factory()->create());

        $scheduleTime = ScheduleTime::factory()->create();

        $fakeData = [
            'start_time' => '08:00',
            'end_time' => '12:30',
            'schedule_id' => $scheduleTime->schedule_id,
            'scheduleable_id' => $scheduleTime->scheduleable_id,
            'scheduleable_type' => Exercise::class,
        ];

        $response = $this->json('POST', route('schedule_times.update', $scheduleTime), $fakeData);

        $response->assertStatus(200);
        $response->assertJson(['success']);
    }
}
