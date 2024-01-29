<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\User;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class HomeControllerTest
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
        Artisan::call('db:seed');
        Sanctum::actingAs(User::where('email', 'test-admin@yowfit.com')->first());
    }

    /**
     * Test the index method of the HomeController.
     *
     * @return void
     * @throws Exception
     */
    public function test_index_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for WeightTrackingRepositoryInterface
        $weightTrackingRepositoryMock = $this->createMock(WeightTrackingRepositoryInterface::class);

        // Set up expectations for the repository mock
        $weightData = ['sample_data']; // Replace with sample data
        $weightTrackingRepositoryMock->expects($this->once())
            ->method('getWeightData')
            ->willReturn($weightData);

        $this->app->instance(WeightTrackingRepositoryInterface::class, $weightTrackingRepositoryMock);

        // Make a request to the controller's index method
        $response = $this->getJson('/api/home');

        $expectedJson = [];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJson);
    }
}
