<?php

namespace Kalaweit\Manager;

/**

* class des animaux
* blaison Kalaweit
*/

class Asso_cause
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

        $where = '';
        $prepare = [];

        foreach ($param_request[0] as $key => $value) {

            if($value != ''){

                switch ($key) {
                        case 'ac_name':
                        $key = 'asso_cause.cau_name';
                        break;
                        case 'actd_2':
                        $key = 'P2.caud_vals';
                        break;
                        case 'actd_1':
                        $key = 'P1.caud_vals';
                        break;
                        case 'actd_4':
                        $key = 'P4.caud_vals';
                        break;
                        case 'actd_3':
                        $key = 'P3.caud_vals';
                        break;
                        case 'ac_site':
                        $key = 'asso_cause.cau_site';
                        break;
                        case 'actd_8':
                        $key = 'P8.caud_vals';
                        break;
                        case 'actd_9':
                        $key = 'P9.caud_vals';
                        break;
                        case 'actd_7':
                        $key = 'P7.caud_vals';
                        break;
                }
            }

            $where .= 'AND '.$key.' LIKE :'.strtr ($key , '.' , '_' ).' ' ;

            $prepare_loop = array(':'.strtr ($key , '.' , '_' ) => $value );

            $prepare = array_merge($prepare,$prepare_loop);

        }

        $filter = (($param_request[1])-1)*15;

        $reqprep = $this->bdd->prepare(

                "SELECT asso_cause.cau_id , asso_cause.cau_name,  P2.caud_vals as sexe,P4.caud_vals as naissance, P3.caud_vals as espece, P1.caud_vals as ile, asso_cause.cau_site

                FROM asso_cause

                LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
                LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
                LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
                LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4

                LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
                LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
                LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

                WHERE 1=1

                $where

                ORDER BY asso_cause.cau_name

                LIMIT $filter,15
                "
            );

        $count_reqprep = $this->bdd->prepare(

                " SELECT COUNT(asso_cause.cau_id)

                FROM asso_cause

                LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
                LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
                LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
                LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4

                LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
                LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
                LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

                WHERE 1=1

                $where

                "
        );

        $result         = $reqprep->execute($prepare);

        $count_result   = $count_reqprep->execute($prepare);

        $count_result   = $count_reqprep->fetch(\PDO::FETCH_NUM);


        $data_head_table = ["Id","Nom","Sexe","Naissance","Espece","Ile","Visible"];

        $head  = '<table id="list_asso_causes" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">';
        $head .= '<thead>';
        $head .= '<tr role="row">';

        for ($i = 0; $i < count($data_head_table); $i++) {
            $head .= '<th class="" tabindex="'.$i.'" aria-controls="control'.$i.'" rowspan="1" colspan="1" aria-sort="ascending">'.$data_head_table[$i].'</th>';
        };

        $head .= '</tr>';
        $head .= '</thead>';

        $link = '/www/Kalaweit/asso_cause/get?id=';
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
            "list_asso_cause"   => $ob_get_clean,
            "count"        => $count_result
        ];

        return $data;

    }

    function add(){

        if(isset($_POST['ac_name'])){

            $reqprep_asso_cause = $this->bdd->prepare(

                "INSERT INTO asso_cause

                ( cau_name, cau_site, brk_id, caut_id )

                VALUES
                ( :cau_name, :cau_site, :brk_id, :caut_id )

            ");

            $prepare = [

                    ":cau_name"=> $_POST["ac_name"],
                    ":cau_site"=> $_POST["ac_site"],
                    ":brk_id"  => "2",
                    ":caut_id" => "1"
            ];

            $reqprep_asso_cause->execute($prepare);
            $recup_id = $this->bdd->query("SELECT MAX(cau_id) FROM asso_cause");
            $recup_id = $recup_id->fetch();
            $recup_id = $recup_id[0];

            $insert_data  =[];
            $insert_media =[];

            foreach ($_POST as $key => $value) {

                $key_loop = substr($key,0,4);

                if ($key_loop == 'actd'){

                    $key_data = substr($key,5,3);

                    $insert_data_loop = ["$key_data" => $value];

                    $insert_data = array_merge($insert_data,$insert_data_loop);

                }

                if ($key_loop == 'acm_'){

                    //$key_media = substr($key,4,3);

                //    var_dump($key_media);

                //    $insert_media_loop = ["$key_media" => $value];
                    $insert_media_loop = ["$key" => $value];

                    $insert_media = array_merge($insert_media,$insert_media_loop);

                }
            }




            foreach ($insert_data as $key => $value) {

                $reqprep_asso_cause_data = $this->bdd->prepare(

                        "INSERT INTO asso_cause_data

                        ( cau_id, cautd_id, caud_vals )

                        VALUES

                        ( :cau_id, :cautd_id, :caud_vals)

                    ");

                    $prepare = [

                            ":cau_id"    => $recup_id,
                            ":cautd_id"  => $key,
                            ":caud_vals" => $value
                    ];

                    $reqprep_asso_cause_data->execute($prepare);
            }

            $media_config = new \Kalaweit\Manager\Asso_cause_media;
            $media_config = $media_config->getAll();

            foreach ($insert_media as $key => $value) {

                $reqprep_asso_cause_media = $this->bdd->prepare(

                        "INSERT INTO asso_cause_media

                        ( cau_id, caum_code, caum_type, caum_file, caum_lang )

                        VALUES

                        ( :cau_id, :caum_code, :caum_type, :caum_file, :caum_lang)

                    ");

                    $prepare_media = [

                            ":cau_id"    => $recup_id,
                            ":caum_code" => $media_config[$key]["caum_code"],
                            ":caum_type" => $media_config[$key]["caum_type"],
                            ":caum_file" => $value,
                            ":caum_lang" => $media_config[$key]["caum_lang"]
                    ];

                    $reqprep_asso_cause_media->execute($prepare_media);
            }

            $redirect = "Location: http://localhost:8888/www/Kalaweit/asso_cause/get?id=".$recup_id;

            header($redirect);
        }

    }

    function update($asso_cause){

    if(isset($_POST) and $_POST != array()){

        $reqprep = $this->bdd->prepare(

                "UPDATE

                asso_cause

                SET

                cau_name = :cau_name,
                cau_site = :cau_site

                WHERE cau_id = :cau_id

                ");
        $prepare = [
            ":cau_id"=> $_GET["id"],
            ":cau_name" => $_POST["ac_name"],
            ":cau_site" => $_POST["ac_site"]
            ];

        $reqprep->execute($prepare);

        }
            foreach ($_POST as $key => $value) {

                $key_loop = substr($key,0,4);

                if ($key_loop == 'actd'){

                    $key_data = substr($key,5,3);

                    $reqprep_data = $this->bdd->prepare(

                        "UPDATE

                        asso_cause_data

                        SET

                        caud_vals = :caud_vals

                        WHERE

                        cau_id = :cau_id AND cautd_id = $key_data
                        "

                    );

                    $prepare_data =[
                        ":cau_id" => $_GET['id'],
                        ":caud_vals" => $_POST["actd_".$key_data]
                    ];

                    $reqprep_data->execute($prepare_data);
                }

                //var_dump($_POST);

                if ($key_loop == 'acm_'){

                    $key_media = substr($key,4,1);

                    //var_dump($key_media);

                switch ($key_media) {
                        case '1':
                            $where = "caum_code = 'PHOTO1' and caum_type= 'PHOTO' and caum_lang = '__' ";
                        break;
                        case '2':
                            $where = "caum_code = 'PHOTO2' and caum_type= 'PHOTO' and caum_lang = '__' ";
                        break;
                        case '3':
                            $where = "caum_code = 'DETAIL' and caum_type= 'HTML' and caum_lang = 'FR' ";
                        break;
                        case '4':
                            $where = "caum_code = 'DETAIL' and caum_type= 'HTML' and caum_lang = 'EN' ";
                        break;
                        case '5':
                            $where = "caum_code = 'DETAIL' and caum_type= 'HTML' and caum_lang = 'ES' ";
                        break;
                    }


                    $reqprep_media = $this->bdd->prepare(

                        "UPDATE

                        asso_cause_media

                        SET

                        caum_file = :caum_file

                        WHERE

                        cau_id = :cau_id AND $where
                        "

                    );
                    $prepare_media =[

                        ":cau_id" => $_GET['id'],
                        ":caum_file" => $_POST["acm_".$key_media]
                    ];

                    $reqprep_media->execute($prepare_media);

                    }


        }

    }

    function get($asso_cause,$filter){

        if(isset($_POST)){
            $this->update($asso_cause);
        }

        $reqprep = $this->bdd->prepare(

                "SELECT

                asso_cause.cau_id,
                asso_cause.cau_name as ac_name,
                asso_cause.cau_site as ac_site,



                P1.caud_vals as actd_1,
                P2.caud_vals as actd_2,
                P3.caud_vals as actd_3,
                P4.caud_vals as actd_4,
                P7.caud_vals as actd_7,
                P8.caud_vals as actd_8,
                P9.caud_vals as actd_9,

                M1.caum_file as acm_1,
                M2.caum_file as acm_2,
                M3.caum_file as acm_3,
                M4.caum_file as acm_4,
                M5.caum_file as acm_5

                FROM asso_cause

                LEFT JOIN asso_cause_data as P1 on P1.cau_id = asso_cause.cau_id and P1.cautd_id = 1
                LEFT JOIN asso_cause_data as P2 on P2.cau_id = asso_cause.cau_id and P2.cautd_id = 2
                LEFT JOIN asso_cause_data as P3 on P3.cau_id = asso_cause.cau_id and P3.cautd_id = 3
                LEFT JOIN asso_cause_data as P4 on P4.cau_id = asso_cause.cau_id and P4.cautd_id = 4
                LEFT JOIN asso_cause_data as P7 on P7.cau_id = asso_cause.cau_id and P7.cautd_id = 7
                LEFT JOIN asso_cause_data as P8 on P8.cau_id = asso_cause.cau_id and P8.cautd_id = 8
                LEFT JOIN asso_cause_data as P9 on P9.cau_id = asso_cause.cau_id and P9.cautd_id = 9

                LEFT JOIN asso_cause_media as M1 on M1.cau_id = asso_cause.cau_id AND M1.caum_code = 'PHOTO1'
                LEFT JOIN asso_cause_media as M2 on M2.cau_id = asso_cause.cau_id AND M2.caum_code = 'PHOTO2'
                LEFT JOIN asso_cause_media as M3 on M3.cau_id = asso_cause.cau_id AND M3.caum_code = 'DETAIL' AND M3.caum_lang = 'FR'
                LEFT JOIN asso_cause_media as M4 on M4.cau_id = asso_cause.cau_id AND M4.caum_code = 'DETAIL' AND M4.caum_lang = 'EN'
                LEFT JOIN asso_cause_media as M5 on M5.cau_id = asso_cause.cau_id AND M5.caum_code = 'DETAIL' AND M5.caum_lang = 'ES'

                WHERE asso_cause.cau_id = :id
        ");

        $prepare = [":id" => $filter];

        $reqprep->execute($prepare);

        $asso_cause = $reqprep->fetch(\PDO::FETCH_ASSOC);

        return $asso_cause;
    }
}
