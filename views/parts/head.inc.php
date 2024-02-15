<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Pub Saint-Jérôme - Le Pub G4</title>
</head>
<body>
    <!------------------------------- HEADER ------------------------------->
    <header>
        <div class="logo">
            <a href="index"><img src="public/img/logo.png" alt="Pub G4"></a>
        </div>
        <div class="liens">
            <a href="index">Accueil</a>
            <p class="separateur"> | </p>
            <a href="menu">Menu</a>
        </div>
        <div class="reseaux-sociaux">
            <a href="<?= $facebookUrl; ?>" target="_blank"><img src="public/img/icones/facebook.png" alt="Lien Facebook"></a>
            <a href="<?= $instagramUrl; ?>" target="_blank"><img src="public/img/icones/instagram.png" alt="Lien Instagram"></a>
            <a href="<?= $twitterUrl; ?>" target="_blank"><img src="public/img/icones/twitter.png" alt="Lien Twitter"></a>
        </div>
    </header>

    
    <script src="public/js/main.js" type="module"></script>
