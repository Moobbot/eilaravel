<?php

namespace App\Repositories\Users;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    //ví dụ: Lấy thông tin 10 người dùng
    public function getUsers();
}
