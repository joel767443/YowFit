<?php

namespace Tests\Unit\Controllers\Web;

use App\Models\User;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

/**
 *
 */
class HomeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Route::middleware(['web', 'auth'])
            ->group(base_path('routes/web.php'));
    }

    /** @test */
    public function it_displays_home_page()
    {
        $this->actingAs(User::factory()->create());

        $this->mock(WeightTrackingRepositoryInterface::class, function ($mock) {
            $mock->shouldReceive('getWeightData')->once()->andReturn([]);
        });

        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
