<?php
namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Specie
{

    /**
     * Retourne toutes les especes
     *
     * @return array(\Kalaweit\Model\Specie)
     */


     public function getAll(\PDO $bdd){

        $species = $bdd->query("SELECT * FROM especes_id");
        $species = $species->fetchAll(\PDO::FETCH_ASSOC);

        return $species;
     }
}
