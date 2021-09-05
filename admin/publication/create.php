<?php include('includes/head.php'); ?>
<?php require 'class/Publication.php'; ?>
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
          if (isset($_POST['enregistrer'])) {
            extract($_POST);

            $publication= new Publication($titre,$categorie,$contenue);
            $publication->ajouter();

          }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body box-profile">
            <div class="row">
             <div class="col-md-12">
               <!-- quick email widget -->
                  <div class="box-body box-profile">
                    <form action="#" method="post" role="form" data-parsley-validate action="">
                      <label>Le titre de la publication</label>
                      <div class="form-group">
                        <input type="text" class="form-control" maxlength="230" value="<?php if(isset($_POST['titre']))echo $_POST['titre']; ?>" data-parsley-maxlength="230" name="titre" placeholder="Titre" required="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Choisir une catégoie</label>
                        <select class="form-control" name="categorie" required >
                           <option value="">Choisir une catégorie</option>
                          <?php foreach( Query::liste ('categorie') as $categorie): ?>
                            <option value="<?= $categorie->id ?>"><?= substr($categorie->nom_categorie, 0,90); ?>... </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div>
                        <label>Le contenue de la publication</label>
                        <textarea id="editor1" name="contenue" style="height: 300px;" rows="15" cols="100" required=""><?php if(isset($_POST['contenue']))echo $_POST['contenue']; ?></textarea>


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