<?php

namespace Model;

use Base\Model;

class Menu extends Model {
    protected $table = "plats";

    /**
    * Récupère tous les plats
    *
    * @return array|false
    */
    public function tousLesPlats() {
        $sql = "SELECT * 
                FROM plats";
        
        $requete = $this->pdo()->prepare($sql);
        $requete->execute();
        
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

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
     * Récupère les plats avec leurs sous-catégories et le sticker (s'il y en a un) spécifié par la catégorie principale
     *
     * @param int $categorie_id
     * @return array|false
     */
    public function parCategories($categorie_id) {
        $sql = "SELECT plats.*, 
                        sous_categories.nom AS sous_categorie, 
                        collants.image AS sticker
                FROM plats
                LEFT JOIN sous_categories 
                        ON plats.sous_categorie_id = sous_categories.id
                LEFT JOIN collants 
                        ON plats.collant_id = collants.id
                WHERE sous_categories.categorie_id = :categorie_id";
    
        $requete = $this->pdo()->prepare($sql);
        $requete->execute([
            ":categorie_id" => $categorie_id
        ]);
    
        return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

}