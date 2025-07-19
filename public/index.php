<?php

// (c) 2024 Your Academy Name
// Front Controller

// 1. Bootstrap the Application (Loads Composer, Boots Eloquent)
require_once '../src/core/bootstrap.php';

// 2. Load our other core files
require_once '../src/core/Router.php';

// Get the requested URI
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Define our application's routes
$routes = [
    '' => 'HomeController@index',
    'home' => 'HomeController@index'
];

// Load the router and direct the request
try {
    $router = new Router();
    $router->define($routes);
    $router->direct($uri === '' ? 'home' : $uri);
} catch (Exception $e) {
    // Simple error handling
    http_response_code(500); // Internal Server Error is more appropriate now
    echo "<h1>An error occurred</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . " on line " . $e->getLine() . "</p>";
}