<?php

namespace Model;

use Base\Model;

class Utilisateur extends Model {
    protected $table = "utilisateurs";

    /**
     * Ajoute un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param int $role_id
     * @param string $courriel
     * @param string $mdp
     * 
     * @return bool
     */
    public function ajouter(string $prenom, string $nom, int $role_id, string $courriel, string $mdp) {
        $sql = "INSERT INTO $this->table 
                    (prenom, nom, role_id, courriel, mot_de_passe) 
                VALUES 
                    (:prenom, :nom, :role_id, :courriel, :mot_de_passe)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":role_id" => $role_id,
            ":courriel" => $courriel,
            // Encryption du mot de passe
            ":mot_de_passe" => password_hash($mdp, PASSWORD_DEFAULT)
        ]);

    }

    /**
     * Récupère un utilisateur, s'il existe, en fonction du courriel
     *
     * @param string $courriel
     * 
     * @return object|false
     */
    public function parCourriel($courriel) {
        $sql = "SELECT id, mot_de_passe
                FROM $this->table
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":courriel" => $courriel
        ]);

        return $requete->fetch();
    }

    /**
     * Récupère tous les employés
     */
    public function tousLesEmployes() {
        $sql = "SELECT *
                FROM $this->table";
    
        $requete = $this->pdo()->prepare($sql);
    
        $requete->execute();
    
        return $requete->fetchAll();
    }

    /**
     * Supprime un employé de la base de données
     *
     * @param int $utilisateur_id
     * @return bool
     */
    public function supprimer(int $utilisateur_id) {
        $sql = "DELETE FROM $this->table 
                WHERE id = :utilisateur_id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":utilisateur_id" => $utilisateur_id
        ]);
    }
}