<?php
// (c) 2024 Your Academy Name - Admin Panel

require_once __DIR__ . '/../../src/core/bootstrap.php';
use App\Models\Admin;

// Security Check
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$isLoginPage = ($uri === 'login' || $uri === 'login-submit');
if (!isset($_SESSION['admin_id']) && !$isLoginPage) {
    header('Location: /login');
    exit();
}

// Admin Routing
$routes = [
    'login' => 'Admin/AuthController@showLoginForm',
    'login-submit' => 'Admin/AuthController@login',
    'logout' => 'Admin/AuthController@logout',
    '' => 'Admin/DashboardController@index',
    'dashboard' => 'Admin/DashboardController@index',
];

try {
    $routeKey = $uri;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $uri === 'login') {
        $routeKey = 'login-submit';
    }

    if (array_key_exists($routeKey, $routes)) {
        list($controller, $method) = explode('@', $routes[$routeKey]);
        $controllerFile = __DIR__ . "/../src/controllers/{$controller}.php";
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controllerClassName = basename($controller); // <-- CRITICAL CHANGE HERE
            $controllerInstance = new $controllerClassName();
            $controllerInstance->$method();
        } else {
            throw new Exception("Admin Controller not found: {$controller}");
        }
    } else {
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>Admin Error</h1><p>" . $e->getMessage() . "</p>";
}