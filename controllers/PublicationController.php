<?php

namespace Controller;

use Base\Controller;
use Model\Publication;
use Model\Utilisateur;
use Util\Upload;

class PublicationController extends Controller {

    /**
    * Affiche la page d'administration
    */
    public function index() {
        // Protection de la route /publications
        if (empty($_SESSION["utilisateur_id"])) {
            header("location: index");
            exit();
        }

        // Récupération de l'utilisateur connecté
        $utilisateur_id = $_SESSION["utilisateur_id"];
        $modeleUtilisateur = new Utilisateur();
        $utilisateur = $modeleUtilisateur->parId($utilisateur_id);

        // Récupération des publications
        $modelePublication = new Publication();
        $plats = $modelePublication->tousLesPlats();
        $sous_categories = $modelePublication->tousLesSousCategories();
        $categories = $modelePublication->tousLesCategories();
        $collants = $modelePublication->tousLesCollants();

        include("views/publications.view.php");
    }

    /**
    * Affiche le formulaire de création d'item
    */
    public function creer() {
        // Protection de la route /publications-creer
        if(empty($_SESSION["utilisateur_id"]) == true){
            header("location: index");
            exit();
        }
        
        // Récupération des catégories
        $modele = new Publication();
        $sous_categories = $modele->tousLesSousCategories();
        $categories = $modele->tousLesCategories();
        $collants = $modele->tousLesCollants();
    
        include("views/publications.view.php");
    }

    /**
     * Traite les informations d'un nouveau plat
     */
    public function enregistrer(){
        // Protection de la route /publications
        if (empty($_SESSION["utilisateur_id"]) == true) {
            header("location: index");
            exit();
        }

        // Validation des paramètres
        if (empty($_POST["nom"]) ||
            empty($_POST["description"]) ||
            empty($_POST["prix"]) ||
            empty($_FILES["image"]) ||
            empty($_POST["sous_categorie_id"]) ||
            empty($_POST["categorie_id"])
        ) {
            header("location: publications?infos_requises=1");
            exit();
        }

        // Traitement de l'image s'il y a lieu
        $image = null;
        $upload = new Upload("image", ["jpeg", "jpg", "png"]);
        if($upload->estValide()){
            $image = $upload->placerDans("uploads");
        }

        // Ajouter le plat
        $modele = new Publication;
        $succes = $modele->ajouter(
            $_POST["nom"],
            $_POST["description"],
            $_POST["prix"],
            isset($image) ? $image : null,
            $_POST["sous_categorie_id"],
            $_POST["categorie_id"],
            isset($_POST["collant_id"]) ? $_POST["collant_id"] : null
        );

        // Redirection si échec
        if (!$succes) {
            header("location: publications?echec_ajout=1");
            exit();
        }

        // Redirection si succès
        header("location: publications?succes_ajout=1");
        exit();
    }

    /**
     * Modifie un plat
     */
    public function modifier(){
        // Protection de la route
        if (empty($_SESSION["utilisateur_id"])) {
            header("location: index");
            exit();
        }

        // Vérifier si l'ID du plat à modifier est présent
        if (empty($_POST["plat_id"])) {
            header("location: publications?plat_inexistant=1");
            exit();
        }

        // Récupérer l'ID du plat à modifier
        $plat_id = $_POST["plat_id"];

        // Traitement de l'image s'il y a lieu
        $nouvelle_image = null;
        $upload = new Upload("image", ["jpeg", "jpg", "png"]);
        if ($upload->estValide()) {
            $nouvelle_image = $upload->placerDans("uploads");
        }

        // Récupérer les autres valeurs du formulaire
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $sous_categorie_id = $_POST["sous_categorie_id"];
        $categorie_id = $_POST["categorie_id"];
        $collant_id = !empty($_POST["collant_id"]) ? (int)$_POST["collant_id"] : null;

        // Modifier le plat
        $modele = new Publication();
        $succes = $modele->modifier(
            $plat_id,
            $nom,
            $description,
            $prix,
            $nouvelle_image,
            $sous_categorie_id,
            $categorie_id,
            $collant_id
        );

        // Redirection si échec
        if (!$succes) {
            header("location: publications?echec_modification=1");
            exit();
        }

        // Redirection si succès
        header("location: publications?succes_modification=1");
        exit();
    }


    /**
     * Supprime un plat
     */
    public function supprimer() {
        // Protection de la route /supprimer-publication
        if(empty($_SESSION["utilisateur_id"])) {
            header("location: index");
            exit();
        }

        // Vérifiez si l'ID du plat à supprimer est présent
        if(empty($_POST["plat_id"])) {
            header("location: publications");
            exit();
        }

        // Récupérer l'ID du plat à supprimer
        $plat_id = $_POST["plat_id"];

        // Supprimer le plat
        $modele = new Publication();
        $succes = $modele->supprimer($plat_id);

        // Redirection en cas d'échec
        if(!$succes) {
            header("location: publications?echec_suppression=1");
            exit();
        }

        // Redirection en cas de succès
        header("location: publications?succes_suppression=1");
        exit();
    }

}