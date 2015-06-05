<?php
namespace Zcp;
class AutoLoader{
    protected static $suffix = '.php';
    public static function load() {
        spl_autoload_register(function ($class) {
           include  BASE_PATH.'/'.str_replace('\\', '/', $class).self::$suffix;
        });
    }
}
