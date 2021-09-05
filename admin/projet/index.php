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
    <?php include('includes/flash.php'); ?>

    <!-- Main content -->
    <section class="">
      <div class="box-body box-prfofile">
          <div class="box">
          <div class="box-header">
            <a href="?page=ajouter-un-projet">
              <button class="btn btn-primary pull-right"><b> <i class="fa fa-plus"></i>  Nouveau projet</b></button>
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                      <th style="width: 50%">
                          Nom du projet
                      </th>
                      <th style="width: 30%">
                          Public Cible
                      </th>
                      <th style="width: 20%">
                          Progression
                      </th>
                      <th>
                      </th>
                  </tr>
              </thead>
                 <tbody>

                  <?php 
                    if($_SESSION['droit']=='Super Administrateur'){
                      $query=Query::liste('projet');
                    }else{
                      $query=Query::liste_prepare('projet',$_SESSION['id'],'posteur');
                    }
                ?>

                  <?php foreach ($query as $projet): ?>
                  <tr>
                      <td>
                          <a href="?page=Projet&projet=<?=  $projet->id ?>" style="line-height: 23px;" >
                              <?= $projet->titre ?>
                          </a>
                          <br/>
                          <small style="font-size: 11px;">
                              <?= $projet->etat ?>
                          </small>
                      </td>
                      <td>
                          <?= $projet->public_cible ?>
                      </td>
                      <td class="project_progress">
                          <div class="progress">
                            <?php $jours_total= Fonctions::calcul_jour('projet','date_fin','date_debut',$projet->id); ?>
                           <?php $jours_passe= Fonctions::calcul_jour('projet','NOW()','date_debut',$projet->id); ?>
                            <div class="progress-bar progress-bar-aqua progress-bar-striped" role="progressbar"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= $jours_passe/$jours_total*100 ?>%">
                              <span style="color: black;">
                                </span>
                            </div>
                          </div>
                          <small>
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
                                  echo "0%";}?>
                          </small>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="?page=Projet&projet=<?=  $projet->id ?>">
                              <i class="fa fa-plus">
                              </i>
                              Voir plus
                          </a>
                      </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

        </div>
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

<!-- REQUIRED JS SCRIPTS -->
<!-- page script -->
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
