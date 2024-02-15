<?php

namespace Model;
    
use Base\Model;
    
class Categorie extends Model {

    protected $table = "sous_categories";

    /**
    * Récupère tous les catégories
    *
    * @return array|false
    */
    public function tousLesCategories() {
        $sql = "SELECT * 
                FROM categories";
        
        $requete = $this->pdo()->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
    * Récupère tous les sous-catégories
    *
    * @return array|false
    */
    public function tousLesSousCategories() {
        $sql = "SELECT * 
                FROM sous_categories";
        
        $requete = $this->pdo()->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Ajoute une sous_catégorie
     *
     * @param string $nom
     * @param int $categorie_id
     * @return bool
     */
    public function ajouter($nom, $categorie_id) {
    
        $sql = "INSERT INTO $this->table (nom, categorie_id) 
                VALUES (:nom, :categorie_id)";
    
        $requete = $this->pdo()->prepare($sql);
    
        return $requete->execute([
            ":nom" => $nom,
            ":categorie_id" => $categorie_id,
        ]);
    }    
}