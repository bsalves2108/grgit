<?php

namespace App\Traits;

trait validate {

    public static function min(string $str, int $min)
    {
        return (strlen($str) >= $min) ? true : false;
    }

    public static function required(string $str)
    {
        return (!empty(trim($str))) ? true : false;
    }

}