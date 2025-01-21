<?php

namespace App\Core;

use PDO;
use PDOException;
use Exception; // Ajout de l'import de la classe Exception
use Dotenv\Dotenv; // Ajout de l'import pour utiliser Dotenv

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    public function __construct()
    {
        // Charger les variables d'environnement
      
        $this->host = 'localhost';
        $this->db = 'example_db';
        $this->user = 'root';
        $this->pass = 'saif';
    

        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new Exception('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
