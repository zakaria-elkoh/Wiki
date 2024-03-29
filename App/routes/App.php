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
        'create' => ['WikiController', 'createWiki'],
        'delete' => ['WikiController', 'deleteWiki'],
        'show-wiki' => ['WikiController', 'showWiki'],
        'search' => ['WikiController', 'search'],
        'profile' => ['ProfileController', 'index'],
        'admin/dashboard' => ['DashboardController', 'index'],
        'admin/users' => ['DashboardController', 'showUsers'],
        'admin/wikis' => ['DashboardController', 'showWikis'],
        'admin/categories' => ['DashboardController', 'showCategories'],
        'admin/tags' => ['DashboardController', 'showTags'],
    ],
    
    'POST' => [
        'signup' => ['UserController', 'signup'],
        'signin' => ['UserController', 'signin'],
        'create' => ['WikiController', 'createWiki'],
        'admin/categories' => ['DashboardController', 'showCategories'],
        'admin/tags' => ['DashboardController', 'showTags'],
        'tag/update' => ['TagController', 'updateTag'],
        'category/update' => ['CategoryController', 'updateCategory'],
        'update/statu' => ['WikiController', 'updateStatu'],
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
            require_once '../../views/User/404.php';
            die;
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}

