<?php

namespace Controller;

use Base\Controller;
use Model\Categorie;

class CategorieController extends Controller {

    /**
     * Affiche la liste des sous-catégories
     */
    public function index() {
        // Créer une instance du modèle Categorie
        $modeleCategorie = new Categorie();
        
        // Récupérer toutes les catégories
        $categories = $modeleCategorie->tousLesSousCategories();

        // Afficher la vue avec les catégories
        include("views/publications.view.php");
    }

    /**
     * Ajoute une nouvelle sous-catégorie
     */
    public function ajouter() {
        // Vérifier les données du formulaire
        if (empty($_POST["nom"]) || empty($_POST["categorie_id"])) {
            header("location: publications");
            exit();
        }

        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $categorieId = $_POST["categorie_id"];

        // Créer une instance du modèle Categorie
        $modeleCategorie = new Categorie();
        
        // Ajouter la nouvelle catégorie
        $succes = $modeleCategorie->ajouter($nom, $categorieId);

        // Redirection en cas d'échec
        if (!$succes) {
            header("location: publications?erreur_categorie=1");
            exit();
        }

        // Redirection en cas de succès
        header("location: publications?succes_categorie=1");
        exit();
    }
}
