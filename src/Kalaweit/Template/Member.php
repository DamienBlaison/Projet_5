<?php require_once('head.php') ?>

<form class="" action="index.html" method="post">

</form>
<form class="content-wrapper" action="" method="post" style="min-height: 100%;height:100%;">
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#animal" data-toggle="tab" aria-expanded="true">Informations générales</a></li>
                <li class=""><a href="#parrains" data-toggle="tab" aria-expanded="false">Parrainage animaux</a></li>
                <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Divers</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="animal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Informations membres</h3>
                                </div>
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Nom" name ="nom" value ="<?php echo $data['nom']?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" value ="<?php echo $data['prenom']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Type de donateur</h3>
                                </div>
                                <br>

                                <div class="box-body">
                                    <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control select2 "data-placeholder="" name="type_membre_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php

                                    foreach ($this->Type_membre as $key => $Type) {

                                        if( $Type['id_type_membre'] == $data['type_membre_id']){
                                            $selected = "selected";
                                        } else { $selected = '';}

                                        echo '<option value="' . $Type['id_type_membre']. '"'.$selected. '>' . $Type['type_membre'].'</option>';
                                    }
                                    ?>
                                </select>
</div>
                                </div>
                                <br>
                            </div>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Autres infos</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="parraine_par" class="col-sm-2 control-label">Parrain</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="parraine_par" class="form-control" id="parraine_par" placeholder="Email"></input>
                                        </br>
                                    </div>
                                    <label for="lang_parle_id" class="col-sm-2 control-label">Langue</label>
                                    <div class="col-sm-10">

                                        <select class="form-control select2 "data-placeholder="" name="lang_parle_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php

                                            foreach ($this->Langue as $key => $Langue) {

                                                if( $Langue['id_lang_parle'] == $data['lang_parle_id']){
                                                    $selected = "selected";
                                                } else { $selected = '';}

                                                echo '<option value="' . $Langue['id_lang_parle']. '"'.$selected. '>' . $Langue['lang_parle'].'</option>';
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Coordonnées</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" placeholder="Adresse" name="adresse" value ="<?php echo $data['adresse']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" placeholder="code postal" name="code_postal" value ="<?php echo $data['code_postal']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" placeholder="ville" name="ville" value ="<?php echo $data['ville']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" ><i class="fa fa-map-marker"></i></span>
                                <select class="form-control select2 "data-placeholder="" name="pays_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php

                                    echo $this->Country;

                                    foreach ($this->Country as $key => $Country) {

                                        var_dump($Country['Pays_id']);


                                        if($Country['Pays_id'] == $data['pays_id']){
                                            $selected = "selected";
                                        } else { $selected = '';}

                                        echo '<option value="' . $Country['Pays_id']. '"'.$selected. '>' . $Country['Pays_nom'].'</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Téléphone" name="tel1" value ="<?php echo $data['tel1']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Téléphone 2" name="tel2" value ="<?php echo $data['tel2']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value ="<?php echo $data['email']?>"></input>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                    <input type="email" class="form-control" name="old_email" placeholder="Précédent Email" value ="<?php echo $data['old_email']?>"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Commentaires:</h3>
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body pad">
                                <textarea class="mytextarea" name="commentaires" rows="8" cols="80"><?php  echo $data['commentaires']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Modifier le mot de passe</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="container-fluid">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" name="mdp" placeholder="Nouveau mot de passe"></input>
                                    </div>
                                    <br>
                                    <div class="input-group col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Confirmation mot de passe"></input>
                                    </div>
                                </div>

                            </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</form>
</div>

<?php require_once('footer.php') ?>
