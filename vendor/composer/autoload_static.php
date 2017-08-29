<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit279034159ae6a4223c698d91ae2015c0
{
    public static $files = array (
        'db55a5d2075a78823410bce38fbc4326' => __DIR__ . '/../..' . '/autoload.php',
    );

    public static $prefixesPsr0 = array (
        'x' => 
        array (
            'xrstf\\Composer52' => 
            array (
                0 => __DIR__ . '/..' . '/xrstf/composer-php52/lib',
            ),
        ),
        't' => 
        array (
            'tad_DI52_' => 
            array (
                0 => __DIR__ . '/..' . '/lucatume/di52/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit279034159ae6a4223c698d91ae2015c0::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}