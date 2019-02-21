<?php require_once('head.php') ?>

<div class="wrapper">
    <div class="content-wrapper">
        <div class="content">



    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#animal" data-toggle="tab" aria-expanded="true">Détails animal</a></li>
        <li class=""><a href="#parrains" data-toggle="tab" aria-expanded="false">Parrains</a></li>
        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Divers</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="animal">

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
                                        <input type="text" class="form-control" name="name" placeholder="Nom" value="<?php echo $data['Nom_gibbon'] ?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Sexe</label>
                                        <select name="sexe"class="form-control" data-placeholder="Choisir sexe de l'animal" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->sexe as $key => $sexe) {

                                                if($data['Sexe'] == $sexe->getId()){
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
                                                <input type="text" name="birth"class="form-control" data-inputmask="'alias': 'yyyy'" data-mask="yyyy" placeholder="yyyy" maxlength="4" value="<?php echo $data['Annee_naissance'] ?>">
                                            </div>
                                        </span>
                                        <label>Décès</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="date_death"class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="yyyy-mm-dd" placeholder="yyyy-mm-dd"maxlength="14" value="<?php echo $data['Date_mort'] ?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label>Espèce</label>
                                        <select name="espece"class="form-control" data-placeholder="Choisir espce de l'animal" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->specie as $key => $specie) {
                                                if($data['Espece'] == $specie["Especes_Id"]){
                                                    $current_specie = "selected";
                                                    } else { $current_specie = '';
                                                    }
                                                echo '<option value="'.$specie["Especes_Id"].'"'.$current_specie.'>'.$specie["Especes_nom_francais"].' ('.$specie["Especes_nom_latin"].')</option>';
                                            }
                                            ?>
                                        </select>
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
                            <hr>
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
                                    <input type="text" value="<?php echo $data['Photo1'] ?>" name="photo1" class="form-control" placeholder="Image 1">
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="<?php echo $data['Photo1'] ?>" name="photo2" class="form-control" placeholder="Image 2">
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
                                        <select name="location" class="form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->islands as $key => $island) {

                                                if($data['Ile'] == $island->getId()){
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
                                        <label>Libre</label>
                                        <select name="captivity" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->captivity as $key => $captivity) {
                                                if($data['Gibbon_libere'] == $captivity->getId()){
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
                                        <select name="adoption" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->adoption as $key => $adoption) {
                                                if($data['adoption'] == $adoption->getId()){
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
                                        <select name="visibility" class="form-control" data-placeholder="Choisir l'espèce" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($this->visibility as $key => $visibility) {

                                                if($data['site'] == $visibility->getId()){
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
                                <textarea class="mytextarea" name="fr_description" rows="8" cols="80"><?php echo $data['Details'] ?></textarea>
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
                                <textarea class="mytextarea" name="en_description" rows="8" cols="80"><?php echo $data['Details_ang'] ?></textarea>
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

                                <textarea class="mytextarea"name="sp_description" rows="8" cols="80"><?php echo $data['Details_esp'] ?></textarea>
                            </div>
                        </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-block btn-success btn-lg">Enregistrer</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="text" class="btn btn-block btn-primary btn-lg">Enregistrer et nouveau</button>
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
