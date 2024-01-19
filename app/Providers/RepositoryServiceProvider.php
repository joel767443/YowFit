<?php

namespace App\Providers;

use App\Repositories\Contracts\EatingTimeRepositoryInterface;
use App\Repositories\Contracts\ExerciseRepositoryInterface;
use App\Repositories\Contracts\ExerciseTimeRepositoryInterface;
use App\Repositories\Contracts\ExerciseTypeRepositoryInterface;
use App\Repositories\Contracts\MealTypeRepositoryInterface;
use App\Repositories\Contracts\RelaxationTimeRepositoryInterface;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\SettingRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use App\Repositories\Contracts\WeightTrackingRepositoryInterface;
use App\Repositories\Contracts\WorkTimeRepositoryInterface;
use App\Repositories\EatingTimeRepository;
use App\Repositories\ExerciseRepository;
use App\Repositories\ExerciseTimeRepository;
use App\Repositories\ExerciseTypeRepository;
use App\Repositories\MealRepository;
use App\Repositories\MealTypeRepository;
use App\Repositories\RelaxationTimeRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\SettingRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserStatusRepository;
use App\Repositories\UserTypeRepository;
use App\Repositories\WeightTrackingRepository;
use App\Repositories\WorkTimeRepository;
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
        EatingTimeRepositoryInterface::class => EatingTimeRepository::class,
        ExerciseRepositoryInterface::class => ExerciseRepository::class,
        ExerciseTimeRepositoryInterface::class => ExerciseTimeRepository::class,
        ExerciseTypeRepositoryInterface::class => ExerciseTypeRepository::class,
        MealRepositoryInterface::class => MealRepository::class,
        MealTypeRepositoryInterface::class => MealTypeRepository::class,
        RelaxationTimeRepositoryInterface::class => RelaxationTimeRepository::class,
        ScheduleRepositoryInterface::class => ScheduleRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
        UserStatusRepositoryInterface::class => UserStatusRepository::class,
        UserTypeRepositoryInterface::class => UserTypeRepository::class,
        WeightTrackingRepositoryInterface::class => WeightTrackingRepository::class,
        WorkTimeRepositoryInterface::class => WorkTimeRepository::class,
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
