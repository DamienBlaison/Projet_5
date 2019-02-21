<?php $adminlte = '../../../../vendor/almasaeed2010/adminLte' ?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 2 | General Form Elements</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo $adminlte ?>/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo $adminlte ?>/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="<?php echo $adminlte ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="<?php echo $adminlte ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <link rel="stylesheet" href="../../../../Css/perso.css">

</head>

<body class="hold-transition skin-blue sidebar-mini" style="min-height:auto;">

<aside class="main-sidebar">
      <section class="sidebar" style="min-height: 100%; height:100%;">
            <div class="user-panel">
                  <div class="pull-left image">
                        <img src="<?php echo $adminlte ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                              </button>
                        </span>
                  </div>
            </form>
            <ul class="sidebar-menu tree" data-widget="tree">
                  <li class="header">MENU</li>
                  <li class="active treeview menu-open">
                        <a href="#">
                              <i class="fa fa-users"></i> <span>Membres</span>
                              <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                              </span>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="/www/Kalaweit/member/get?id="><i class="fa fa-user-plus"></i> Ajouter un membre</a></li>
                              <li><a href="/www/Kalaweit/member/list/1"><i class="fa fa-users"></i> Liste des membres</a></li>
                              <li class="treeview"><a href="#"><i class="fa  fa-eur"></i> Gestion des paiements <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                          <li><a href="monthly_deduction"><i class="fa fa-circle-o"></i> Les prélèvements mensuels</a></li>
                                          <li><a href="payment_history"><i class="fa fa-circle-o"></i> Historique des prélèvements</a></li>
                                    </ul>
                              </li>
                              <li class="treeview"><a href="#"><i class="fa fa-thumbs-up"></i> Recapitulatif des dons <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                          <li><a href="annual_report"><i class="fa fa-circle-o"></i> Rapport Annuel</a></li>
                                          <li><a href="monthly_report"><i class="fa fa-circle-o"></i> Rapport Mensuel</a></li>
                                          <li><a href="gift_search"><i class="fa fa-circle-o"></i> Rechercher</a></li>
                                    </ul>
                              </li>
                              <li class="treeview"><a href="index3.html"><i class="fa fa-file-text"></i> Reçus Fiscaux <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                          <li><a href="receipt_generation"><i class="fa fa-circle-o"></i> Génération des reçus</a></li>
                                          <li><a href="receipt_print"><i class="fa fa-circle-o"></i> Impression des reçus</a></li>
                                          <li><a href="receipt_email"><i class="fa fa-circle-o"></i> Email des reçus</a></li>
                                          <li><a href="receipt_list"><i class="fa fa-circle-o"></i> Liste des reçus</a></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="active treeview menu-open">
                        <a href="#"><i class="fa  fa-paw"></i> <span>Adoption</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                              <li><a href="/www/Kalaweit/animal/add"><i class="fa  fa-plus-square"></i> Ajouter un animal</a></li>
                              <li><a href="/www/Kalaweit/animal/list/1"><i class="fa  fa-folder-open"></i> Tous les animaux</a></li>
                              <li><a href="/www/Kalaweit/animal/list/1?adoption=oui"><i class="fa fa-home"></i> Les animaux à adopter</a></li>
                              <li><a href="/www/Kalaweit/animal/list/1?Gibbon_mort=oui"><i class="fa fa-ambulance"></i> Les animaux morts</a></li>
                              <li><a href="/www/Kalaweit/animal/list/1?Gibbon_libere=oui"><i class="fa  fa-tree"></i> Les animaux libérés</a></li>
                        </ul>
                  </li>
            </ul>
      </section>
</aside>
