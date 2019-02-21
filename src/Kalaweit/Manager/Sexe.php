<?php  namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Sexe
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Kalaweit\Model\Sexe)
     */
    public function getAll()
    {
        $ret    = [];
        $config = \Kalaweit\Core\Config::getInstance();
        $iles   = $config->get('sexe');

        foreach ($iles as $key => $value) {
            $ret[] = new \Kalaweit\Model\Sexe($key, $value);

        }
        return $ret;
    }
}
