<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Users\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUsers()
    {
        return $this->model->select('name')->take(5)->get();
    }
}
