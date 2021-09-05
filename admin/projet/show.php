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
           $_SESSION['views']=$_GET['projet'];
           include('includes/flash.php');
          // selectionner le projet en question
            $projet=Query::affiche('projet',$_GET['projet'],'id');
             if (!$projet->id) {
              // si l'projet n'existe pas
              Fonctions::set_flash("Projet n'existe pas",'danger');
               header("Location:?page=projets");
             }
             // utilisateur qui poste
             $user=Query::affiche('utilisateur',$projet->posteur,'id');
             // mettre online
              if (isset($_GET['projet']) AND isset($_GET['statut'])) {
                require 'class/Projet.php';
                Projet::statut();
              }

              if (isset($_GET['update'])) {
                $projet=$_GET['projet'];
                header("Location:?page=Projet&projet=$projet");
              }
          ?>
       
          <div class="box-body">
            <div class="col-md-8">
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="dist/img/user/<?= $user->photo ?>" alt="User Image">
                      <span class="username"><a href="#"><?= $user->prenom ?>  <?= $user->nom?></a></span>
                      <span class="description"><?= $projet->etat ?> - <?= Fonctions::format_date( $projet->date_post ); ?></span>
                    </div>
                  </div>
                  <!-- /.box-header -->
                <div class="box-body">
                  <?php if(!empty($projet->photo)): ?>
                    <img class="img-responsive col-md-12" src="dist/img/projet/<?= $projet->photo ?>" alt="Photo" style="padding: 10px;">
                  <?php endif; ?>

                  <h4 style="line-height: 27px; font-weight: bold;"> <?= $projet->titre ?></h4></br>

                  <p style="margin-top: -20px;"> <?= $projet->presentation ?></p><hr>

                   <h5 style="font-weight: bold;">Ojectifs génerales</h5>
                    <div class="post">
                      <!-- /.user-block -->
                      <p>
                        <?= $projet->objectif ?>
                      </p>
                    </div>

                    <h5 style="font-weight: bold;">Résultats</h5>
                    <div class="post">
                      <!-- /.user-block -->
                      <p>
                        <?= $projet->resultat ?>
                      </p>
                    </div>

                    <h5 style="font-weight: bold;">Activités</h5>
                    <div class="post">
                      <!-- /.user-block -->
                      <p>
                        <?= $projet->activite ?>
                      </p>
                    </div>

                    


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
               <i class="glyphicon glyphicon-user"></i> Public cible :  <b><a ><?= $projet->public_cible ?></a></b></a>
            </li>
            
            <li class="list-group-item">
               <i class="glyphicon glyphicon-flag"></i>  Zone  <a class="pull-right"><b><?= $projet->zone ?></b></a>
            </li>

            <li class="list-group-item">
              <i class="glyphicon glyphicon-calendar"></i>  Date de début <a class="pull-right"><b><?= Fonctions::format_date( $projet->date_debut ); ?></b></a>
            </li>

            <li class="list-group-item">
              <i class="glyphicon glyphicon-calendar"></i>  date de fin <a class="pull-right"><b><?= Fonctions::format_date( $projet->date_fin ); ?></b></a>
            </li>

            <li class="list-group-item">
              <i class="glyphicon glyphicon-calendar"></i> Durée <a class="pull-right"><b><?= Projet::duree($projet->date_debut,$projet->date_fin) ?></b></a>
            </li>

            <li class="list-group-item">
              <i class="glyphicon glyphicon-calendar"></i> Temps ecoulé <a class="pull-right"><b>
                <?php
                  if($projet->date_debut<date('Y-m-d')){

                    if($projet->date_fin>=date('Y-m-d')){
                      echo Projet::duree($projet->date_debut,date('Y-m-d'));
                    }else{
                      echo "Terminé";
                    }
                  }
               ?>
               </b></a>
            </li>

             <li class="list-group-item">
              <center><a class="" style=" font-weight: bold; color: red; margin-bottom: 30px;">
                <?php $jours_total= Fonctions::calcul_jour('projet','date_fin','date_debut',$projet->id); ?>
                <?php $jours_passe= Fonctions::calcul_jour('projet','NOW()','date_debut',$projet->id); ?>
              </a></center>

              <div class="progress">
                  <div class="progress-bar progress-bar-aqua progress-bar-striped" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= $jours_passe/$jours_total*100 ?>%">
                    <span style="color: black;">
                      <?php
                      // pourcentage de jours restant
                      $pourcent=number_format($jours_passe/$jours_total*100,2);
                      // si il est superieur a zero
                      if($pourcent>100){
                        echo "100%";
                      }elseif ($pourcent>0) {
                        echo $pourcent."%";
                      }
                      else{
                        // sinon
                        echo "0%";
                      }
                    ?></span>
                  </div>
                </div>
            </li>
          </ul>


  <!-- Box Comment -->

        <?php if($article_list=Query::count_prepare('article',$_GET['projet'],'reference')>=1): ?>
            <div class="box box-widget">
             <div class="box-footer no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li style="padding: 10px; font-size: 17px;"> <b><i class="fa fa-files-o"></i>  Activités (<?= $article_list ?>) </b></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php foreach(Query::liste_prepare ('article',$_GET['projet'],'reference') as $article): ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/article/<?php if(!empty($article->photo)){echo $article->photo;}else{echo 'template.png';} ?>" style="width: 100px; height: auto; float: left; padding: 8px;" >
                      </div>
                      <div class="product-info">
                        <a href="?page=Article&article=<?= $article->id; ?>" class="product-title"><?= $article->titre ?>
                          <span class="label label-warning pull-right"><?= $article->etat ?></span></a>
                        <span class="product-description">
                              <?= Fonctions::format_date( $article->date_post ); ?>
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
