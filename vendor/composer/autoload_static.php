<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdba46605e8acfad5622d0e03e25d391a
{
    public static $prefixLengthsPsr4 = array (
        'g' => 
        array (
            'grgit\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'grgit\\' => 
        array (
            0 => __DIR__ . '/..' . '/grgit',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdba46605e8acfad5622d0e03e25d391a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdba46605e8acfad5622d0e03e25d391a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}