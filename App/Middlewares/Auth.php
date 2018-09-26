<?php

namespace App\Middlewares;

use grgit\Lib\Db;
use grgit\Lib\Middleware;

class Auth extends Middleware
{
    public static function isAuth()
    {
        return (!empty($_SESSION['authenticated'])) ? true : false;
    }

    public static function validRequest()
    {
        if((getallheaders()['X-Requested-With']) == 'XMLHttpRequest') {
            if(getallheaders()['Authorization'] == session_id()) {
                return true;
            }
        }
        return false;
    }

    public static function isAdmin()
    {
        return ($_SESSION['user']['level'] == 'admin') ? true : false;
    }

    public function run()
    {
        return $this->isAuth();
    }

}