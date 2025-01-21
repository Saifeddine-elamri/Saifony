<?php

namespace App\Controllers;

use App\Core\View;

class HomeController
{
    public function index()
    {
        return View::render('home', ['message' => 'Bienvenue sur le framework !']);
    }

    public function about()
    {
        return "À propos de ce framework !";
    }

    public function contact()
    {
        return View::render('contact', [
            'email' => 'support@monframework.com',
            'phone' => '+33 6 12 34 56 78'
        ]);
    }

    public function services()
    {
        return View::render('services', [
            'services' => [
                'Développement Web',
                'Audit de Performance',
                'Consulting Technique',
                'Formation'
            ]
        ]);
    }
}
