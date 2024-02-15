<?php
// Autoloading
require ("vendor/autoload.php");

// Démarrage de la session
session_start();
    
// Récupération de la route demandée
$path = $_GET["path"] ?? "index";
$path = trim($path, "/");

// Routes possibles du projet
require("routes/web.php");

// Récupération de la méthode associée à la route
if(isset($routes[$path])){
    // Récupérer le controller et la méthode associés à la route
    $controller = "Controller\\" . $routes[$path][0]; 
    $methode = $routes[$path][1];

} else {
    $controller = "Base\Controller";
    $methode = "erreur404";
    http_response_code(404);
}

// Créer l'objet du controller
$controller = new $controller;

// Appel dynamique de la méthode associée
$controller->$methode();



