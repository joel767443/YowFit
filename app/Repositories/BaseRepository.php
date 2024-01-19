<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 *  class BaseRepository
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param $column
     * @param $value
     * @return Model|null
     */
    public function findOneBy($column, $value): ?Model
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     * @param $column
     * @param $value
     * @return Collection
     */
    public function findBy($column, $value): Collection
    {
        return $this->model->where($column, $value)->get();
    }

    /**
     * @param Request|null $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request = null): LengthAwarePaginator
    {
        if ($request) {
            return $this->model::search($request->input('search'))->paginate(env('PER_PAGE'));
        }
        return $this->model::paginate(env('PER_PAGE'));
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param Model $model
     * @param array $attributes
     * @return Model
     */
    public function update(Model $model, array $attributes): Model
    {
        $model->update($attributes);
        return $model;
    }

    /**
     * @param Model $model
     * @return void
     */
    public function delete(Model $model): void
    {
        $model->delete();
    }
}
