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

<!-- INCLUSION DES MESSAGES -->
<?php include("views/parts/messages/index.inc.php"); ?>

<main class="administration">
    <header>
        <?php if (isset($utilisateur)): ?>
            <h1><?= $utilisateur->prenom ?> <?= $utilisateur->nom ?></h1>
            <a href="deconnecter" class="btn deconnexion">Déconnexion</a>
        <?php endif; ?>
        <?php if (isset($utilisateur) && $utilisateur->role_id === "1"): ?>
            <a href="compte-creer">Créer un compte employé</a>
        <?php endif; ?>
        <?php if (isset($utilisateur) && $utilisateur->role_id === "1"): ?>
            <a href="employes">Liste d'employés</a>
        <?php endif; ?>
    </header>
    <h2>Ajouter un nouveau plat au menu</h2>
    <section class="ajout">
        <form action="publications-enregistrer" method="POST" enctype="multipart/form-data">
            <label>
                <p>Nom</p>
                <input type="text" name="nom" class="nom" value="">
            </label>
            <label>
                <p>Description</p>
                <textarea name="description" class="description"></textarea>
            </label>
            <label>
                <p>Prix</p>
                <input type="number" name="prix" step="0.01" class="prix" value=""> $
            </label>
            <label>
                <p>Image</p>
                <input type="file" name="image">
            </label>
            <label class="form-label"><p>Sous-catégorie:</p><br>
                <select class="form-select" name="sous_categorie_id">
                    <?php foreach ($sous_categories as $sous_categorie) : ?>
                        <option value="<?= $sous_categorie["id"] ?>">
                            <?= ucfirst($sous_categorie["nom"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="form-label"><p>Catégorie:</p><br>
                <select class="form-select" name="categorie_id">
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie["id"] ?>">
                            <?= ucfirst($categorie["nom"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="form-label"><p>Sticker:</p><br>
                <select class="form-select" name="collant_id">
                    <?php foreach ($collants as $collant) : ?>
                        <option value="">Aucun</option>
                        <option value="<?= $collant["id"] ?>">
                            <?= ucfirst($collant["nom"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            
            <div>
                <input type="submit" value="Ajouter le plat">
            </div>
        </form>
    </section>

    <h2>Ajouter une nouvelle catégorie au menu</h2>
    <section class="ajout_categorie">
        <form action="categorie-creer" method="POST" enctype="multipart/form-data">
            <label>
                <p>Nom</p>
                <input type="text" name="nom" class="nom" value="">
            </label>
            <label class="form-label"><p>Catégorie affiliée:</p><br>
                <select class="form-select" name="categorie_id">
                    <?php foreach ($categories as $categorie) : ?>
                        <option value="<?= $categorie["id"] ?>">
                            <?= ucfirst($categorie["nom"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            
            <div>
                <input type="submit" value="Ajouter la catégorie">
            </div>
        </form>
    </section>


    <section class="modifier">
        <h2>Modifier un plat</h2>
        <div class="liste-items">
            <?php foreach ($plats as $plat): ?>
                <div class="item">
                    <div class="image">
                        <img src="<?= $plat['image'] ?>" alt="<?= $plat['nom'] ?>">
                    </div>
                    <div class="formulaire">
                        <form action="modifier-publication" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $plat["id"] ?>" name="plat_id">
                            <label>
                                <p>Nom</p>
                                <input type="text" name="nom" class="nom" value="<?= $plat["nom"] ?>">
                            </label>
                            <label>
                                <p>Description</p>
                                <textarea name="description" class="description"><?= $plat["description"] ?></textarea>
                            </label>
                            <label>
                                <p>Prix</p>
                                <input type="number" name="prix" step="0.01" class="prix" value="<?= $plat["prix"] ?>"> $
                            </label>
                            <label>
                                <p>Image</p>
                                <input type="file" name="image">
                            </label>
                            <label class="form-label"><p>Sous-catégorie:</p><br>
                                <select class="form-select" name="sous_categorie_id">
                                    <?php foreach ($sous_categories as $sous_categorie) : ?>
                                        <option value="<?= $sous_categorie["id"] ?>" <?= ($sous_categorie["id"] == $plat["sous_categorie_id"]) ? "selected" : "" ?>>
                                            <?= ucfirst($sous_categorie["nom"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <label class="form-label"><p>Catégorie:</p><br>
                                <select class="form-select" name="categorie_id">
                                    <?php foreach ($categories as $categorie) : ?>
                                        <option value="<?= $categorie["id"] ?>" <?= ($categorie["id"] == $plat["categorie_id"]) ? "selected" : "" ?>>
                                            <?= ucfirst($categorie["nom"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <label class="form-label"><p>Sticker:</p><br>
                            <select class="form-select" name="collant_id">
                                <?php foreach ($collants as $collant) : ?>
                                    <option value="">Aucun</option>
                                    <option value="<?= $collant["id"] ?>" <?= ($collant["id"] == $plat["collant_id"]) ? "selected" : "" ?>>
                                        <?= ucfirst($collant["nom"]) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            </label>
                            
                            <div>
                                <input type="submit" value="Enregistrer les modifications" class="btn submit">
                            </div>
                        </form>
                        <form action="supprimer-publication" method="POST">
                            <input type="hidden" name="plat_id" value="<?= $plat['id'] ?>">
                            <input type="submit" value="Supprimer le plat">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


</main>
</body>
</html>
