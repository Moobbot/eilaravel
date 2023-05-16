<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    //ví dụ: Lấy thông tin 10 người dùng
    public function getUsers();
}
