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
    <main class="compte">
        <div class="conteneur">
            <h1>Créer un compte employé</h1>
            <a href="publications">Retour à la page précédente</a>
                
            <!-- INCLUSION DES MESSAGES -->
            <?php include("views/parts/messages/index.inc.php"); ?>

            <section>
                <form action="compte-enregistrer" method="POST" enctype="multipart/form-data">

                    <input type="text" name="prenom" placeholder="Prénom" autofocus>
                    <input type="text" name="nom" placeholder="Nom">
                    <select class="form-select" name="role_id" placeholder="Rôle">
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role->id ?>">
                                <?= ucfirst($role->nom) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="email" name="courriel" placeholder="Courriel">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                    <input type="password" name="confirmer_mdp" placeholder="Confirmer le mot de passe">
                    <input class="btn submit" type="submit" value="Créer!">
                </form>
                <a href="connexion">Connexion</a>
            </section>
        </div>
    </main>
</body>