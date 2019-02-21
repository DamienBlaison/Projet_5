<?php  namespace Kalaweit\Manager;

/**
 * Ile manager
 *
 * @author jeromeklam
 */
class Adoption
{

    /**
     * Retourne toutes les îles
     *
     * @return array(\Kalaweit\Model\Adoption)
     */
    public function getAll()
    {
        $ret    = [];
        $config = \Kalaweit\Core\Config::getInstance();
        $iles   = $config->get('adoption');

        foreach ($iles as $key => $value) {
            $ret[] = new \Kalaweit\Model\Adoption($key, $value);

        }
        return $ret;
    }
}
