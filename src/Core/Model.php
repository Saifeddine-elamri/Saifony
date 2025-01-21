<?php

namespace App\Core;

abstract class Model
{
    protected static $table;
    protected static $primaryKey = 'id';
    protected $attributes = [];

    // Récupérer tous les enregistrements
    public static function all()
    {
        $pdo = (new Database())->getPDO();
        $stmt = $pdo->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll();
    }

    // Récupérer un enregistrement par son ID
    public static function find($id)
    {
        $pdo = (new Database())->getPDO();
        $stmt = $pdo->prepare("SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Sauvegarder l'enregistrement dans la base de données
    public function save()
    {
        $pdo = (new Database())->getPDO();
        $fields = array_keys($this->attributes);
        $values = array_values($this->attributes);

        if (isset($this->attributes[static::$primaryKey])) {
            // Mise à jour si l'ID existe
            $setPart = implode(', ', array_map(fn($field) => "$field = ?", $fields));
            $stmt = $pdo->prepare("UPDATE " . static::$table . " SET $setPart WHERE " . static::$primaryKey . " = ?");
            $values[] = $this->attributes[static::$primaryKey];
            return $stmt->execute($values);
        } else {
            // Insertion si pas d'ID
            $placeholders = implode(', ', array_fill(0, count($fields), '?'));
            $stmt = $pdo->prepare("INSERT INTO " . static::$table . " (" . implode(', ', $fields) . ") VALUES ($placeholders)");
            return $stmt->execute($values);
        }
    }

    // Supprimer l'enregistrement
    public function delete()
    {
        $pdo = (new Database())->getPDO();
        $stmt = $pdo->prepare("DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?");
        return $stmt->execute([$this->attributes[static::$primaryKey]]);
    }
}
