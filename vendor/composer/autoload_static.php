<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacd630dcb6bceeefff7188bb93dbbeed
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kint\\' => 5,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitacd630dcb6bceeefff7188bb93dbbeed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitacd630dcb6bceeefff7188bb93dbbeed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitacd630dcb6bceeefff7188bb93dbbeed::$classMap;

        }, null, ClassLoader::class);
    }
}