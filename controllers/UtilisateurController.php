<?php

namespace Controller;

use Base\Controller;
use Model\Utilisateur;
use Model\Role;
use Util\Upload;

class UtilisateurController extends Controller {
    /**
     * Affiche la page d'accueil
     */
    public function index() {
        $facebookUrl = 'https://www.facebook.com';
        $instagramUrl = 'https://www.instagram.com';
        $twitterUrl = 'https://www.twitter.com';

        include("views/index.view.php");
    }

    /**
     * Affiche la page d'accueil contenant la connexion
     */
    public function connexion() {
        include("views/connexion.view.php");
    }

    /**
     * Affiche le formulaire de création de compte
     */
    public function creer() {
        $modeleRole = new Role;
        $roles = $modeleRole->tousLesRoles();
        include("views/compte-creer.view.php");
    }

    public function employes() {
        $modeleUtilisateur = new Utilisateur;
        $employes = $modeleUtilisateur->tousLesEmployes();
        include("views/employes.view.php");
    }

    /**
     * Traite les informations d'un nouvel utilisateur
     *
     * @return void
     */
    public function enregistrer() {
        // Validation
        if(empty($_POST["prenom"]) || 
           empty($_POST["nom"]) ||
           empty($_POST["role_id"]) ||
           empty($_POST["courriel"]) ||
           empty($_POST["mdp"]) ||
           empty($_POST["confirmer_mdp"])){
                header("location: compte-creer?infos_absentes=1");
                exit();
           }

        if($_POST["mdp"] != $_POST["confirmer_mdp"]){
            header("location: compte-creer?mdp_incorrect=1");
            exit();
        }

        // Envoyer les infos au modèle
        $modele = new Utilisateur;
        $succes = $modele->ajouter($_POST["prenom"],
                                   $_POST["nom"],
                                   $_POST["role_id"],
                                   $_POST["courriel"],
                                   $_POST["mdp"]);

        // Rediriger si succès
        if($succes){
            header("location: connexion?succes_creation_compte=1");
            exit();
        }

        // Redirection si échec
        header("location: compte-creer?echec_creation_compte=1");
        exit();
    }

    /**
     * Valide et connecte l'utilisateur
     */
    public function connecter() { 
        // Valider les paramètres POST
        if(empty($_POST["courriel"]) ||
           empty($_POST["mdp"])) {
            header("location: connexion?infos_requises=1");
            exit();
        }

        // Récupérer l'utilisateur
        $modele = new Utilisateur;
        $utilisateur = $modele->parCourriel($_POST["courriel"]);

        // Valider que l'utilisateur existe ET que son mot de passe est valide
        if(!$utilisateur || !password_verify($_POST["mdp"], $utilisateur->mot_de_passe)){
            header("location: connexion?infos_invalides=1");
            exit();
        }

        // Créer la session
        $_SESSION["utilisateur_id"] = $utilisateur->id;
        $_SESSION["est_connecte"] = true;

        // Rediriger
        header("location: publications?succes_connexion=1");
        exit();
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function deconnecter() {
        // Nettoyage des données de session
        session_unset();
        session_destroy();
    
        // Redirection vers la page d'accueil ou une autre page de votre choix
        header("location: connexion");
        exit();
    }
    
    /**
     * Supprime un utilisateur
     */
    public function supprimer() {
        if (isset($_POST['utilisateur_id'])) {
            $utilisateur_id = $_POST['utilisateur_id'];
            $modeleUtilisateur = new Utilisateur;
            $succes = $modeleUtilisateur->supprimer($utilisateur_id);
    
            if ($succes) {
                header("Location: employes?employe_supprime=1");
                exit();
            } else {
                header("Location: employes?erreur_suppression=1");
                exit();
            }
        }
    }
    
}