<?php

namespace App;

class Auth
{
    public static function make($user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['authenticated'] = true;
    }

    public static function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['authenticated']);
        session_destroy();
    }
}