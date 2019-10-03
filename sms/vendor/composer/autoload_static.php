<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6f7a8894d0a10e91a82f771e5b4010f
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6f7a8894d0a10e91a82f771e5b4010f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6f7a8894d0a10e91a82f771e5b4010f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}