<?php
namespace App\Controllers;

use App\Core\Route;
use App\Core\View;
use App\Models\User;

class UserController
{
    #[Route('GET', '/users')]
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return View::render('user_list', ['users' => $users]);
    }

    #[Route('GET', '/users/create')]
    public function create()
    {
        return View::render('user_form'); // Formulaire d'ajout d'utilisateur
    }

    #[Route('POST', '/users/store')]
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;

            if (empty($name) || empty($email)) {
                return View::render('user_form', [
                    'error' => 'Veuillez remplir tous les champs.'
                ]);
            }

            $user = new User();
            $user->attributes = [
                'name' => $name,
                'email' => $email
            ];

            if ($user->save()) {
                return View::render('user_form', [
                    'success' => 'Utilisateur créé avec succès !'
                ]);
            } else {
                return View::render('user_form', [
                    'error' => 'Une erreur est survenue lors de l’enregistrement.'
                ]);
            }
        }
    }
}
