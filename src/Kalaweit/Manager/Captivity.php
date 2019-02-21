<?php  namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Captivity
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Kalaweit\Model\Ile)
     */
    public function getAll()
    {
        $ret    = [];
        $config = \Kalaweit\Core\Config::getInstance();
        $iles   = $config->get('captivity');

        foreach ($iles as $key => $value) {
            $ret[] = new \Kalaweit\Model\Captivity($key, $value);

        }
        return $ret;
    }
}
