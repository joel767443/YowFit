<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\User;
use App\Models\WeightTracking;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class WeightTrackingControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        Sanctum::actingAs(User::where('email', 'test-admin@yowfit.com')->first());
    }

    /**
     * Test the show method of the WeightTrackingController.
     *
     * @return void
     * @throws Exception
     */
    public function test_show_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for WeightTrackingRepositoryInterface
        $weightTrackingRepositoryMock = $this->createMock(WeightTrackingRepositoryInterface::class);

        $expectedJson = [
            "status" => 200,
            "message" => "Operation successful",
            "data" => null
        ];

        $this->app->instance(WeightTrackingRepositoryInterface::class, $weightTrackingRepositoryMock);

        // Make a request to the controller's show method
        $response = $this->getJson('/api/weight-tracking');

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJson);
    }

    /**
     * Test the store method of the WeightTrackingController.
     *
     * @return void
     * @throws Exception
     */
    public function test_store_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for WeightTrackingRepositoryInterface
        $weightTrackingRepositoryMock = $this->createMock(WeightTrackingRepositoryInterface::class);

        // Set up expectations for the repository mock
        $createdWeightLog = WeightTracking::factory()->make();

        $weightTrackingRepositoryMock->expects($this->once())
            ->method('create')
            ->willReturn($createdWeightLog);

        $this->app->instance(WeightTrackingRepositoryInterface::class, $weightTrackingRepositoryMock);

        // Make a request to the controller's store method
        $response = $this->postJson('/api/weight-tracking/log', $createdWeightLog->toArray());

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            "status" => 201,
            "message" => "Operation successful",
            "data" => $createdWeightLog->toArray()
        ]);
    }
}
