<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Yish\Generators\Foundation\Service\Service;

class UserService
{
    protected $repository;

    public function check_user($user_id, $login_user)
    {
    	if ($user_id != $login_user) {
    		abort(404);
    	}
    }
}
