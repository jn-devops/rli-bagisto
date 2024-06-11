<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dde439ffa44024bc4fd4734cd38b88d
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webkul\\Enclaves\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webkul\\Enclaves\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dde439ffa44024bc4fd4734cd38b88d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dde439ffa44024bc4fd4734cd38b88d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4dde439ffa44024bc4fd4734cd38b88d::$classMap;

        }, null, ClassLoader::class);
    }
}
