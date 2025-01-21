<?php
namespace App\Controllers;

use App\Core\Route;
use App\Core\View;

class HomeController
{
    #[Route('GET', '/')]
    public function index()
    {
        return View::render('home', ['message' => 'Bienvenue sur le framework !']);
    }

    #[Route('GET', '/about')]
    public function about()
    {
        return "À propos de ce framework !";
    }

    #[Route('GET', '/contact')]
    public function contact()
    {
        return View::render('contact', [
            'email' => 'support@monframework.com',
            'phone' => '+33 6 12 34 56 78'
        ]);
    }

    #[Route('GET', '/services')]
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
