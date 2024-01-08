<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
use App\routes\Router;

$router = new Router();

$router->setRoutes([
    'GET' => [
        '' => ['HomeController', 'index'],
        'home' => ['HomeController', 'index'],
        'signup' => ['UserController', 'signup'],
        'signin' => ['UserController', 'signin'],
        'logout' => ['UserController', 'logOut'],
        'admin/dashboard' => ['DashboardController', 'index'],
        'admin/users' => ['DashboardController', 'showUsers'],
        'admin/wikis' => ['DashboardController', 'showWikis'],
    ],
    
    'POST' => [
        'signup' => ['UserController', 'signup'],
        'signin' => ['UserController', 'signin'],
        // 'dashboard' => ['DashboardController', 'index'],
    ]

]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');
    $method = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($method, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;
            $controllerClass = 'App\\controller\\' . ucfirst($controllerName);
            $controller = new $controllerClass();

            if ($methodName && method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
