
<?php require_once('head.php');

$url  = explode('?',$_SERVER['REQUEST_URI']);

if(isset($url[1])){
    $input = $url[1];
}


$road_function = explode('/',$url[0]);


$pagination = intval(array_pop($road_function));


$url_current = '';

foreach ($road_function as $key => $value) {

    $url_current .= $value.'/';// code...
}

if (isset($input) && $input != NULL){
    $next = $url_current.($pagination+1).'?'.$input;
    $previous = $url_current.($pagination-1).'?'.$input;

}else{
    $next = $url_current.($pagination+1);
    $previous = $url_current.($pagination-1);
};

?>

<?php

$nb_animal              = $data['count_animals'];
$pages                  = $nb_animal/15;
$pages                  = ceil($pages);

if($pagination < 2){

    $previous_disabled  = 'disabled';
    $previous           = '';

} else {

    $previous_disabled  = " ";



};

if(($pages - $pagination) > 0){

    $next_disabled      = " ";

} else {
    $next_disabled      = 'disabled';
    $next               = '';

};

?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liste des gibbons
        </h1>
    </section>
    <div class="content-header">
        <div class="box">
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filtres</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <form class="box-body container-fluid row" method="" action="<?php echo substr($url_current, 0, -1).'/1';  ?>"></br>
                        <div class="form-group col-md-2">
                            <label for="Nom_gibbon">Nom</label>
                            <input class="form-control" type="text" name="Nom_gibbon" value="<?php echo  (isset($_GET['Nom_gibbon'])) ? $_GET['Nom_gibbon']:''; ?>" id="Nom_gibbon">
                        </div>
                        <div class="form-group col-md-2 ">
                            <label for="Sexe">Sexe</label>
                            <input class="form-control" type="text" name="Sexe" value="<?php echo  (isset($_GET['Sexe'])) ? $_GET['Sexe']:''; ?>" id="Sexe">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Annee_naissance">Annee de naissance</label>
                            <input class="form-control" type="text" name="Annee_naissance" value="<?php echo (isset($_GET['Annee_naissance'])) ? $_GET['Annee_naissance']:''; ?>" id="Annee_naissance">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Gibbon_mort">Mort</label>
                            <input class="form-control" type="text" name="Gibbon_mort" value="<?php echo (isset($_GET['Gibbon_mort'])) ? $_GET['Gibbon_mort']:''; ?>" id="Gibbon_mort">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Espece">Espece</label>
                            <input class="form-control" type="text" name="Espece" value="<?php echo (isset($_GET['Espece'])) ? $_GET['Espece']:''; ?>" id="Espece">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Ile">Ile</label>
                            <input class="form-control" type="text" name="Ile" value="<?php echo (isset($_GET['Ile'])) ? $_GET['Ile']:''; ?>" id="Ile">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="Gibbon_libere">Libéré</label>
                            <input class="form-control" type="text" name="Gibbon_libere" value="<?php echo (isset($_GET['Gibbon_libere'])) ? $_GET['Gibbon_libere']:''; ?>" id="Gibbon_libere">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="adoption">Adoption</label>
                            <input class="form-control" type="text" name="adoption" value="<?php echo (isset($_GET['adoption'])) ? $_GET['adoption']:''; ?>" id="adoption">
                        </div>
                        <div class=" form-group col-md-2">
                            <label for="site">Visible sur le site</label>
                            <input class="form-control" type="text" name="site" value="<?php echo (isset($_GET['site'])) ? $_GET['site']:''; ?>" id="site">
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                            <div class="form-group col-md-2">
                                <label style="color:white;" for="submit"> test</label>
                                <input id="submit" type="submit" class="form-control"></input>
                            </div>
                            <div class="form-group col-md-2">
                                <label style="color:white;" for="reset"> test</label>
                                <a id="reset" class=" white form-control" href="<?php $init = explode('?',$_SERVER['REQUEST_URI']); echo $init[0]; ?>">Réinitialiser</a>
                            </div>




                    </form>
                </div>


            </section>
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats</h3>
                    </div>
                </div>
                <?php echo $data["list_animal"]; ?>

                <div class="container-fluid">
                    <div class="col-sm-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class=<?php echo '"paginate_button previous '.$previous_disabled.'" '?> id="previous"><a href="<?php echo $previous ?>" aria-controls="example11" data-dt-idx="1" tabindex="11">Précédent</a></li>
                                <li class="paginate_button" aria-controls="example2" data-dt-idx="1" tabindex="2"><a href="#" ><?php echo $pagination ?></a></li>
                                <li class=<?php echo '" paginate_button next '.$next_disabled.'" '?> id="next"><a href="<?php echo $next ?>" aria-controls="example11" data-dt-idx="1" tabindex="11">Next</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dataTables_paginate paging_simple_numbers" id="paginate2">
                            <ul class="pagination">
                                <li class="paginate_button">
                                    <?php
                                    if (isset($data['page']))
                                    {
                                        echo 'Nombre de résultats : '.$nb_animal.' - Page '.$pagination.'/'.$pages ;
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php require_once('footer.php')?>
