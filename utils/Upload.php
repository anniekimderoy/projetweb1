<?php

namespace Util;

// https://www.php.net/manual/en/features.file-upload.post-method.php

class Upload
{
    const UPLOAD_ERR_FILE_TYPE = 1000;

    // Le nom original du fichier fourni par le navigateur    
    private $nom;

    // Le type mime du fichier, si le navigateur a founi l'information. Exemple: "image/gif"     
    private $type;

    // La taille, en octets, du fichier téléversé
    private $taille;

    // Le nom temporaire du fichier lors du téléversement sur le serveur    
    private $nom_tmp;
    
    // Code d'erreur associé au téléversement
    // https://www.php.net/manual/en/features.file-upload.errors.php
    private $erreur;

    /**
     * Constructeur
     * 
     * @param string $nom La valeur de l'attribut name="" du <input type="file">
     * @param array|null $types_valides Un tableau contenant la liste d'extensions possibles. (facultatif)
     */
    public function __construct($nom, $types_valides = null)
    {

        if (!isset($_FILES[$nom])) {
            echo '<div php-debug style="color: red;">';
            echo '<strong>Erreur Upload :</strong> Aucun input de type="file" avec le name="' . $nom . '" détecté ou le form n\'a pas enctype="multipart/form-data".';
            echo "<br><br>";
            debug_print_backtrace();
            echo "</div>";
            exit();
        }

        $this->nom = $_FILES[$nom]["name"];
        $this->type = $_FILES[$nom]["type"];
        $this->taille = $_FILES[$nom]["size"];
        $this->nom_tmp = $_FILES[$nom]["tmp_name"];
        $this->erreur = $_FILES[$nom]["error"];

        if ($this->erreur == UPLOAD_ERR_OK && $types_valides != null) {
            $fichier_explose = explode(".", $this->nom);
            $extension = end($fichier_explose);
            if (in_array($extension, $types_valides) == false) {
                $this->erreur = $this::UPLOAD_ERR_FILE_TYPE;
            }
        }
    }

    /**
     * Permet de déplacer le fichier uploader dans un dossier spécifique
     * 
     * @param string $dossier Dans quel dossier déplacer le fichier. Ex: "uploads"
     * @param string $nouveau_nom Facultatif. Écrase le nom initial du fichier. Ne pas inclure l'extension. Ex: "une_image"
     * 
     * @return false|string Retourne false si le fichier n'a pu être déplacé; sinon, retourne le chemin du nouvel emplacement du fichier
     */
    public function placerDans($dossier, $nouveau_nom = null)
    {
        if ($this->estValide() == false) {
            return false;
        }

        if (is_dir($dossier) == false) {
            throw new \Exception("Le dossier '$dossier' n'existe pas.");
            return false;
        }

        if (is_writable($dossier) == false) {
            throw new \Exception("Le dossier '$dossier' n'a pas les permissions d'écriture.");
            return false;
        }

        $nom_fichier = basename($this->nom); // sécurité

        if ($nouveau_nom != null) {
            $separation_fichier = explode(".", $this->nom);
            $extension = end($separation_fichier);
            $nom_fichier = $nouveau_nom . '.' . $extension;
        }

        $cible = $dossier . "/" . $nom_fichier;

        $success = move_uploaded_file($this->nom_tmp, $cible);

        if (!$success) {
            return false;
        }

        return $cible;
    }

    /**
     * Indique si l'upload s'est bien passé
     * 
     * @return bool
     */
    public function estValide()
    {
        return $this->erreur == UPLOAD_ERR_OK;
    }

    /**
     * Retourne le message d'erreur
     * 
     * @return string|null
     */
    public function getErreur()
    {
        if ($this->erreur == UPLOAD_ERR_OK) {
            return null;
        }

        $messages = [
            UPLOAD_ERR_OK => 'Aucune erreur: le fichier a été téléversé avec succès',
            UPLOAD_ERR_INI_SIZE => 'Le fichier téléversé dépasse le taille maximale autorisée (voir upload_max_filesize dans le fichier php.ini)',
            UPLOAD_ERR_FORM_SIZE => 'Le fichier téléversé dépasse la taille maximale spécifiée dans le formulaire HTML',
            UPLOAD_ERR_PARTIAL => 'Le fichier téléversé a été partiellement reçu',
            UPLOAD_ERR_NO_FILE => 'Aucun fichier téléversé',
            UPLOAD_ERR_NO_TMP_DIR => 'Un dossier temporaire est absent',
            UPLOAD_ERR_CANT_WRITE => 'Échec de l\'écriture du fichier sur le disque',
            UPLOAD_ERR_EXTENSION => 'Une extension PHP a interrompu le téléversement',
            $this::UPLOAD_ERR_FILE_TYPE => 'Type incorrect',
        ];

        return $messages[$this->erreur];
    }
}
