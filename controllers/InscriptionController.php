<?php

namespace Controller;

use Base\Controller;
use Model\Inscription;

class InscriptionController extends Controller {
    /**
     * Traite les informations d'une inscription à l'infolettre
     *
     * @return void
     */
    public function enregistrer() {
        // Validation
        if(empty($_POST["nom"]) ||
           empty($_POST["courriel"])){
                header("location: index?infos_absentes=1");
                exit();
           }

        // Envoyer les infos au modèle
        $modele = new Inscription;
        $succes = $modele->ajouter($_POST["nom"],
                                   $_POST["courriel"]);

        // Rediriger si succès
        if($succes){
            header("location: index?succes_inscription=1");
            exit();
        }

        // Redirection si échec
        header("location: index?echec_inscription=1");
        exit();
    }
}