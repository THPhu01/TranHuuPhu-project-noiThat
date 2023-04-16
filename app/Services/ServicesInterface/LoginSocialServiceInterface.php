<?php

namespace App\Services\ServicesInterface;

interface LoginSocialServiceInterface
{

    public function loginFacebook();
    
    public function loginGoogle();
}
