<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dfffa540f1d920fa95b0a3e6974625d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Calendar\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Calendar\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/../..' . '/test',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dfffa540f1d920fa95b0a3e6974625d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dfffa540f1d920fa95b0a3e6974625d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
