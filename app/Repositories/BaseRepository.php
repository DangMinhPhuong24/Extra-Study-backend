<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
     abstract public function getFieldsSearchable();

    /**
     * Configure the Model
     *
     * @return string
     */
     abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }

    /**
     * Custom paginate
     *
     * @param $items
     * @param $perPage
     * @param $page
     * @return LengthAwarePaginator
     */
    public function customPaginate($items, $perPage, $page)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: config('constants.add.one'));
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page
        );
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }

    /**
     * Retrieve all records
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function getAllAPI()
    {
        return $this->model->all();
    }

    /**
     * Retrieve all records by DESC
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function getOrderByAPI()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    /**
     * Retrieve all records pagination(10)
     *
     * @return mixed
     */
    public function getPaginateAPI()
    {
        return $this->model->paginate(config('constants.paginate'));
    }

    /**
     * Retrieve all records by DESC and pagination(10)
     *
     * @return mixed
     */
    public function getOrderByPaginateAPI()
    {
        return $this->model->orderBy('id', 'DESC')->paginate(config('constants.paginate'));
    }

    /**
     * Retrieve all records by DESC and pagination(5)
     *
     * @return mixed
     */
    public function getOrderByPaginateFiveAPI()
    {
        return $this->model->orderBy('id', 'DESC')->paginate(5);
    }

    /**
     *Find or Fail model record for given id
     *
     * @param $id
     * @return mixed
     */
    public function findOrFailAPI($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     *Find or Fail With Trashed model record for given id
     *
     * @param $id
     * @return mixed
     */
    public function findOrFailAPIWithTrashed($id)
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * Create API model record
     *
     * @param $input
     * @return mixed
     */
    public function storeAPI($input)
    {
        return $this->model->create($input);
    }

    /**
     * Update API model record for given id
     *
     * @param $input
     * @param $id
     * @return mixed
     */
    public function updateAPI($input, $id)
    {
        $updateId = $this->model->findOrFail($id);
        $updateId->update($input);
        return $updateId;
    }

    /**
     * Delete API model record
     *
     * @param $id
     * @return mixed
     */
    public function deleteAPI($id)
    {
        $deleteId = $this->model->findOrFail($id);
        $deleteId->delete();
        return $deleteId;
    }
}
