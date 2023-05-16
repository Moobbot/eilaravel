<?php

namespace App\Repositories\Repository;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        // Call __construct in BaseRepository
        parent::__construct($user);
    }

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUserById($id)
    {
        return User::where('id', $id)->get();
    }

    public function getUsers()
    {
        return $this->model->select('name')->take(5)->get();
    }
}
