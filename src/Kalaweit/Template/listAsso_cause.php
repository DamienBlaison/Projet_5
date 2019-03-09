
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

$nb_asso_cause              = $data['count_asso_causes'];
$pages                  = $nb_asso_cause/15;
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


<div class="content-wrapper" style="min-height:2000px;">
    <div class="content-header">

        <div class="box">
            <section class="content">
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filtres</h3>
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <form class="box-body container-fluid row" method="" action="<?php echo substr($url_current, 0, -1).'/1';  ?>"></br>
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label for="ac_name">Nom</label>
                                <input class="form-control" type="text" name="ac_name" value="<?php echo (isset($_GET['ac_name'])) ? $_GET['ac_name']:''; ?>" id="ac_name">
                            </div>
                            <div class="form-group col-md-1 ">
                                <label for="actd_2">Sexe</label>
                                <input class="form-control" type="text" name="actd_2" value="<?php echo  (isset($_GET["actd_2"])) ? $_GET["actd_2"]:''; ?>" id="actd_2">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="actd_4">Naissance</label>
                                <input class="form-control" type="text" name="actd_4" value="<?php echo (isset($_GET["actd_4"])) ? $_GET["actd_4"]:''; ?>" id="actd_4">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="actd_3">Espece</label>
                                <input class="form-control" type="text" name="actd_3" value="<?php echo (isset($_GET["actd_3"])) ? $_GET["actd_3"]:''; ?>" id="actd_3">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="actd_1">Ile</label>
                                <input class="form-control" type="text" name="actd_1" value="<?php echo (isset($_GET["actd_1"])) ? $_GET["actd_1"]:''; ?>" id="actd_1">
                            </div>

                            <div class=" form-group col-md-1">
                                <label for="ac_site">Visible</label>
                                <input class="form-control" type="text" name="ac_site" value="<?php echo (isset($_GET["ac_site"])) ? $_GET["ac_site"]:''; ?>" id="ac_site">
                            </div>

                            <div class="form-group col-md-1">
                                <label style="color:white;" for="submit"> test</label>
                                <button id="submit" type="submit" class="form-control btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="form-group col-md-1">
                                <label style="color:white;" for="reset"> test</label>
                                <a id="reset" class="form-control btn btn-danger" href="<?php $init = explode('?',$_SERVER['REQUEST_URI']); echo $init[0]; ?>"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="hidden">
                            <input type="text" name="actd_8" value="<?php echo (isset($_GET["actd_8"])) ? $_GET["actd_8"]:''; ?>">
                            <input type="text" name="actd_7" value="<?php echo (isset($_GET["actd_7"])) ? $_GET["actd_7"]:''; ?>">
                            <input type="text" name="actd_9" value="<?php echo (isset($_GET["actd_9"])) ? $_GET["actd_9"]:''; ?>">
                        </div>
                    </form>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Résultats</h3>
                    </div>
                </div>
                <?php echo $data["list_asso_cause"]; ?>

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
                                        echo 'Nombre de résultats : '.$nb_asso_cause.' - Page '.$pagination.'/'.$pages ;
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


    <?php require_once('footer.php')?>
