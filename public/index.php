<?php

// (c) 2024 Your Academy Name
// Front Controller

// 1. Bootstrap the Application
require_once '../src/core/bootstrap.php';

// 2. Load our other core files
require_once '../src/core/Router.php';

// ---- NEW ROUTING LOGIC ----
// Calculate the base path (e.g., /leanplatform)
$base_path = str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']);

// Get the request URI and remove the base path from it
$request_uri = $_SERVER['REQUEST_URI'];
$uri = str_replace($base_path, '', $request_uri);

// Remove query string from URI (e.g., ?foo=bar)
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
// Trim leading/trailing slashes
$uri = trim($uri, '/');
// ---- END NEW ROUTING LOGIC ----


// Define our application's routes
// ... inside public/index.php ...

// Define our application's routes
$routes = [
    // Home Page
    '' => 'HomeController@index',
    'home' => 'HomeController@index',

    // --- NEW DYNAMIC COURSE ROUTE ---
    'courses/{slug}' => 'CourseController@show',

    // Authentication Routes
    'register' => 'AuthController@showRegisterForm',
    'register-submit' => 'AuthController@register',
    'login' => 'AuthController@showLoginForm',
    'login-submit' => 'AuthController@login',
    'logout' => 'AuthController@logout',
];

// ...

// Load the router and direct the request
try {
    $router = new Router();
    $router->define($routes);

    // --- NEW AND CORRECTED ROUTING LOGIC ---
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    
    // Determine the final route key to look for
    $routeKey = $uri === '' ? 'home' : $uri;
    if ($requestMethod === 'POST') {
        $routeKey .= '-submit';
    }

    $router->direct($routeKey);
    // --- END CORRECTION ---

} catch (Exception $e) {
    // Simple error handling
    http_response_code(500);
    echo "<h1>An error occurred</h1>";
    echo "<p><b>Error:</b> " . $e->getMessage() . "</p>";
    echo "<p><b>File:</b> " . $e->getFile() . " on line " . $e->getLine() . "</p>";
    echo "<p><b>Clean URI for Router:</b> '" . htmlspecialchars($uri) . "'</p>";
    if (isset($routeKey)) {
         echo "<p><b>Route Key Attempted:</b> '" . htmlspecialchars($routeKey) . "'</p>";
    }
}