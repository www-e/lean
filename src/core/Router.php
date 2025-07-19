<?php

// (c) 2024 Your Academy Name
// Core Router - Now with dynamic routing support!

class Router {
    protected $routes = [];

    public function define($routes) {
        $this->routes = $routes;
    }

    public function direct($uri) {
        // Loop through all registered routes
        foreach ($this->routes as $route => $action) {
            // Convert the route pattern to a regular expression
            // Example: 'courses/{slug}' becomes '#^courses/([^/]+)$#'
            $pattern = '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route) . '$#';

            // Check if the current URI matches the pattern
            if (preg_match($pattern, $uri, $matches)) {
                // Remove the full match from the beginning of the array
                array_shift($matches);
                
                // Explode the controller@method string
                list($controller, $method) = explode('@', $action);

                // Call the action with the captured parameters
                return $this->callAction($controller, $method, $matches);
            }
        }

        // If no route matches after the loop, throw an error
        throw new Exception("No route defined for this URI: {$uri}");
    }

    protected function callAction($controller, $method, $params = []) {
        $controllerFile = "../src/controllers/{$controller}.php";
        if (!file_exists($controllerFile)) {
            throw new Exception("Controller not found: {$controller}.php");
        }
        require_once $controllerFile;

        $controllerInstance = new $controller();
        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("Method {$method} not defined on {$controller}.");
        }
        
        // Use call_user_func_array to pass the captured slugs as arguments to the method
        return call_user_func_array([$controllerInstance, $method], $params);
    }
}