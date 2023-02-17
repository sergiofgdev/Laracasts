<?php


//This only gives us the uri of urls that we control, like home, about, and contact, but what if we hace another url like /contact?=sergio, we will have a problem
//$uri = $_SERVER['REQUEST_URI'];

//To solve this problem we will save in $uri the exact uri we hare using
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// This code is not good, we can make it better
//if ($uri === '/') {
//    require 'controllers/index.php';
//} else if ($uri === '/about') {
//    require 'controllers/about.php';
//} else if ($uri === '/contact') {
//    require 'controllers/contact.php';
//}

// Making an array, or map


$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

// And now we check it, array_key_exists let us check if a key exists in an array
function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)) {
        // Then we will call the requires directory
        require $routes[$uri]; // from array routes give me the element with that key, the key is the url, like /contact
    } else {
        // There isnt a url
        abort();
    }
}

function abort()
{
    http_response_code(404);
    require 'views/404.php';
    die();
}


routeToController($uri, $routes);