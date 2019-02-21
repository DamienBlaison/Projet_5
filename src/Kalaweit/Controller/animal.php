<?php
namespace Kalaweit\Controller;

class Animal{

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
            $view->assign('specie',         $specieM->getAll($bddM));

        $animal         = new \Kalaweit\Model\Animal();
        $animalM        = new \Kalaweit\Manager\Animal($bddM);

        $desc_animal = $animalM->get($animal,$id);

        return $view->render(__DIR__ . '/../Template/Animal.php', $desc_animal);

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

        $animal         = new \Kalaweit\Model\Animal();
        $animalM        = new \Kalaweit\Manager\Animal($bddM);

            $desc_animal= $animalM->add($animal);

        return $view->render(__DIR__ . '/../Template/Animal.php', $desc_animal);

    }

    public function update($id){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $animal         = new \Kalaweit\Model\Animal();

        $animalM        = new \Kalaweit\Manager\Animal($bddM);

            $animalM->update($animal);

        return $view->render(__DIR__ . '/../Template/Animal/.php');

    }

    public function get_list(){

        $list = explode('/',$_SERVER['REQUEST_URI']);
        $menu = explode('?',$list[4]);

        $param_request = $this->Get_param_request();


        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $animal         = new \Kalaweit\Model\Animal();
        $animalM        = new \Kalaweit\Manager\Animal($bddM);

        $list = $animalM->get_list($param_request);

        $request = '';

        if(isset($list[5])){
            $page = $list[5];
        }else{
            $page = 1;
        }

            $data =[
            "list_animal"      => $list["list_animal"],
            "count_animals"    => $list["count"][0],
            "page"             => $page
        ];

        $view           = new \Kalaweit\Core\View();

        return $view->render(__DIR__ . '/../Template/listAnimal.php', $data);

    }

}
