<?php require_once('head.php');

//var_dump($_POST);



//tab1

$cli_lastname       = new \Kalaweit\htmlElement\Form_group_input('cli_lastname','Nom',$data['cli_lastname'],'fa fa-user');
$cli_firstname      = new \Kalaweit\htmlElement\Form_group_input('cli_firstname','Prénom', $data['cli_firstname'],'fa fa-user');
$box_info_member    = new \Kalaweit\htmlElement\Box('Informations membres','box-primary',[$cli_lastname->render(),$cli_firstname->render()]);

$clic_id            = new \Kalaweit\htmlElement\Form_group_select('clic_id',$this->crm_client_category,$data['clic_id'],'fa fa-user',"clic_name");
$box_info_donator   = new \Kalaweit\htmlElement\Box('Type de donateur','box-primary',[$clic_id->render()]);

$cli_lang           = new \Kalaweit\htmlElement\Form_group_select('cli_lang',$this->cli_lang,$data['cli_lang'],'fa fa-user',"config");
$box_other_info     = new \Kalaweit\htmlElement\Box('Autres informations','box-primary',[$cli_lang->render()]);

$cli_address1       = new \Kalaweit\htmlElement\Form_group_input('cli_address1','Adresse', $data['cli_address1'],'fa fa-map-marker');
$cli_address2       = new \Kalaweit\htmlElement\Form_group_input('cli_address2','Complément adressse 1', $data['cli_address2'],'fa fa-map-marker');
$cli_address3       = new \Kalaweit\htmlElement\Form_group_input('cli_address3','Complément adressse 2', $data['cli_address3'],'fa fa-map-marker');
$cli_cp             = new \Kalaweit\htmlElement\Form_group_input('cli_cp','Code postal', $data['cli_cp'],'fa fa-map-marker');
$cli_town           = new \Kalaweit\htmlElement\Form_group_input('cli_town','Ville', $data['cli_town'],'fa fa-map-marker');
$cnty_id            = new \Kalaweit\htmlElement\Form_group_select('cnty_id',$this->crm_country,$data['cnty_id'],'fa fa-map-marker',"cnty_name");
$cli_tel1           = new \Kalaweit\htmlElement\Form_group_input('clitd_1',"Numéro de téléphone 1",$data['clitd_1'],'fa fa-phone');
$cli_tel2           = new \Kalaweit\htmlElement\Form_group_input('clitd_2','Numéro de téléphone 2', $data['clitd_2'],'fa fa-phone');
$cli_mail1          = new \Kalaweit\htmlElement\Form_group_input('clitd_3','Email 1', $data['clitd_3'],'fa fa-at');

$box_cli_data_content = [

    $cli_address1->render(),
    $cli_address2->render(),
    $cli_address3->render(),
    $cli_cp->render(),
    $cli_town->render(),
    $cnty_id->render(),
    $cli_tel1->render(),
    $cli_tel2->render(),
    $cli_mail1->render(),
];


$box_cli_data           = new \Kalaweit\htmlElement\Box('Coordonnées','box-primary',$box_cli_data_content);

$cli_comment            = new \Kalaweit\htmlElement\Form_group_textarea('clitd_4',$data['clitd_4']);

$box_cli_comment        = new \Kalaweit\htmlElement\Box('Commentaire','box-primary',[$cli_comment->render()]);


//tab 2



?>
<form class="content-wrapper row" action="" method="post" style="min-height: 1100px;">
    <div class="container-fluid">
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Informations générales</a></li>
                <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Parrainage animaux</a></li>
                <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Divers</a></li>
            </ul>
            <div class="tab-content col-md-12">
                <div class="tab-pane active" id="tab1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <?php echo $box_info_member->render() ?>
                            </div>
                            <div class="col-md-12">
                                <?php echo $box_info_donator->render() ?>
                            </div>
                            <div class="col-md-12">
                                <?php echo $box_other_info->render() ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <?php echo $box_cli_data->render() ?>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <?php echo $box_cli_comment->render() ?>
                            </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-success btn-lg">Enregistrer</button>
                        </div>
                        <div class="col-md-4">
                            <a href="http://localhost:8888/www/Kalaweit/member/add"><button type="button" class="btn btn-block btn-primary btn-lg">Nouveau</button></a>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php"><button type="button" class="btn btn-block btn-danger btn-lg">Annuler</button></a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="tab-pane" id="tab2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <?php echo 'contenu tab2' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <?php echo 'contenu tab3' ?>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>
        </div>
</form>






<?php require_once('footer.php') ?>
