<?php

// (c) 2024 Your Academy Name
// Core Router

class Router {
    protected $routes = [];

    public function define($routes) {
        $this->routes = $routes;
    }

    public function direct($uri) {
        if (array_key_exists($uri, $this->routes)) {
            // Explode the controller and method string
            list($controller, $method) = explode('@', $this->routes[$uri]);
            
            // Now, call the method on the controller
            return $this->callAction($controller, $method);
        }

        // If the route doesn't exist, throw an error
        // In the future, we can redirect to a 404 page here.
        throw new Exception("No route defined for this URI: {$uri}");
    }

    protected function callAction($controller, $method) {
        // Include the controller file
        $controllerFile = "../src/controllers/{$controller}.php";
        if (!file_exists($controllerFile)) {
            throw new Exception("Controller not found: {$controller}.php");
        }
        require_once $controllerFile;

        // Create an instance and call the method
        $controllerInstance = new $controller();
        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("Method {$method} not defined on {$controller}.");
        }
        
        return $controllerInstance->$method();
    }
}