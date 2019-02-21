<?php

namespace Kalaweit\Manager;

/**
* class des animaux
* blaison Kalaweit
*/

class Animal
{

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
                $prepare .= ' AND '.$key.' = :'.$key ;
            }
        }

        if (
            isset($param_request[1]))

            {
                $filter = (($param_request[1])-1)*12;

                $reqprep = $this->bdd->prepare("SELECT Numero_gibbon,Nom_gibbon,Sexe,Annee_naissance,Gibbon_mort,Espece,Ile,Gibbon_libere,adoption,site FROM gibbons WHERE 1=1 $prepare ORDER BY Nom_gibbon LIMIT $filter,12");
            }else{
                $reqprep = $this->bdd->prepare("SELECT Numero_gibbon,Nom_gibbon,Sexe,Annee_naissance,Gibbon_mort,Espece,Ile,Gibbon_libere,adoption,site FROM gibbons WHERE 1=1 $prepare ORDER BY Nom_gibbon LIMIT 0,12");
            }

            $count_reqprep = $this->bdd->prepare("SELECT COUNT(Numero_gibbon) FROM gibbons WHERE 1=1 $prepare ");

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

            $data_head_table = ["Id","Nom","Sexe","Naissance","Mort","Espece","Ile","Libéré","Adoption","Visible"];

            $head  = '<table id="list_animals" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
            $head .= '<thead>';
            $head .= '<tr role="row">';

            for ($i = 0; $i < count($data_head_table); $i++) {
                $head .= '<th class="" tabindex="'.$i.'" aria-controls="control'.$i.'" rowspan="1" colspan="1" aria-sort="ascending">'.$data_head_table[$i].'</th>';
            };

            $head .= '</tr>';
            $head .= '</thead>';

            $link = '/www/Kalaweit/animal/get?id=';
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
                "list_animal"   => $ob_get_clean,
                "count"        => $count_result
            ];

            return $data;

        }


    function add($animal){

        $reqprep = $this->bdd->prepare("INSERT INTO gibbons (Nom_gibbon,Sexe,Annee_naissance,Espece,Ile,Details,Photo1,Photo2,Gibbon_libere,Details_ang,Details_esp,site,adoption) VALUES ( :name, :sexe, :birth, :specie, :location, :fr_description, :photo1, :photo2, :captivity, :en_description, :sp_description, :visibility, :adoption)");

        if(isset($_POST[1])){

        $prepare = [

            ':name'             => $animal->set_name($_POST['name']),
            ':sexe'             => $animal->set_sexe($_POST['sexe']),
            ':birth'            => $animal->set_birth($_POST['birth']),
            ':specie'           => $animal->set_specie($_POST['espece']),
            ':location'         => $animal->set_location($_POST['location']),
            ':fr_description'   => $animal->set_fr_description($_POST['fr_description']),
            ':photo1'           => $animal->set_photo1($_POST['photo1']),
            ':photo2'           => $animal->set_photo2($_POST['photo2']),
            ':captivity'        => $animal->set_captivity($_POST['captivity']),
            ':en_description'   => $animal->set_en_description($_POST['en_description']),
            ':sp_description'   => $animal->set_sp_description($_POST['sp_description']),
            ':visibility'       => $animal->set_visibility($_POST['visibility']),
            ':adoption'         => $animal->set_adoption($_POST['adoption'])
        ];


        $reqprep->execute($prepare);
    }

    }

    function update($animal){

        $reqprep = $this->bdd->prepare(" UPDATE gibbons SET Nom_gibbon = :name , Sexe = :sexe , Annee_naissance = :birth , Espece = :specie , Ile = :location , Details = :fr_description, Photo1 = :photo1 , Photo2 = :photo2 , Gibbon_libere = :captivity ,Details_ang = :en_description , Details_esp = :sp_description , site = :visibility , adoption = :adoption WHERE Numero_gibbon = :id" );

        $prepare = [
            ':id'               => $animal->set_id($_GET['id']),
            ':name'             => $animal->set_name($_POST['name']),
            ':sexe'             => $animal->set_sexe($_POST['sexe']),
            ':birth'            => $animal->set_birth($_POST['birth']),
            ':specie'           => $animal->set_specie($_POST['espece']),
            ':location'         => $animal->set_location($_POST['location']),
            ':fr_description'   => $animal->set_fr_description($_POST['fr_description']),
            ':photo1'           => $animal->set_photo1($_POST['photo1']),
            ':photo2'           => $animal->set_photo2($_POST['photo2']),
            ':captivity'        => $animal->set_captivity($_POST['captivity']),
            ':en_description'   => $animal->set_en_description($_POST['en_description']),
            ':sp_description'   => $animal->set_sp_description($_POST['sp_description']),
            ':visibility'       => $animal->set_visibility($_POST['visibility']),
            ':adoption'         => $animal->set_adoption($_POST['adoption'])
        ];


        $reqprep->execute($prepare);

    }

    function get($animal,$filter){

        if(isset($_POST['name'])){
            
            $this->update($animal);
        }

        $reqprep = $this->bdd->prepare("SELECT Numero_gibbon,Nom_gibbon,Sexe,Annee_naissance,Date_mort,Gibbon_mort,Espece,Ile,Gibbon_libere,adoption,site,Details,Details_ang,Details_esp,Photo1,Photo2 FROM gibbons WHERE Numero_gibbon='$filter'");

        $reqprep->execute();

        $animal = $reqprep->fetch(\PDO::FETCH_ASSOC);

        return $animal;
    }
}
