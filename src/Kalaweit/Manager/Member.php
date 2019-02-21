<?php

namespace Kalaweit\Manager;

/**
* class des animaux
* blaison Kalaweit
*/

class Member
{
    use \Kalaweit\Transverse\Get_param_post;
    /**
    * définition des variables de classe
    */

    private $bdd;

    /**
    * définition du constructeur
    */

    function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    /**
    * définition des getters()
    */

    public function set_bdd(PDO $bdd){
        $this->bdd = $bdd;
    }

    public function get_list($param_request){

        $prepare = '';

        foreach ($param_request[0] as $key => $value) {
            if($value != ''){
                $prepare .= ' AND '.$key.' LIKE :'.$key ;


            }
        }

        if (
            isset($param_request[1]))

            {
                $filter = (($param_request[1])-1)*15;

                $reqprep = $this->bdd->prepare("SELECT id,nom,prenom,code_postal,ville,tel1,email FROM membres WHERE 1=1 $prepare ORDER BY Nom LIMIT $filter,15");
            }else{
                $reqprep = $this->bdd->prepare("SELECT id,nom,prenom,code_postal,ville,tel1,email FROM membres WHERE 1=1 $prepare ORDER BY Nom LIMIT 0,15");
            }

            $count_reqprep = $this->bdd->prepare("SELECT COUNT(id) FROM membres WHERE 1=1 $prepare ");

            if($param_request[0] != []){

                foreach ($param_request[0] as $key => $value) {
                    if($value != ''){

                        $reqprep->bindValue(":".$key,$value);
                        $count_reqprep->bindValue(":".$key,$value);

                    }
                }
            }

            $result         = $reqprep->execute();


            $count_result   = $count_reqprep->execute();

            $count_result   = $count_reqprep->fetch(\PDO::FETCH_NUM);


            foreach ($param_request[0] as $key => $value) {
                $reqprep->bindcolumn($key,$value);
            }

            $data_head_table = ["Id","Nom","Prénom","Cp","Ville","Tel1","mail"];

            $head  = '<table id="list_membres" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
            $head .= '<thead>';
            $head .= '<tr role="row">';

            for ($i = 0; $i < count($data_head_table); $i++) {
                $head .= '<th class="" tabindex="'.$i.'" aria-controls="control'.$i.'" rowspan="1" colspan="1" aria-sort="ascending">'.$data_head_table[$i].'</th>';
            };

            $head .= '</tr>';
            $head .= '</thead>';

            $link = '/www/Kalaweit/Member/get?id=';
            $body = "";

            while($result = $reqprep->fetch(\PDO::FETCH_NUM))
            {

                $body .= '<tr role="row" class="odd">';
                for ($i=0; $i < count($result) ; $i++) {


                    $body .=    '<td><a href='.$link.$result['0'].'>'.$result[$i].'</a></td>';

                }
                $body .= '</tr>';
            };

            $body .= '</tbody>';
            $body .= '</table>';


            ob_start();

            echo $head;
            echo $body;

            $ob_get_clean = ob_get_clean();

            $data = [
                "list_member"   => $ob_get_clean,
                "count"         => $count_result
            ];

            return $data;

        }


    function add($member){

        $array_param_post = $this->Get_param_post_add();

        $into       = $array_param_post['p_into'];
        $set        = $array_param_post['p_set'];
        $prepare    = $array_param_post["p_prepare"];

        $reqprep = $this->bdd->prepare("INSERT INTO membres ($into) VALUES ($set)");

        $reqprep->execute($prepare);

        //var_dump($reqprep->errorInfo());

    }


    function update($member){

        $array_param_post = $this->Get_param_post();

        $reqprep = $this->bdd->prepare("UPDATE membres SET $array_param_post[0] WHERE id = :id");
        $prepare = $array_param_post[1];
        $reqprep->execute($prepare);

        //var_dump($reqprep->errorInfo());

    }


    function get($member,$filter){


        if(isset($_POST['nom']) && (isset($_GET['id']) && $_GET['id'] == '')){

            $this->add($member);
        }

        if(isset($_POST['nom'])){$this->update($member);}

        $reqprep = $this->bdd->prepare("SELECT * FROM membres WHERE id = :id ");
        $prepare = [':id' => $filter ];
        $reqprep->execute($prepare);
        $member = $reqprep->fetch(\PDO::FETCH_ASSOC);
        return $member;

    }
}
