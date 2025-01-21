<?php
namespace App\Core;

use ReflectionClass;
use ReflectionMethod;
use App\Controllers\HomeController;
use App\Controllers\UserController;
class Router
{
    protected $routes = [];
    protected $notFoundCallback = null;


    public function add($method, $path, $handler)
    {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function registerRoutesFromControllers(array $controllers)
{
    foreach ($controllers as $controller) {
        // Créer une instance du contrôleur
        try {
            $controllerInstance = new $controller();
        } catch (\Exception $e) {
            continue; // Passer à la suivante si une erreur d'instanciation
        }

        // Utiliser Reflection pour obtenir les méthodes publiques du contrôleur
        try {
            $reflectionClass = new ReflectionClass($controllerInstance);
        } catch (\Exception $e) {
            continue; // Passer à la suivante si une erreur de réflexion
        }

        // Analyser chaque méthode du contrôleur
        foreach ($reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {

            // Vérifier si l'attribut Route est présent sur la méthode
            $attributes = $method->getAttributes(Route::class);
          
            
            foreach ($attributes as $attribute) {
                // Récupérer l'instance de l'attribut Route
                $route = $attribute->newInstance();

                // Enregistrer la route dans le routeur
                $this->add($route->method, $route->path, [$controllerInstance, $method->name]);
            }
        }
    }
}


    public function dispatch($method, $uri)
    {
        // Chercher une route correspondante à la méthode HTTP et à l'URL
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                // Appeler le contrôleur et la méthode associés
                return call_user_func($route['handler']);
            }
        }

        // Si aucune route n'est trouvée, gérer la page 404
        return $this->handleNotFound();
    }

    public function setNotFound($callback)
    {
        $this->notFoundCallback = $callback;
    }

    private function handleNotFound()
    {
        if (isset($this->notFoundCallback)) {
            return call_user_func($this->notFoundCallback);
        }

        return 'Page non trouvée.';
    }
}
