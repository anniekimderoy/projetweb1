<?php

namespace Model;

use Base\Model;

class Publication extends Model {
    protected $table = "plats";

    /**
     * Ajoute un item
     *
     * @param string $nom
     * @param string $description
     * @param float $prix
     * @param string|null $image
     * @param int $sous_categorie_id
     * @param int $categorie_id
     * @param string|null $collant_id
     * @return bool
     */
    public function ajouter($nom, $description, $prix, $image, $sous_categorie_id, $categorie_id, $collant_id) {
        // Vérifier si l'option "Aucun" a été sélectionnée
        if ($collant_id === "") {
            $collant_id = null;
        }
    
        $sql = "INSERT INTO $this->table (nom, description, prix, image, sous_categorie_id, categorie_id, collant_id) 
                VALUES (:nom, :description, :prix, :image, :sous_categorie_id, :categorie_id, :collant_id)";
    
        $requete = $this->pdo()->prepare($sql);
    
        return $requete->execute([
            ":nom" => $nom,
            ":description" => $description,
            ":prix" => $prix,
            ":image" => $image,
            ":sous_categorie_id" => $sous_categorie_id,
            ":categorie_id" => $categorie_id,
            ":collant_id" => $collant_id
        ]);
    }    

    /**
     * Récupère tous les plats
     */
    function touslesPlats() {
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
    * Récupère tous les collants
    *
    * @return array|false
    */
    public function tousLesCollants() {
        $sql = "SELECT * 
                FROM collants";
        
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

    /**
     * Modifier un item de la base de données
     *
     * @param int $id
     * @param string $nom
     * @param string $description
     * @param float $prix
     * @param string|null $image
     * @param int $sous_categorie_id
     * @param int $categorie_id
     * @param int|null $collant_id
     * @return bool
     */
    public function modifier(int $id, string $nom, string $description, float $prix, ?string $image, int $sous_categorie_id, int $categorie_id, ?string $collant_id) {
        // Vérifier si l'option "Aucun" a été sélectionnée
        if ($collant_id === "") {
            $collant_id = null;
        }
        
        $sql = "UPDATE $this->table 
                SET nom = :nom, 
                    description = :description, 
                    prix = :prix, 
                    sous_categorie_id = :sous_categorie_id, 
                    categorie_id = :categorie_id, 
                    collant_id = :collant_id";
        
        // Ajouter la clause pour l'image si elle est définie
        if (isset($image)) {
            $sql .= ", image = :image";
        }
        
        $sql .= " WHERE id = :id";
        
        $requete = $this->pdo()->prepare($sql);
        
        $params = [
            ":id" => $id,
            ":nom" => $nom,
            ":description" => $description,
            ":prix" => $prix,
            ":sous_categorie_id" => $sous_categorie_id,
            ":categorie_id" => $categorie_id,
            ":collant_id" => $collant_id,
        ];
        
        // Ajouter le paramètre pour l'image si elle est définie
        if (isset($image)) {
            $params[":image"] = $image;
        }
        
        return $requete->execute($params);
    }
    

    /**
     * Supprime un item de la base de données
     *
     * @param int $plat_id
     * @return bool
     */
    public function supprimer(int $plat_id) {
        $sql = "DELETE FROM $this->table 
                WHERE id = :plat_id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":plat_id" => $plat_id
        ]);
    }
}