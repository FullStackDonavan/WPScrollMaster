<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0fd93276d74ff75e6985abf85e86bf3
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'wpsm\\Includes\\' => 14,
            'wpsm\\Frontend\\' => 14,
            'wpsm\\Api\\' => 9,
            'wpsm\\Admin\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wpsm\\Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'wpsm\\Frontend\\' => 
        array (
            0 => __DIR__ . '/../..' . '/frontend',
        ),
        'wpsm\\Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
        'wpsm\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static $classMap = array (
        'wpsm\\Api\\Api' => __DIR__ . '/../..' . '/api/Api.php',
        'wpsm\\Includes\\Admin' => __DIR__ . '/../..' . '/includes/Admin.php',
        'wpsm\\Includes\\Assets' => __DIR__ . '/../..' . '/includes/Assets.php',
        'wpsm\\Includes\\Frontend' => __DIR__ . '/../..' . '/includes/Frontend.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0fd93276d74ff75e6985abf85e86bf3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0fd93276d74ff75e6985abf85e86bf3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0fd93276d74ff75e6985abf85e86bf3::$classMap;

        }, null, ClassLoader::class);
    }
}