<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    // Nom de la table dans la base de données
    protected static $table = 'users';
    // Clé primaire de la table
    protected static $primaryKey = 'id';

    // Attributs (colonnes de la table) de l'utilisateur
    public $attributes = [
        'id' => null,
        'name' => '',
        'email' => '',
    ];

    /**
     * Trouver un utilisateur par son email.
     *
     * @param string $email
     * @return array|false
     */
    public static function findByEmail($email)
    {
        $pdo = (new \App\Core\Database())->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM " . static::$table . " WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

   

    /**
     * Créer un nouvel utilisateur dans la base de données.
     *
     * @param array $data
     * @return bool
     */
    public function createUser(array $data)
    {
        // Hashage du mot de passe avant de l'enregistrer

        $this->attributes = $data;
        return $this->save();
    }

    /**
     * Mettre à jour les informations de l'utilisateur.
     *
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data)
    {
        $this->attributes = $data;
        return $this->save();
    }

    /**
     * Supprimer un utilisateur de la base de données.
     *
     * @return bool
     */
    public function deleteUser()
    {
        return $this->delete();
    }
}
