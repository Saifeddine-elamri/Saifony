<?php

// Ce fichier ne contient plus les informations sensibles, car elles sont extraites du fichier .env

return [
    'host' => getenv('DB_HOST'),
    'db' => getenv('DB_NAME'),
    'user' => getenv('DB_USER'),
    'pass' => getenv('DB_PASS'),
    'charset' => getenv('DB_CHARSET')
];
