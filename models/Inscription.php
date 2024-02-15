<?php

namespace Model;

use Base\Model;

class Inscription extends Model {
    protected $table = "inscriptions";

    /**
     * Ajoute le courriel des gens qui s'inscrivent à l'infolettre
     *
     * @param string $nom
     * @param string $courriel
     * 
     * @return bool
     */
    public function ajouter(string $nom, string $courriel) {
        $sql = "INSERT INTO $this->table 
                    (nom, courriel) 
                VALUES 
                    (:nom, :courriel)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":courriel" => $courriel
        ]);

    }
}