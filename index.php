<?php

// Load file rute
require 'routes.php';

// Tangkap URL dan metode HTTP
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

// Fungsi untuk mencocokkan rute berdasarkan URL dan metode HTTP
function matchRoute($url, $httpMethod, $routes)
{
    if (isset($routes[$httpMethod])) {
        foreach ($routes[$httpMethod] as $route => $handler) {
            // Ganti parameter seperti {id} dengan regex
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches); // Hapus hasil pencocokan penuh
                return ['handler' => $handler, 'params' => $matches];
            }
        }
    }
    return false;
}

// Cocokkan URL dengan rute yang telah didefinisikan berdasarkan metode HTTP
$routeMatch = matchRoute($url, $httpMethod, $routes);

if ($routeMatch) {
    $controllerName = $routeMatch['handler']['controller'];
    $methodName = $routeMatch['handler']['method'];
    $params = $routeMatch['params'];

    // Autoload file controller
    require_once "controllers/$controllerName.php";

    // Panggil controller dan method dengan parameter
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $methodName)) {
            call_user_func_array([$controller, $methodName], $params);
        } else {
            echo "Method $methodName tidak ditemukan di $controllerName.";
        }
    } else {
        echo "Controller $controllerName tidak ditemukan.";
    }
} else {
    echo "Rute tidak ditemukan untuk URL ini.";
}
