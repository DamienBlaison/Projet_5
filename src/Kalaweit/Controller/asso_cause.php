<?php
namespace Kalaweit\Controller;

class asso_cause{

    use \Kalaweit\Transverse\Get_param_request;

    public function get($id){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $ilesM          = new \Kalaweit\Manager\Ile();
        $sexeM          = new \Kalaweit\Manager\Sexe();
        $captivityM     = new \Kalaweit\Manager\Captivity();
        $adoptionM      = new \Kalaweit\Manager\Adoption();
        $visibilityM    = new \Kalaweit\Manager\Visibility();
        $specieM        = new \Kalaweit\Manager\Specie();

        $view           = new \Kalaweit\Core\View();

            $view->assign('islands',        $ilesM->getAll());
            $view->assign('sexe',           $sexeM->getAll());
            $view->assign('captivity',      $captivityM->getAll());
            $view->assign('adoption',       $adoptionM->getAll());
            $view->assign('visibility',     $visibilityM->getAll());
            $view->assign('specie',        $specieM->getAll($bddM));

        $asso_cause         = new \Kalaweit\Model\Asso_cause();
        $asso_causeM        = new \Kalaweit\Manager\Asso_cause($bddM);

        $desc_asso_cause = $asso_causeM->get($asso_cause,$id);

        return $view->render(__DIR__ . '/../Template/asso_cause.php', $desc_asso_cause);

    }
    public function add(){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $ilesM          = new \Kalaweit\Manager\Ile();
        $sexeM          = new \Kalaweit\Manager\Sexe();
        $captivityM     = new \Kalaweit\Manager\Captivity();
        $adoptionM      = new \Kalaweit\Manager\Adoption();
        $visibilityM    = new \Kalaweit\Manager\Visibility();
        $specieM        = new \Kalaweit\Manager\Specie();

        $view           = new \Kalaweit\Core\View();

            $view->assign('islands',        $ilesM->getAll());
            $view->assign('sexe',           $sexeM->getAll());
            $view->assign('captivity',      $captivityM->getAll());
            $view->assign('adoption',       $adoptionM->getAll());
            $view->assign('visibility',     $visibilityM->getAll());
            $view->assign('specie',         $specieM->getAll($bddM));

        $asso_cause         = new \Kalaweit\Model\Asso_cause();
        $asso_causeM        = new \Kalaweit\Manager\Asso_cause($bddM);

            $desc_asso_cause= $asso_causeM->add($asso_cause);

        return $view->render(__DIR__ . '/../Template/asso_cause.php', $desc_asso_cause);

    }

    public function update($id){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $asso_cause         = new \Kalaweit\Model\Asso_cause();

        $asso_causeM        = new \Kalaweit\Manager\Asso_cause($bddM);

            $asso_causeM->update($asso_cause);

        return $view->render(__DIR__ . '/../Template/asso_cause/.php');

    }

    public function get_list(){

        $list = explode('/',$_SERVER['REQUEST_URI']);

        $param_request = $this->Get_param_request();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $asso_cause         = new \Kalaweit\Model\Asso_cause();
        $asso_causeM        = new \Kalaweit\Manager\Asso_cause($bddM);

        $list = $asso_causeM->get_list($param_request);

        $request = '';

        if(isset($list[5])){
            $page = $list[5];
        }else{
            $page = 1;
        }

            $data =[
            "list_asso_cause"      => $list["list_asso_cause"],
            "count_asso_causes"    => $list["count"][0],
            "page"             => $page
        ];

        $view           = new \Kalaweit\Core\View();

        return $view->render(__DIR__ . '/../Template/listasso_cause.php', $data);

    }

}
