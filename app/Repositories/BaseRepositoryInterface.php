<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Get all
     * @param array|string[] $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Get one
     * @param mixed $id
     * @param array|string[] $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param  mixed  $id
     * @param  array  $data
     * @param  string  $attribute
     * @return bool|int
     */
    public function update($id, array $data, $attribute = "id");

    /**
     * Delete
     * @param  mixed  $id
     * @return bool|null
     */
    public function delete($id);
}
