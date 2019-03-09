<?php require_once('head.php') ?>

<?php
//echo'<pre>';
//var_dump($this);
//var_dump($_POST);
//echo'</pre>';
?>

<?php

?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#asso_cause" data-toggle="tab" aria-expanded="true">Détails animal</a></li>
                    <li class=""><a href="#parrains" data-toggle="tab" aria-expanded="false">Parrains</a></li>
                    <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Divers</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="asso_cause">
                        <form  action="" method="POST"class="">
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Informations animal</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control" name="ac_name" placeholder="Nom" value="<?php echo $data['ac_name'] ?>">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label>Sexe</label>
                                                    <select name="actd_2"class="form-control" data-placeholder="Choisir sexe de l'asso_cause" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                        foreach ($this->sexe as $key => $sexe) {

                                                            if($data['sexe'] == $sexe->getId()){
                                                                $selected = "selected";
                                                            } else { $selected = '';}

                                                            echo '<option value="' . $sexe->getId() . '"'.$selected. '>' . $sexe->getName().'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <span class="col-md-6" style="padding-left:0px;">
                                                        <label>Naissance</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" name="actd_4"class="form-control" data-inputmask="'alias': 'yyyy'" data-mask="yyyy" placeholder="yyyy" maxlength="4" value="<?php echo $data['actd_4'] ?>">
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <span class="col-md-6" style="padding-right:0px;">
                                                        <label>Mort</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" name="actd_7"class="form-control" data-inputmask="'alias': 'yyyy'" data-mask="yyyy" placeholder="yyyy" maxlength="4" value="<?php echo $data['actd_7'] ?>">
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <span class="col-md-12" style="padding-left:0px;padding-right:0px;">
                                                        <label>Espèce</label>
                                                        <select name="actd_3"class="form-control" data-placeholder="Choisir espce de l'asso_cause" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                            <?php
                                                            foreach ($this->specie as $key => $specie) {
                                                                if($data['actd_3'] == $specie["id_espece"]){
                                                                    $current_specie = "selected";
                                                                } else { $current_specie = '';
                                                                }
                                                                echo '<option value="'.$specie["id_espece"].'"'.$current_specie.'>'.$specie["nom_francais"].' ('.$specie["nom_latin"].')</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </span>
                                                </br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="alert" role="alert" style="background-color:#3c8dbc;color:white;">
                                        <h4 class="alert-heading">Information !</h4>
                                        <p>Pour optimiser la diffusion de vos photos sur le site internet, veuillez suivre ces quelques recommandations :
                                            <ul>
                                                <li> Format : Veuillez utiliser les formats .jpg ou .jpeg </li>
                                                <li> Dimensions : Les images doivent faire 1000px de largeur maximum </li>
                                                <li> Poids : Les images doivent peser aux alentours de 300ko </li>
                                            </ul>
                                        </p>
                                        <p class="mb-0">Compresser vos images à l'aide de ce logiciel simple d'utilisation</p>
                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Photos</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <input type="text" value="<?php echo $data['acm_1'] ?>" name="acm_1" class="form-control" placeholder="Image 1">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" value="<?php echo $data['acm_2'] ?>" name="acm_2" class="form-control" placeholder="Image 2">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Autres infos</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Localisation</label>
                                                    <select name="actd_1" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                        foreach ($this->islands as $key => $island) {

                                                            if($data['actd_1'] == $island->getId()){
                                                                $current_location = "selected";
                                                            } else { $current_location = '';
                                                            }
                                                            echo '<option value="' . $island->getId() . '" '.$current_location.'>' . $island->getName() . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>En captivité</label>
                                                    <select name="actd_9" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                        foreach ($this->captivity as $key => $captivity) {
                                                            if($data['actd_9'] == $captivity->getId()){
                                                                $current_captivity = "selected";
                                                            } else { $current_captivity = '';}

                                                            echo '<option value="' . $captivity->getId() . '"'.$current_captivity.'>' . $captivity->getName() . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Adoption</label>
                                                    <select name="actd_8" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                        foreach ($this->adoption as $key => $adoption) {
                                                            if($data['actd_8'] == $adoption->getId()){
                                                                $current_adoption = "selected";
                                                            } else { $current_adoption = '';}
                                                            echo '<option value="' . $adoption->getId() . '"'.$current_adoption.'>' . $adoption->getName() . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Site</label>
                                                    <select name="ac_site" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                        foreach ($this->visibility as $key => $visibility) {

                                                            if($data['ac_site'] == $visibility->getId()){
                                                                $current_visibility = "selected";
                                                            } else { $current_visibility = '';}

                                                            echo '<option value="' . $visibility->getId() . '"'.$current_visibility.'>' . $visibility->getName() . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Description en français</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body pad">
                                            <textarea class="mytextarea" name="acm_3" rows="8" cols="80"><?php echo $data['acm_3'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Description en anglais</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body pad">
                                            <textarea class="mytextarea" name="acm_4" rows="8" cols="80"><?php echo $data['acm_4'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Description en espagnol</h3>
                                            <div class="pull-right box-tools">
                                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body pad">

                                            <textarea class="mytextarea"name="acm_5" rows="8" cols="80"><?php echo $data['acm_5'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success btn-lg">Enregistrer</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/www/Kalaweit/asso_cause/add"><button type="button" class="btn btn-block btn-primary btn-lg">Nouveau</button></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="index.php"><button type="button" class="btn btn-block btn-danger btn-lg">Annuler</button></a>
                                    </div>

                                </section>

                            </form>




                        </div>

                        <div class="tab-pane" id="parrain">

                        </div>
                        <div class="tab-pane" id="divers">

                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>

            </div>
        </div>


    </div>
    <?php require_once('footer.php') ?>
