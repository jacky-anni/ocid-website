<?php
  include('includes/head.php');
  require 'class/publication.php';
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
    <?php 
      $publication=Query::affiche('publication',$_GET['publication'],'id');
      if (!$publication->id) {
        // si l'publication n'existe pas
         header("Location:?page=publications");
       }
     ?>

    <!-- Main content -->
    <section class="content container-fluid">
       <?php 
          
        if (isset($_POST['enregistrer'])) {
          
          extract($_POST);

          $publication= new Publication($titre,$categorie,$contenue);
          $publication->modifier();

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
                      <label>Le titre de l'publication</label>
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?= $publication->titre ?>" maxlength="254" data-parsley-maxlength="254" name="titre" placeholder="Titre" required="">
                      </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Choisir une catégoie</label>
                        <select class="form-control" name="categorie" required >
                           <option value="">Choisir une catégorie</option>
                          <?php foreach( Query::liste ('categorie') as $categorie): ?>
                            <option value="<? $categorie->id ?>" <?php if ($categorie->id==$publication->id_categorie){echo "selected";} ?> ><?= substr($categorie->nom_categorie, 0,90); ?>... </option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div>
                        <label>Le contenue de l'publication</label>
                         <textarea id="editor1" name="contenue" rows="15" cols="100" required=""><?= $publication->contenue ?></textarea>
                      </div>

                      <div class="box-footer clearfix">
                        <button type="submit" name="enregistrer" class="pull-right btn btn-lg btn-primary">  <i class="fa fa-edit"></i>  Modifier</button>
                         
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
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<?php include('includes/partials/_ckEditor.php'); ?>

</script>
</body>
</html>