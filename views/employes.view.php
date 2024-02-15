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
    <title>Pub G4 | Connexion employés</title>
</head>
<body>
    <main class="employes">
        <div class="conteneur">
            <a href="publications">Retour à la page précédente</a>
            <h1>Liste des employés</h1>
            <!-- INCLUSION DES MESSAGES -->
            <?php include("views/parts/messages/index.inc.php"); ?>
            <?php foreach ($employes as $employe) : ?>
                <?php if ($employe->role_id == 2) : ?>
                    <p><?= $employe->prenom ?> <?= $employe->nom ?></p>
                    <form action="supprimer-employe" method="POST">
                        <input type="hidden" name="utilisateur_id" value="<?= $employe->id ?>">
                        <input type="submit" value="Supprimer l'employé">
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </main>
</body>