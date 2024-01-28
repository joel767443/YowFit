<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\Exercise;
use App\Models\User;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class ExerciseControllerTest
 */
class ExerciseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
        Sanctum::actingAs(User::where('email', 'admin@yowfit.com')->first());
    }

    /**
     * Test the index method of the ExerciseController.
     *
     * @return void
     * @throws Exception
     */
    public function test_index_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for ExerciseRepositoryInterface
        $exerciseRepositoryMock = $this->createMock(ExerciseRepositoryInterface::class);

        // Set up expectations for the repository mock
        $exerciseData = ['sample_data']; // Replace with sample data
        $paginator = new LengthAwarePaginator($exerciseData, count($exerciseData), 10, 1);
        $exerciseRepositoryMock->expects($this->once())
            ->method('getAll')
            ->willReturn($paginator);

        $this->app->instance(ExerciseRepositoryInterface::class, $exerciseRepositoryMock);

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

        // Make a request to the controller's index method
        $response = $this->getJson('/api/exercises');

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJson);
    }

    /**
     * Test the show method of the ExerciseController.
     *
     * @return void
     */
    public function test_show_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create a test exercise
        $exercise = Exercise::factory()->create();

        // Make a request to the controller's show method
        $response = $this->getJson("/api/exercises/$exercise->id");

        $expectedJSon = [
            "status" => 200,
            "message" => "Operation successful",
            "data" => $exercise->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson($expectedJSon);
    }

    /**
     * Test the store method of the ExerciseController.
     *
     * @return void
     * @throws Exception
     */
    public function test_store_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Replace with appropriate mocking or setup for ExerciseRepositoryInterface
        $exerciseRepositoryMock = $this->createMock(ExerciseRepositoryInterface::class);

        // Set up expectations for the repository mock
        $createdExercise = Exercise::factory()->make();
        $exerciseRepositoryMock->expects($this->once())
            ->method('create')
            ->willReturn($createdExercise);

        $this->app->instance(ExerciseRepositoryInterface::class, $exerciseRepositoryMock);

        // Make a request to the controller's store method
        $response = $this->postJson('/api/exercises', $createdExercise->toArray());

        $expectedJSon = [
            "status" => Response::HTTP_CREATED,
            "message" => "Operation successful",
            "data" => $createdExercise->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson($expectedJSon);
    }

    /**
     * Test the update method of the ExerciseController.
     *
     * @return void
     * @throws Exception
     */
    public function test_update_method_returns_json_response()
    {
        $this->withoutExceptionHandling();

        // Create a test exercise
        $exercise = Exercise::factory()->create();

        // Replace with appropriate mocking or setup for ExerciseRepositoryInterface
        $exerciseRepositoryMock = $this->createMock(ExerciseRepositoryInterface::class);

        // Set up expectations for the repository mock
        $updatedExerciseData = [
            'name' => 'Updated Exercise',
            'description' => 'Updated Exercise for test',
            'exercise_type_id' => $exercise->exerciseType->id
        ];
        $exerciseRepositoryMock->expects($this->once())
            ->method('update')
            ->willReturn($exercise);

        $this->app->instance(ExerciseRepositoryInterface::class, $exerciseRepositoryMock);

        // Make a request to the controller's update method
        $response = $this->putJson("/api/exercises/$exercise->id", $updatedExerciseData);

        $expectedJSon = [
            "status" => Response::HTTP_CREATED,
            "message" => "Operation successful",
            "data" => $exercise->toArray()
        ];

        // Assert the response is a JSON response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson($expectedJSon);
    }
}
