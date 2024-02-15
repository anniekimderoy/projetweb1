<?php 

namespace Model;

use Base\Model;

class Role extends Model {
    protected $table = "roles";

    /**
     * Récupère tous les rôles
     *
     * @return array
     */
    public function tousLesRoles() {
        $sql = "SELECT * FROM $this->table";
        $requete = $this->pdo()->prepare($sql);
        $requete->execute();

        return $requete->fetchAll();
    }
}
