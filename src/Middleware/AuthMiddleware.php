<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function handle($next)
    {
        if (!isset($_SESSION['user'])) {
            return "Access denied. Please login.";
        }

        return $next();
    }
}
