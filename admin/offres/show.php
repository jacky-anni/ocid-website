<?php include('includes/head.php');?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
<?php include('includes/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
   <?php include('includes/menu.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
      <div class="box-body box-profile">
         <?php
           include('includes/flash.php');
          // selectionner le offres en question
            $offres=Query::affiche('offres',$_GET['offre'],'id');
             if (!$offres->id) {
              // si l'offres n'existe pas
              Fonctions::set_flash("offres n'existe pas",'danger');
               header("Location:?page=offres");
             }
             // // utilisateur qui poste
             $user=Query::affiche('utilisateur',$offres->posteur,'id');
             // mettre online
              if (isset($_GET['offre']) AND isset($_GET['statut'])) {
                require 'class/Offres.php';
                offres::statut();
              }

              if (isset($_GET['update'])) {
                $offres=$_GET['offres'];
                header("Location:?page=offres&offres=$offres");
              }
          ?>
       
          <div class="box-body">
            <div class="col-md-8">
                <!-- Box Comment -->
                <div class="box box-widget">
                <div class="box-body">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="dist/img/user/<?= $user->photo ?>" alt="User Image">
                      <span class="username"><a href="#"><?= $user->prenom ?>  <?= $user->nom?></a></span>
                      <span class="description"><?= $offres->etat ?> - <?= Fonctions::format_date( $offres->date_post ); ?></span>
                    </div>
                  </div>
                  <h4 style="line-height: 27px; font-weight: bold;"> <?= $offres->titre ?></h4>
                </br>
                  <p style="margin-top: -20px;"> <?= $offres->description ?></p><hr>

                  <?php include('partials/_boutton.php'); ?>
                  <?php include('destroy.php'); ?>

                </div>
                <!-- /.box-body -->
              </div>
                <!-- /.box -->
      </div>

      <div class="col-md-4"></br></br></br>
        <p class=" text-center"><b> <i class="glyphicon glyphicon-plus"></i> Infos. supplémentaires</b></p>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
               <i class="glyphicon glyphicon-circle"></i> domaine :  <b><a ><?= $offres->domaine ?></a></b></a>
            </li>

            <li class="list-group-item">
               <i class="glyphicon glyphicon-flag"></i> pays :  <b><a ><?= $offres->pays ?></a></b></a>
            </li>
            
            <li class="list-group-item">
               <i class="glyphicon glyphicon-flag"></i>  Zone  <a class="pull-right"><b><?= $offres->zone ?></b></a>
            </li>

            <li class="list-group-item">
              <i class="glyphicon glyphicon-calendar"></i>  date limite <a class="pull-right"><b><?= Fonctions::format_date( $offres->date_limite ); ?></b></a>
            </li>

             <li class="list-group-item">
              <i class="glyphicon glyphicon-envelope"></i>  email <a class="pull-right"><b><?= $offres->email ?></b></a>
            </li>

          </ul>


  <!-- Box Comment -->

        <?php if($offre_list=Query::count_query('offres')>=1): ?>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php foreach(Query::liste ('offres') as $offres): ?>
                    <li class="item">
                      <div class="product-info">
                        <a href="?page=offre-emploi&offre=<?= $offres->id; ?>" class="product-title"><?= $offres->titre ?>
                          <span class="label label-warning pull-right"><?= $offres->etat ?></span></a>
                        <span class="product-description">
                              <?= Fonctions::format_date( $offres->date_post ); ?>
                        </span>
                      </div>
                    </li>
               <?php endforeach; ?>

              </ul>
            </div>
          <?php endif; ?>
        <!-- /.box-footer -->
      </div>

       <div>

    </div>

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include('includes/footer.php'); ?>
  <?php include('includes/tools.php'); ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
