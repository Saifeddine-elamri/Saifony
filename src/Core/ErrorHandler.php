<?php

namespace App\Core;

class ErrorHandler
{
    public static function handle(\Throwable $e)
    {
        http_response_code(500);
        if (file_exists(__DIR__ . '/../../views/errors/500.php')) {
            echo View::render('errors/500', ['error' => $e]);
        } else {
            echo "500 Internal Server Error: " . $e->getMessage();
        }
    }
}
