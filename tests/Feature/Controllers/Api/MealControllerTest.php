<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\Meal;
use App\Models\User;
use App\Repositories\Contracts\MealRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MealControllerTest extends TestCase
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
     * Test the index method of the MealController.
     *
     * @return void
     * @throws Exception
     */
    public function test_index_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for MealRepositoryInterface
        $mealRepositoryMock = $this->createMock(MealRepositoryInterface::class);

        // Set up expectations for the repository mock
        $mealData = ['sample_data']; // Replace with sample data
        $paginator = new LengthAwarePaginator($mealData, count($mealData), 10, 1);
        $mealRepositoryMock->expects($this->once())
            ->method('getAll')
            ->willReturn($paginator);

        $this->app->instance(MealRepositoryInterface::class, $mealRepositoryMock);

        // Make a request to the controller's index method
        $response = $this->getJson('/api/meals');

        $expectedJson = [
            'status' => 200,
            'message' => 'Operation successful',
            'data' => [
                'current_page' => 1,
                'data' => ['sample_data'],
                'first_page_url' => '/?page=1',
                'from' => 1,
                'last_page' => 1,
                'last_page_url' => '/?page=1',
                'links' => [
                    [
                        'url' => null,
                        'label' => '&laquo; Previous',
                        'active' => false,
                    ],
                    [
                        'url' => '/?page=1',
                        'label' => '1',
                        'active' => true,
                    ],
                    [
                        'url' => null,
                        'label' => 'Next &raquo;',
                        'active' => false,
                    ],
                ],
                'next_page_url' => null,
                'path' => '/',
                'per_page' => 10,
                'prev_page_url' => null,
                'to' => 1,
                'total' => 1,
            ],
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJson);
    }

    /**
     * Test the show method of the MealController.
     *
     * @return void
     */
    public function test_show_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create a test meal
        $meal = Meal::factory()->create();

        // Make a request to the controller's show method
        $response = $this->getJson("/api/meals/$meal->id");

        $expectedJSon = [
            "status" => 200,
            "message" => "Operation successful",
            "data" => $meal->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJSon);
    }

    /**
     * Test the store method of the MealController.
     *
     * @return void
     * @throws Exception
     */
    public function test_store_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for MealRepositoryInterface
        $mealRepositoryMock = $this->createMock(MealRepositoryInterface::class);

        // Set up expectations for the repository mock
        $createdMeal = Meal::factory()->make();
        $mealRepositoryMock->expects($this->once())
            ->method('create')
            ->willReturn($createdMeal);

        $this->app->instance(MealRepositoryInterface::class, $mealRepositoryMock);

        // Make a request to the controller's store method
        $response = $this->postJson('/api/meals', $createdMeal->toArray());

        $expectedJSon = [
            "status" => Response::HTTP_CREATED,
            "message" => "Operation successful",
            "data" => $createdMeal->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson($expectedJSon);
    }

    /**
     * Test the update method of the MealController.
     *
     * @return void
     * @throws Exception
     */
    public function test_update_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create a test meal
        $meal = Meal::factory()->create();

        // Replace with appropriate mocking or setup for MealRepositoryInterface
        $mealRepositoryMock = $this->createMock(MealRepositoryInterface::class);

        // Set up expectations for the repository mock
        $updatedMealData = [
            'name' => 'Updated Meal',
            'description' => 'Updated Meal updated',
            'meal_type_id' => $meal->mealType->id,
        ]; // Replace with updated data
        $mealRepositoryMock->expects($this->once())
            ->method('update')
            ->willReturn($meal);

        $this->app->instance(MealRepositoryInterface::class, $mealRepositoryMock);

        // Make a request to the controller's update method
        $response = $this->putJson("/api/meals/$meal->id", $updatedMealData);

        $expectedJSon = [
            "status" => Response::HTTP_CREATED,
            "message" => "Operation successful",
            "data" => $meal->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson($expectedJSon);
    }
}
