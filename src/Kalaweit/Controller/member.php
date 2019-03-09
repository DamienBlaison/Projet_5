<?php
namespace Kalaweit\Controller;

class Member{

    use \Kalaweit\Transverse\Get_param_request;

    public function get($id){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $crm_countryM = new \Kalaweit\Manager\Crm_country();
        $cli_langM  = new \Kalaweit\Manager\Cli_lang();
        $crm_client_categoryM  = new \Kalaweit\Manager\Crm_client_category();

        $view           = new \Kalaweit\Core\View();

        $view->assign('crm_country',         $crm_countryM->getAll($bddM));
        $view->assign('cli_lang',          $cli_langM->getAll($bddM));
        $view->assign('crm_client_category',     $crm_client_categoryM->getAll($bddM));

        $member         = new \Kalaweit\Model\Member();
        $memberM        = new \Kalaweit\Manager\Member($bddM);

        $desc_member = $memberM->get($member,$id);

        return $view->render(__DIR__ . '/../Template/Member.php', $desc_member);

    }
    public function add(){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $crm_countryM = new \Kalaweit\Manager\Crm_country();
        $cli_langM  = new \Kalaweit\Manager\Cli_lang();
        $crm_client_categoryM  = new \Kalaweit\Manager\Crm_client_category();

        $view           = new \Kalaweit\Core\View();

        $view->assign('crm_country',         $crm_countryM->getAll($bddM));
        $view->assign('cli_lang',          $cli_langM->getAll($bddM));
        $view->assign('crm_client_category',     $crm_client_categoryM->getAll($bddM));

        $member         = new \Kalaweit\Model\Member();
        $memberM        = new \Kalaweit\Manager\Member($bddM);

            $desc_member= $memberM->add($member);

        return $view->render(__DIR__ . '/../Template/Member.php', $desc_member);

    }

    public function update($id){

        $config = \Kalaweit\Core\Config::getInstance();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $member         = new \Kalaweit\Model\Member();

        $memberM        = new \Kalaweit\Manager\Member($bddM);

            $memberM->update($member);

        return $view->render(__DIR__ . '/../Template/Member/.php');

    }

    public function get_list(){

        $list = explode('/',$_SERVER['REQUEST_URI']);
        $menu = explode('?',$list[4]);

        $param_request = $this->Get_param_request();

        $bddM = new \Kalaweit\Manager\Connexion();
        $bddM = $bddM->getBdd();

        $member         = new \Kalaweit\Model\Member();
        $memberM        = new \Kalaweit\Manager\Member($bddM);

        $list = $memberM->get_list($param_request);

        $request = '';

        if(isset($list[5])){
            $page = $list[5];
        }else{
            $page = 1;
        }

            $data =[
            "list_member"      => $list["list_member"],
            "count_members"    => $list["count"][0],
            "page"             => $page
        ];


        $view           = new \Kalaweit\Core\View();

        return $view->render(__DIR__ . '/../Template/Listmember.php', $data);

    }

}
