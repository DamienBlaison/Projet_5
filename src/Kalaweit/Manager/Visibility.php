<?php  namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Visibility
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Kalaweit\Model\Vidsibility)
     */
    public function getAll()
    {
        $ret    = [];
        $config = \Kalaweit\Core\Config::getInstance();
        $iles   = $config->get('visibility');

        foreach ($iles as $key => $value) {
            $ret[] = new \Kalaweit\Model\Visibility($key, $value);

        }
        return $ret;
    }
}
