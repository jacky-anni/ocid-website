<?php
  include('includes/head.php');
  require 'class/Projet.php';
?>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('includes/header-title.php'); ?>
     <?php include('includes/flash.php'); ?>
    <!-- create user -->

    <!-- Main content -->
    <section class="content container-fluid">
       <?php
       // selectiionner le projet en question
          $projet=Query::affiche('projet',$_GET['projet'],'id');
          // si le projet n'existe pas
           if (!$projet->id) {
            // si l'projet n'existe pas
            Fonctions::set_flash("Projet n'existe pas",'danger');
             header("Location:?page=ajouter-un-projet");
           }
          // si on modifie
          if (isset($_POST['enregistrer'])) {
            extract($_POST);
            $projet= new Projet($titre,$public,$zone,$date_debut,$date_fin,$presentation,$objectif,$resultat,$activite);
            $projet->modifier();
          }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
             <div class="col-md-12">
                  <div class="box-body">
                    <form action="#" method="post" role="form" data-parsley-validate action="">
                      <div class="row">
                        <div class="col-md-12">
                         <label>Le titre du projet</label>
                          <div class="form-group">
                            <input type="text" class="form-control" maxlength="230" value="<?= $projet->titre ?>" data-parsley-maxlength="230" name="titre" placeholder="Titre" required="">
                          </div>
                        </div>

                        <div class="col-md-6">
                         <label>Public cible</label>
                          <div class="form-group">
                            <input type="text" class="form-control" maxlength="230" value="<?= $projet->public_cible ?>" data-parsley-maxlength="230" name="public" placeholder="Jeune de 18 à 30 ans"  required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                         <label>Zone d'intervention</label>
                          <div class="form-group">
                            <input type="text" class="form-control" maxlength="230" value="<?= $projet->zone ?>" data-parsley-maxlength="230" placeholder="Port-au-Prince" name="zone"  required>
                          </div>
                        </div>

                        <div class="col-md-6">
                         <label>Date début</label>
                          <div class="form-group">
                            <input type="date" class="form-control" maxlength="230" value="<?= $projet->date_debut ?>" data-parsley-maxlength="230" name="date_debut"  required="">
                          </div>
                        </div>

                        <div class="col-md-6">
                         <label>Date de fin</label>
                          <div class="form-group">
                            <input type="date" class="form-control" maxlength="230" value="<?= $projet->date_fin?>" data-parsley-maxlength="230" name="date_fin"  required="">
                          </div>
                        </div>

                         <div class="col-md-6">
                           <label>Résumé du projet</label>
                           <div class="form-group">
                            <textarea id="editor1" name="presentation" style="height: 300px;" rows="15" cols="100" required=""><?= $projet->presentation ?></textarea>
                          </div>
                        </div>

                         <div class="col-md-6">
                           <label>Objectif du projet</label>
                           <div class="form-group">
                            <textarea id="editor2" name="objectif"  rows="6" cols="100" required=""><?= $projet->objectif ?></textarea>
                          </div>
                        </div>

                        <div class="col-md-6">
                           <label>Résultats</label>
                           <div class="form-group">
                            <textarea id="editor4" name="resultat" style="height: 300px;" rows="15" cols="100" ><?= $projet->resultat ?></textarea>
                          </div>
                        </div>

                         <div class="col-md-6">
                           <label>Activités</label>
                           <div class="form-group">
                            <textarea id="editor3" name="activite" style="height: 300px;" rows="15" cols="100" ><?= $projet->activite ?></textarea>
                          </div>
                        </div>
                      </div>
                      
                      <div>
                        


                      <div class="box-footer clearfix">
                        <button type="submit" name="enregistrer" class="pull-right btn btn-lg btn-primary"> Enregistrer
                          <i class="fa fa-arrow-circle-right"></i></button>
                      </div>
                    </form>

                  </div>
             </div>


            </div>

        
          </div>
          <!-- /.box-body -->
        </div>
        </div>
      </div>

    </section>
  </div>
    <!-- /.content -->
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
<?php include('includes/partials/_ckEditor.php'); ?>
</body>
</html>