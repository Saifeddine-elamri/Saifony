<?php
spl_autoload_register(function ($class) {
    $prefix = 'App\\'; // Le namespace de vos classes
    $baseDir = __DIR__ . '/src/'; // Le répertoire où se trouvent les fichiers de vos classes

    // Vérifie si la classe appartient au namespace
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return; // Si ce n'est pas le bon namespace, on s'arrête ici
    }

    // Enlève le préfixe du namespace
    $relativeClass = substr($class, strlen($prefix));

    // Remplace les séparateurs de namespace (\) par des barres obliques (/) pour obtenir le chemin du fichier
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    // Inclut le fichier si il existe
    if (file_exists($file)) {
        require_once $file;
    }
});
