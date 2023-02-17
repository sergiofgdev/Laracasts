<?php

namespace Core;

use Exception;

class Container
{
    protected $bindings = []; // Associative array

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @throws Exception
     */
    public function resolve($key)
    {
        // array_key_exists -> look for this key inside bindings
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}