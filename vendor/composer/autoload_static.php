<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb709e93e13b58407e73c0e534a4321cc
{
    public static $files = array (
        '7500348b1dd3cbf195d931e188afe79a' => __DIR__ . '/../..' . '/app/Helper/public.php',
        '69ad9ca0e3474f038920e2cc58adf11c' => __DIR__ . '/../..' . '/config/constants.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MA\\PHPMVC\\' => 10,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MA\\PHPMVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb709e93e13b58407e73c0e534a4321cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb709e93e13b58407e73c0e534a4321cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb709e93e13b58407e73c0e534a4321cc::$classMap;

        }, null, ClassLoader::class);
    }
}
