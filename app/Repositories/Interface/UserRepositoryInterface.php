<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get one
     * @param string $email
     * @return bool|int
     */
    public function getUser($email);

    /**
     * Create user
     * @param array $attributes
     * @return mixed
     */
    public function createUser(array $attributes);

    /**
     * Check user login
     *
     * @param  array  $userlogin
     * @return bool|array
     */
    public function checkEmail($userlogin);
}
