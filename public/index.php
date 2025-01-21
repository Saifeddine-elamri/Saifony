<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\ErrorHandler;
use App\Controllers\HomeController;
use App\Controllers\UserController;

try {
    session_start();

    $router = new Router();

    // Enregistrer automatiquement les routes à partir des contrôleurs
    $router->registerRoutesFromControllers([
        HomeController::class,
        UserController::class
    ]);

    // Page 404
    $router->setNotFound(function () {
        http_response_code(404);
        return App\Core\View::render('errors/404');
    });

    // Dispatcher
    echo $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (\Throwable $e) {
    ErrorHandler::handle($e);
}
