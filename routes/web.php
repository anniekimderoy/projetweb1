<?php

$routes = [
    // Affichage de la page d'accueil
    "index" => ["UtilisateurController", "index"],

    // Traitement de l'inscription à l'infolettre
    "courriel-enregistrer" => ["InscriptionController", "enregistrer"],

    // Affichage de la page du menu
    "menu" => ["MenuController", "menu"],

    // Affichage de la page de la liste des employés
    "employes" => ["UtilisateurController", "employes"],

    // Affichage de la page de connexion employés
    "connexion" => ["UtilisateurController", "connexion"],
        
    // Traitement de la connexion
    "connecter" => ["UtilisateurController", "connecter"],

    // Formulaire de création de compte
    "compte-creer" => ["UtilisateurController", "creer"],

    // Supprimer un compte employé
    "supprimer-employe" => ["UtilisateurController", "supprimer"],

    // Traitement de la création d'un compte
    "compte-enregistrer" => ["UtilisateurController", "enregistrer"],

    // Traitement de la déconnexion
    "deconnecter" => ["UtilisateurController", "deconnecter"],

    // Page des publications
    "publications" => ["PublicationController", "index"],

    // Formulaire de création de publication
    "publications-creer" => ["PublicationController", "creer"],

    // Traitement de la création d'une publication
    "publications-enregistrer" => ["PublicationController", "enregistrer"],

    // Modifier une publication
    "modifier-publication" => ["PublicationController", "modifier"],

    // Supprimer une publication
    "supprimer-publication" => ["PublicationController", "supprimer"],

    // Créer une nouvelle catégorie
    "categorie-creer" => ["CategorieController", "ajouter"],
];
