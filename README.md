# CADRICIEL PWA
## Comment utiliser ce cadriciel:
### 1
- Effacez la vue `views/index.view.php`
- Changez les paramètres de connexion à la BDD dans le fichier `.env`
### 2
- Effacez la route présente par défaut.
- Ajoutez les routes du projet dans le fichier `routes/web.php`: vous devrez associer une route à un tableau contenant le controller et la méthode
- Ex., `"index" => ["SiteController", "index"]`
### 3
- Ajoutez les contrôleurs nécessaires dans le dossier `/controllers`
- Effacez le contrôleur `DefautController`
- Chaque controller doit appartenir au *namespace* `Controller` et hérité de `Base\Controller`
### 4
- Ajoutez les modèles nécessaires au projet dans le dossier `/models`.
- Chaque modèle doit appartenir au *namespace* `Model` et hérité de `Base\Model`
- Chaque modèle doit préciser sa table associée avec la propriété `protected $table = "nom_table";"`
"# projetweb1" 
