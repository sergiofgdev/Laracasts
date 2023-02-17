<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        // add a new item (push) into routes array.
        $this->routes[] = [
            "uri" => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] == strtoupper($method)) {
                //this is the one
                return require base_path($route['controller']);
            }
        }

        //abort
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

}







// UNQUOTE LATER


//
//
//// And now we check it, array_key_exists let us check if a key exists in an array
//function routeToController($uri, $routes)
//{
//    if (array_key_exists($uri, $routes)) { //check if the url in the browser exists in the routes array
//        // Then we will call the requires directory
//        require base_path($routes[$uri]); // from array routes give me the element with that key, the key is the url, like /contact
//    } else {
//        // There isnt a url
//        abort();
//    }
//}
//

