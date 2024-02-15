<?php

namespace Base;

class Model
{
    private static $pdo = null;
    // La propriété $table devra être surchargée par tout modèle qui hérite de cette classe
    protected $table = null;

    /**
     * Retourne la connexion à la BDD et se connecte, au besoin
     *
     * @return PDO
     */
    protected function pdo()
    {
        if (self::$pdo == null) {
            // Paramètres de connexion
            $env = parse_ini_file(".env");         
            
            $host = $env["HOST"];
            $username = $env["USERNAME"];
            $password = $env["PASSWORD"];
            $dbname = $env["DBNAME"];

            // Options de connexion
            $options = [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
            ];

            // Connexion
            self::$pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
        }
        return self::$pdo;
    }


    public function tout() {
        $sql = "SELECT *
                FROM $this->table";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }


    public function parId(int $id){
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id";
        
        $requete = $this->pdo()->prepare($sql);

        $requete->execute([":id" => $id]);

        return $requete->fetch();        
    }
}
