<?php

namespace Controller;

use Base\Controller;
use Model\Menu;

class MenuController extends Controller {
    /**
    * Affiche la page du menu
    */
    public function menu() {
        $menu = new Menu();
        $categories = $menu->tousLesCategories();
        $sousCategories = $menu->tousLesSousCategories();

        // Récupérer tous les plats pour chaque catégorie
        $platsParCategories = [];
        $platsSansSousCategorie = []; // Nouveau tableau pour stocker les plats sans sous-catégorie

        foreach ($categories as $categorie) {
            $plats = $menu->parCategories($categorie['id']);

            // Vérifier si le plat a une sous-catégorie ou non
            foreach ($plats as $plat) {
                if (empty($plat['sous_categorie_id'])) {
                    $platsSansSousCategorie[$categorie['id']][] = $plat; // Stocker les plats sans sous-catégorie
                }
            }

            $platsParCategories[$categorie['id']] = $plats;
        }

        include("views/menu.view.php");
    }
}