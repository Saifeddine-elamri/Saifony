<?php
require_once __DIR__ . '/../autoload.php'; 

use App\Core\Router;
use App\Core\ErrorHandler;

try {
    session_start();

    $router = new Router();
    $controllerDir = __DIR__ . '/../src/Controllers/';
    $controllerFiles = glob($controllerDir . '*.php'); 

    foreach ($controllerFiles as $file) {
        $className = 'App\\Controllers\\' . basename($file, '.php'); 
        if (class_exists($className)) {
            $router->registerRoutesFromControllers([$className]);
        }
    }

    $router->setNotFound(function () {
        http_response_code(404);
        return View::render('errors/404');
    });

    echo $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (\Throwable $e) {
    ErrorHandler::handle($e);
}
