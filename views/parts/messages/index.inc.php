<!-- MESSAGES POUR L'INSCRIPTION À L'INFOLETTRE -->
<?php if (isset($_GET["succes_inscription"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            check_circle
        </span>
        Vous êtes maintenant inscrit!
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_absentes"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Toutes les informations sont requises
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_inscription"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        L'inscription à l'infolettre à échouée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_creation_compte"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            check_circle
        </span>
        Compte créé!
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_absentes"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Toutes les informations sont requises
    </p>
<?php endif; ?>

<?php if (isset($_GET["plat_inexistant"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le plat n'existe pas...
    </p>
<?php endif; ?>

<?php if (isset($_GET["infos_invalides"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Les informations entrées sont erronées
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_deconnexion"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Déconnecté!
    </p>
<?php endif; ?>

<?php if (isset($_GET["mdp_incorrect"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le mot de passe n'a pu être confirmé
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_creation_compte"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        Le compte n'a pu être créé...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_ajout"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            check_circle
        </span>
        Item ajouté au menu!
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_ajout"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        L'item n'a pu être ajouté...
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_modification"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        La modification de l'item a échouée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_modification"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Plat modifié!
    </p>
<?php endif; ?>

<?php if (isset($_GET["echec_suppression"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        La suppression du plat a échouée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_suppression"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Plat supprimé!
    </p>
<?php endif; ?>

<?php if (isset($_GET["employe_supprime"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        Employé supprimé!
    </p>
<?php endif; ?>

<?php if (isset($_GET["erreur_suppression"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        La suppression de l'employé a échouée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["erreur_categorie"])) : ?>
    <p class="msg erreur">
        <span class="material-icons">
            info
        </span>
        La catégorie n'a pu être ajoutée...
    </p>
<?php endif; ?>

<?php if (isset($_GET["succes_categorie"])) : ?>
    <p class="msg succes">
        <span class="material-icons">
            info
        </span>
        La catégorie a été ajoutée!
    </p>
<?php endif; ?>
