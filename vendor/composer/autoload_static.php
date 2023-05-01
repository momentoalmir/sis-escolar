<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2214b775c9a521935c83ecf886a28174
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Utils\\' => 6,
        ),
        'C' => 
        array (
            'Config\\' => 7,
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
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2214b775c9a521935c83ecf886a28174::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2214b775c9a521935c83ecf886a28174::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2214b775c9a521935c83ecf886a28174::$classMap;

        }, null, ClassLoader::class);
    }
}
