<?php

namespace App\Providers;

use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Contracts\ScheduleTimeRepositoryInterface;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use App\Repositories\ExerciseRepository;
use App\Repositories\ScheduleTimeRepository;
use App\Repositories\ExerciseTypeRepository;
use App\Repositories\MealRepository;
use App\Repositories\MealTypeRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserStatusRepository;
use App\Repositories\WeightTrackingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\MealRepositoryInterface;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * The repository interface bindings.
     *
     * @var array
     */
    protected array $repositories = [

        ExerciseRepositoryInterface::class => ExerciseRepository::class,
        ScheduleTimeRepositoryInterface::class => ScheduleTimeRepository::class,
        ExerciseTypeRepositoryInterface::class => ExerciseTypeRepository::class,
        MealRepositoryInterface::class => MealRepository::class,
        MealTypeRepositoryInterface::class => MealTypeRepository::class,
        ScheduleRepositoryInterface::class => ScheduleRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        UserStatusRepositoryInterface::class => UserStatusRepository::class,

        WeightTrackingRepositoryInterface::class => WeightTrackingRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
