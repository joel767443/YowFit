<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param string|null $search
     * @param int $paginateBy
     * @return LengthAwarePaginator
     */
    public function getUserList(?string $search, int $paginateBy = 10): LengthAwarePaginator
    {
        $query = $this->model->newQuery();

        if ($search) {
            $this->buildSearchConditions($query, $search);
        }

        return $query->paginate($paginateBy);
    }

    /**
     * @param $query
     * @param $search
     * @return void
     */
    private function buildSearchConditions($query, $search): void
    {
        $query->where(function (Builder $query) use ($search) {
            $query->where('name', 'like', "%$search%");
        });
    }
}
