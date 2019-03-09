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


     public function getAll()
     {
        // $ret    = [];
         $config = \Kalaweit\Core\Config::getInstance();
         $specie   = $config->get('especes');

         //foreach ($cli_lang as $key => $value) {
             //$ret[] = new \Kalaweit\Model\Cli_lang($key, $value);
            // var_dump($key);
         //}
         return $specie;

     }
}
