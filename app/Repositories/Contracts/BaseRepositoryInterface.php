<?php

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 *  class BaseRepository
 */
interface BaseRepositoryInterface
{
    /**
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model;

    /**
     * @param $column
     * @param $value
     * @return Model|null
     */
    public function findOneBy($column, $value): ?Model;

    /**
     * @param $column
     * @param $value
     * @return Collection
     */
    public function findBy($column, $value): Collection;

    /**
     * @param Request|null $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request = null): LengthAwarePaginator;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param Model $model
     * @param array $attributes
     * @return Model
     */
    public function update(Model $model, array $attributes): Model;

    /**
     * @param Model $model
     * @return void
     */
    public function delete(Model $model): void;
}
