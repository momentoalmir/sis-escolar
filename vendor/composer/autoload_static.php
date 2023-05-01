<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbfa127bbd4f01bab20610fba54c540d8
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Utils\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Utils\\' => 
        array (
            0 => __DIR__ . '/../..' . '/utils',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbfa127bbd4f01bab20610fba54c540d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbfa127bbd4f01bab20610fba54c540d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbfa127bbd4f01bab20610fba54c540d8::$classMap;

        }, null, ClassLoader::class);
    }
}
