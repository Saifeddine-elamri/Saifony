<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class UserController
{
    /**
     * Afficher la liste de tous les utilisateurs.
     *
     * @return void
     */
    public function index()
    {
        // Récupérer tous les utilisateurs via le modèle UserModel
        $users = User::all();

        // Utiliser View::render pour afficher la vue des utilisateurs avec les données
        return View::render('user_list', ['users' => $users]);
    }
}
