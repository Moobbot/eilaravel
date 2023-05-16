<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * The model instance for the repository.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new repository intance.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all entities.
     * Get all of the models form the database.
     *
     * @param array|string[] $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns); //Model::all()
    }

    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param array|string[] $columns
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns); // Model::find()
    }

    /**
     * Create a new entity.
     * Create a new model instance and store it in the database.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes); //Model::create
    }

    /**
     * Update an existing entity.
     * Update the specified model in the database.
     *
     * @param  mixed  $id
     * @param  array  $data
     * @param  string  $attribute
     * @return bool|int
     */
    public function update($id, array $data, $attribute = "id")
    {
        return $this->model->where($attribute, $id)->update($data); //Model::where('id',$id)->update($data)
    }

    /**
     * Delete an entity by ID.
     * Delete the specified model from the database.
     *
     * @param  mixed  $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->model->destroy($id); //Model::destroy($id)
    }
}
