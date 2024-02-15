<!-- INCLUSION DU HEADER HTML -->
<?php include("views/parts/head.inc.php"); ?>

<!-- INCLUSION DES MESSAGES -->
<?php include("views/parts/messages/index.inc.php"); ?>

<main class="menu">
    <div class="header">
        <h2>Menu</h2>
        <div class="legende">
            <p>
                Vegan
            </p>
            <img src="public/img/icones/vege.png" alt="Icône feuilles">
        </div>
    </div>

    <?php foreach ($categories as $categorie) : ?>
        <div class="categorie-principale">
            <h3><?= $categorie['nom'] ?></h3>

            <?php foreach ($sousCategories as $sousCategorie) : ?>
                <?php if ($sousCategorie['categorie_id'] === $categorie['id']) : ?>
                    <div class="sous-categorie">
                        <h4><?= $sousCategorie['nom'] ?></h4>

                        <div class="liste-items">
                            <?php foreach ($platsParCategories[$categorie['id']] as $plat) : ?>
                                <?php if ($plat['sous_categorie_id'] === $sousCategorie['id']) : ?>
                                    <div class="item">
                                        <div class="image">
                                            <img src="<?= $plat['image'] ?>" alt="<?= $plat['nom'] ?>">
                                        </div>
                                        <div class="content">
                                            <div class="sticker">
                                                <h5>
                                                    <?= $plat['nom'] ?>
                                                    <?php if ($plat['sticker']) : ?>
                                                        <img src="<?= $plat['sticker'] ?>" alt="Végétarien">
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                            <p class="description">
                                                <?= $plat['description'] ?>
                                            </p>
                                            <p class="prix"><?= $plat['prix'] ?> $</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>


<!------------------------------- FOOTER ------------------------------->
<footer>
    <div class="colonne1">
        <a href="index"><img src="public/img/logo.png" alt="Logo Pub G4"></a>
    </div>

    <div class="colonne2">
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
        <p class="copyright">PubG4 2023 © Tous droits réservés</p>
    </div>

    <div class="colonne3">
        <p>
            <img src="public/img/icones/whitelocation.png" alt="Icone location">
            297 rue St-Georges
            Saint-Jérôme, QC
            J7Z 5A2
        </p>
        <p>
            <img src="public/img/icones/telephonefooter.png" alt="Icone telephone"> 450 436-1531
        </p>
        <p>
            <img src="public/img/icones/emailfooter.png" alt="Icone courriel"> pubg4@gmail.com
        </p>
    </div>
</footer>

</body>

</html>