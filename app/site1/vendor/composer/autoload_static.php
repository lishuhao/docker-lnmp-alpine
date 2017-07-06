<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71a807e5e7679cc9e756e6c6d81ded53
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit71a807e5e7679cc9e756e6c6d81ded53::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit71a807e5e7679cc9e756e6c6d81ded53::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit71a807e5e7679cc9e756e6c6d81ded53::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}