<?php

namespace Tests\Unit\Controllers\Web;

use App\Models\User;
use App\Models\WeightTracking;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

/**
 * Class WeightTrackingControllerTest
 */
class WeightTrackingControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware(['web', 'auth'])
            ->prefix('admin')
            ->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_weight_tracking_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('weight-tracking.show'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_weight_log_page()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('weight-tracking.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_creates_weight_log()
    {
        $this->actingAs(User::factory()->create());
        $fakeData = WeightTracking::factory()->make()->toArray();

        $this->mock(WeightTrackingRepositoryInterface::class, function ($mock) use ($fakeData) {
            $mock->shouldReceive('create')->once()->with($fakeData);
        });

        $response = $this->post(route('weight-tracking.store'), $fakeData);
        $response->assertRedirect(route('weight-tracking.show'));
        $response->assertSessionHas('success', 'Log added successfully.');
    }
}
