<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Explicitly define the correct base path
define('BASE_PATH', '/var/www/html/php_inventory_app/app');

// Debug the path resolution
// echo "Current Directory: " . __DIR__ . "<br>";
// echo "Defined BASE_PATH: " . BASE_PATH . "<br>";

// Autoload classes dynamically
spl_autoload_register(function ($class) {
    $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';

    // Debug the path being resolved
    echo "Autoloading: $file<br>";

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Class file $file not found.<br>";
        exit;
    }
});

// Parse the requested URL
$url = $_GET['url'] ?? 'main/index'; // Default route
$urlParts = explode('/', $url);

// Extract controller, method, and optional parameter
$controllerName = ucfirst($urlParts[0]) . 'Controller';
$method = $urlParts[1] ?? 'index';
$param = $urlParts[2] ?? null;

$controllerClass = "Controllers\\$controllerName";

try {
    // Check if the controller class exists
    if (!class_exists($controllerClass)) {
        http_response_code(404);
        echo "Controller '$controllerClass' not found.";
        exit;
    }

    // Instantiate the controller
    $controller = new $controllerClass();

    // Check if the method exists in the controller
    if (!method_exists($controller, $method)) {
        http_response_code(404);
        echo "Method '$method' not found in controller '$controllerClass'.";
        exit;
    }

    // Call the method with or without parameter
    if ($param) {
        $controller->$method($param);
    } else {
        $controller->$method();
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "An internal error occurred: " . $e->getMessage();
}

