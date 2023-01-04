<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfcb1470baccb7f2b2e75778a97882ae3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfcb1470baccb7f2b2e75778a97882ae3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfcb1470baccb7f2b2e75778a97882ae3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfcb1470baccb7f2b2e75778a97882ae3::$classMap;

        }, null, ClassLoader::class);
    }
}