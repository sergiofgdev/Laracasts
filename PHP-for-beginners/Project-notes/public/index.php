<?php
const BASE_PATH = __DIR__ . '/../'; //__DIR__  is the current directory

require BASE_PATH . 'Core/functions.php'; //We cant use base_path function in this because that function exists in functions.php

// Let us declare manually how we want to go about importing classes that have not been required
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // this allow us to change Core\Database to Core/Database
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; //$uri the exact url we hare using
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //ternary -> if true, do asked, if not do the other thing
$router->route($uri, $method);

