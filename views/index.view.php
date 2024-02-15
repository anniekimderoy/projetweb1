<!-- INCLUSION DU HEADER HTML -->
<?php include("views/parts/head.inc.php"); ?>

<!-- INCLUSION DES MESSAGES -->
<?php include("views/parts/messages/index.inc.php"); ?>

    <!------------------------------- MAIN ------------------------------->
    <main>
        <!------------------------------- SECTION HERO ------------------------------->
        <section class="hero">
            <p>Pub G4</p>
            <h1>Resto-bar sportif sur la Rive-Nord de Montréal</h1>
            <a href="menu">Voir le menu</a>
        </section>
        
        <!------------------------------- SECTION MENU ------------------------------->
        <section class="menu">

            <div class="entete">
                <p>Notre menu</p>
            </div>

            <div class="images-description">
                <div class="images">
                    <img src="public/img/entrees/potage_du_moment.jpg" alt="Potage du moment">
                    <img src="public/img/repas/burger.jpg" alt="Burger">
                    <img src="public/img/desserts/brownie.jpg" alt="Brownie">
                </div>
                <div class="description">
                    <p>
                        Notre menu est composé avec soin pour satisfaire les palais les plus exigeants et offrir une variété d'options alléchantes. Découvrez notre sélection de plats, préparés avec passion et expertise. 

                        Que vous optiez pour une pièce de viande juteuse ou une option végétarienne savoureuse, nos créations sont élaborées avec des ingrédients 
                        de qualité supérieure et une attention méticuleuse aux détails. Accompagnez votre plat d'un choix de délicieux accompagnements pour compléter votre repas.

                        Réservez votre table dès maintenant et préparez-vous à vivre une expérience gastronomique unique au Pub G4.
                    </p>
                </div>
            </div>

            <div class="infolettre">
                <p class="infolettre">Restez à l'affut de nos nouveaux plats!</p class="infolettre">
                <p class="infos">
                    Recevez des informations privilégiées et ne manquez aucune mise à jour de notre menu. 
                    En vous inscrivant à notre infolettre, vous serez parmi les premiers à découvrir nos nouvelles créations culinaires, 
                    nos plats saisonniers ainsi que nos événements spéciaux.
                </p>
                <div class="formulaire">
                    <form action="courriel-enregistrer" method="POST" enctype="multipart/form-data">
                        <input type="text" name="nom" placeholder="Prénom et nom">
                        <input type="email" name="courriel" placeholder="Courriel">
                        <br>
                        <input class="btn submit" type="submit" value="Je m'inscris!">
                    </form>
                </div>
            </div>
        </section>

        <!------------------------------- SECTION NOTRE HISTOIRE ------------------------------->
        <section class="histoire">
            <p class="titre">Notre histoire</p>
            <img src="public/img/bordure-droite.png" alt="Cadre" class="bordure-droite">
            <div class="histoire-image">
                <p class="description">
                    Depuis maintenant 20 ans, Pub G4 vous fait découvrir des plats de tout genre avec une touche raffinée que vous n'avez goûtée nulle part ailleurs. Venez entre amis, pour une soirée romantique ou tout simplement pour vous détendre après une longue journée. 

                    Notre équipe passionnée de chefs talentueux s'efforce de créer des plats uniques qui éveilleront vos papilles et vous laisseront des souvenirs gastronomiques inoubliables.
                    
                    Notre menu met à l'honneur des plats savoureux et inventifs, préparés avec des ingrédients frais et de qualité. Nous proposons également une variété d'options végétariennes créatives qui sauront vous surprendre.
                </p>
                <img src="public/img/biere.jpg" alt="Notre bière populaire" class="biere">
            </div>
            <img src="public/img/bordure-gauche.png" alt="Cadre" class="bordure-gauche">
        </section>

        <!------------------------------- SECTION CRITIQUES ------------------------------->
        <section class="critiques">
            <p class="titre">Critiques de nos clients</p>
            <p class="description">
                Nous travaillons fort pour offrir le meilleur service possible à notre clientèle et nous apprécions énormément les commentaires et les critiques constructives de nos clients. 
                Votre satisfaction est notre priorité absolue, et nous mettons tout en œuvre pour dépasser vos attentes à chaque visite.
            </p>
            <div class="carrousel">
                <img src="public/img/commentaires/commentaire_client_1.png" alt="Commentaire client">
            </div>
        </section>

        <!------------------------------- SECTION CONTACT ------------------------------->
        <section class="contact">
            <div class="colonne">
                <div class="heure-ouverture">
                    <p class="titre">Heures d'ouverture</p>
                        <p class="infos">
                            Dimanche au mercredi:
                            <strong>15h - 21h</strong>

                            Jeudi au samedi:
                            <strong>15h - 1h A.M.</strong>
                        </p>
                </div>

                <div class="ligne-separation"></div>

                <div class="nous-joindre">
                    <p class="titre">Nous joindre</p>
                    <p class="infos">
                        <img src="public/img/icones/telephone.png" alt="Icone telephone"> 450 436-1531
                        <img src="public/img/icones/email.png" alt="Icone courriel"> pubg4@gmail.com
                    </p>
                </div>
            </div>

            <div class="colonne adresse">
                <div class="card">
                    <p class="titre">Adresse et directions</p>
                    <div class="location">
                        <img src="public/img/icones/location.png" alt="Icone location">
                        <p class="infos">
                        297 rue St-Georges 
                        Saint-Jérôme, QC 
                        J7Z 5A2
                        </p>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.746785655144!2d-74.00559052380413!3d45.7762646710807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sen!2sca!4v1686245118886!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
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