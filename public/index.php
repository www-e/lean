<?php
// (c) 2024 Your Academy Name - Main Site Front Controller

require_once '../src/core/bootstrap.php';
require_once '../src/core/Router.php';

// Get the clean URI.
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Define main site routes.
$routes = [
    '' => 'HomeController@index',
    'home' => 'HomeController@index',
    'courses/{slug}' => 'CourseController@show',
    'register' => 'AuthController@showRegisterForm',
    'register-submit' => 'AuthController@register',
    'login' => 'AuthController@showLoginForm',
    'login-submit' => 'AuthController@login',
    'logout' => 'AuthController@logout',
];

// Direct the request using the main router.
try {
    $router = new Router();
    $router->define($routes);
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $routeKey = $uri;

    // This logic correctly handles form submissions for specific routes.
    if ($requestMethod === 'POST') {
        if ($routeKey === 'register') {
             $routeKey = 'register-submit';
        }
        if ($routeKey === 'login') {
             $routeKey = 'login-submit';
        }
    }
    $router->direct($routeKey);
} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>An error occurred</h1><p><b>Error:</b> " . $e->getMessage() . "</p>";
}