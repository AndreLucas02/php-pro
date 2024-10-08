<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit809bc5fbbb0eeafbfa31b701c02fad86
{
    public static $files = array (
        '72556e52cf5076597e65134967a4f7d1' => __DIR__ . '/../..' . '/app/helpers/constants.php',
        '1a3e8713a76412177c7230ed3ce9d402' => __DIR__ . '/../..' . '/app/router/router.php',
        '99cb5ee7dceaa1d377bae8169473c7f4' => __DIR__ . '/../..' . '/app/core/controller.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit809bc5fbbb0eeafbfa31b701c02fad86::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit809bc5fbbb0eeafbfa31b701c02fad86::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit809bc5fbbb0eeafbfa31b701c02fad86::$classMap;

        }, null, ClassLoader::class);
    }
}
