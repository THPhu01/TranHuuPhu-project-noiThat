<?php

namespace App\Services\ServicesInterface;

use App\ServicesWeb\UserService;

interface UserServiceInterface
{

    /**
     * User Login
     *
     * @return mixed
     */
    public function userLogin(array $param, bool $remember_me);

    /**
     * User register new account
     *
     * @return mixed
     */
    public function userRegisterAccount(array $params);

    public function userUpdateAccount(array $param , int $user): void;

    public function userChangeAccount(array $data , $user): void; 

    public function isExits(string $email);
}
