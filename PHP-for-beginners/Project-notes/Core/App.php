<?php

namespace Core;

class App
{
    protected static $container;

    // Static method -> can be called without having to first instantiate an object
    public static function setContainer($container)
    {
        static::$container = $container; //initialize the container
    }

    // This method return the value of container, is like getContainer()
    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
