<?php
namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Country
{

    /**
     * Retourne tous les pays
     *
     * @return array(\Kalaweit\Model\country)
     */


     public function getAll(\PDO $bdd){

        $country = $bdd->query("SELECT * FROM pays_id");

        $country  = $country ->fetchAll(\PDO::FETCH_ASSOC);

        return $country ;
     }
}
