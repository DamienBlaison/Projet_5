<?php
namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Type_membre
{

    /**
     * Retourne toutes les langues
     *
     * @return array(\Kalaweit\Model\Type_membre)
     */


     public function getAll(\PDO $bdd){

        $Type = $bdd->query("SELECT * FROM type_membre_id");

        $Type = $Type->fetchAll(\PDO::FETCH_ASSOC);

        return $Type;
     }
}
