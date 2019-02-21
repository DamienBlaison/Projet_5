<?php
namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Langue
{

    /**
     * Retourne toutes les langues
     *
     * @return array(\Kalaweit\Model\Langue)
     */


     public function getAll(\PDO $bdd){

        $langue = $bdd->query("SELECT * FROM lang_parle_id");

        $langue = $langue->fetchAll(\PDO::FETCH_ASSOC);

        return $langue;
     }
}
