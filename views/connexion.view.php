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
    <title>Pub G4 | Employés</title>
</head>
<body>
    <main class="connexion">
        <div class="conteneur">
            <!-- INCLUSION DES MESSAGES -->
            <?php include("views/parts/messages/index.inc.php"); ?>

            <img src="public/img/logo.png" alt="Logo Pub G4">
            <h1>Connexion employés</h1>
            <section class="login">
                <form action="connecter" method="POST">
                    <input type="email" name="courriel" placeholder="Courriel" autofocus>
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input class="btn submit" type="submit" value="Envoyer">
                </form>
            </section>
        </div>
    </main>
</body>
</html>