<?php

namespace App\Core;

class View
{
    public static function render($view, $data = [])
    {
        $viewPath = __DIR__ . '/../../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View {$view} not found");
        }

        // Charger les données dans le scope
        extract($data);

        // Capturer le contenu de la vue
        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        // Charger le layout principal
        ob_start();
        include __DIR__ . '/../../views/layout.php';
        return ob_get_clean();
    }
}

