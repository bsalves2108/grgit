<?php

namespace grgit\Lib;

class Db
{

    const HOST = 'localhost';
    const DB   = 'grgit';
    const USER = 'root';
    const PASS = 'root';

    public static $instance;

    public static function getDb()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB, self::USER, self::PASS);
                self::$instance->exec("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
            } catch (\Exception $e) {
                print_r($e->getMessage());
                return false;
            }
        }
        return self::$instance;
    }

}