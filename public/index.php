<?php

// (c) 2024 Your Academy Name
// Front Controller

// 1. Bootstrap the Application
require_once '../src/core/bootstrap.php';

// 2. Load our other core files
require_once '../src/core/Router.php';

// 3. Calculate the clean URI from the request
$base_path = str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']);
$request_uri = $_SERVER['REQUEST_URI'];
$uri = str_replace($base_path, '', $request_uri);

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = trim($uri, '/');

// 4. Define our application's routes
$routes = [
    // Home Page
    '' => 'HomeController@index',
    'home' => 'HomeController@index',

    // Course Page
    'courses/{slug}' => 'CourseController@show',

    // Authentication Routes
    'register' => 'AuthController@showRegisterForm',
    'register-submit' => 'AuthController@register',
    'login' => 'AuthController@showLoginForm',
    'login-submit' => 'AuthController@login',
    'logout' => 'AuthController@logout',
];

// 5. Load the router and direct the request
try {
    $router = new Router();
    $router->define($routes);

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $routeKey = $uri === '' ? 'home' : $uri;

    if ($requestMethod === 'POST') {
        $routeKey .= '-submit';
    }

    $router->direct($routeKey);

} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>An error occurred</h1>";
    echo "<p><b>Error:</b> " . $e->getMessage() . "</p>";
    echo "<p><b>File:</b> " . $e->getFile() . " on line " . $e->getLine() . "</p>";
}