<?php
require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Core/ErrorHandler.php';
require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Controllers/UserController.php';
require_once __DIR__ . '/../src/Core/Route.php';
require_once __DIR__ . '/../src/Core/View.php';
require_once __DIR__ . '/../src/Core/Model.php';
require_once __DIR__ . '/../src/Core/Database.php';
require_once __DIR__ . '/../src/Models/User.php';


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
