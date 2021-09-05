<?php include('includes/head.php'); ?>
<?php require 'class/Offres.php'; ?>
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


            $offres= new Offres($titre,$domaine,$pays,$zone,$date_limite,$email,$description);
            $offres->ajouter();

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
                      <div class="col-md-6">
                        <label>Le titre du poste</label>
                        <div class="form-group">
                          <input type="text" class="form-control" maxlength="230" value="<?php if(isset($_POST['titre']))echo $_POST['titre']; ?>" data-parsley-maxlength="230" name="titre" placeholder="Responsable réseau sociaux" required="">
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                         <label>Domaine</label>
                        <div class="form-group">
                          <input type="text" class="form-control" maxlength="230" value="<?php if(isset($_POST['domaine']))echo $_POST['domaine']; ?>" data-parsley-maxlength="230" name="domaine" placeholder="Sciences Informatiques" required="">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label>Pays</label>
                        <div class="form-group">
                          <input type="text" class="form-control" maxlength="230" value="<?php if(isset($_POST['pays']))echo $_POST['pays']; ?>" data-parsley-maxlength="230" name="pays" placeholder="Haiti" required="">
                        </div>
                      </div>

                       <div class="col-md-6">
                        <label>Zone</label>
                        <div class="form-group">
                          <input type="text" class="form-control" maxlength="230" value="<?php if(isset($_POST['zone']))echo $_POST['zone']; ?>" data-parsley-maxlength="230" name="zone" placeholder="Cap-Haitien" required="">
                        </div>
                      </div>

                        <div class="col-md-6">
                          <label>Date limite</label>
                          <div class="box-header with-border" style="color: gray;">
                              <span class="description">date Limite pour les dépots de candidature.</span>
                          </div>
                          <div class="form-group">
                            <input type="date" class="form-control" maxlength="230" value="<?php if(isset($_POST['date_limite']))echo $_POST['date_limite']; ?>" data-parsley-maxlength="230" name="date_limite" required="">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label>Email</label>
                          <div class="box-header with-border" style="color: gray;">
                              <span class="description">Email pour recevoir dépots des candidats .</span>
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" maxlength="230" value="<?php if(isset($_POST['email']))echo $_POST['email']; ?>" data-parsley-maxlength="230" name="email" placeholder="anizairejacky@gmail.com" required="">
                          </div>
                        </div>

                       <div class="col-md-12">
                          <label>Description du poste</label>
                          <textarea id="editor1" name="description" style="height: 300px;" rows="15" cols="100" required=""><?php if(isset($_POST['description']))echo $_POST['description']; ?></textarea>
                        </div>

                        <div class="col-md-12">
                          <div class="box-footer clearfix">
                            <button type="submit" name="enregistrer" class="pull-right btn btn-lg btn-primary"> Enregistrer
                              <i class="fa fa-arrow-circle-right"></i></button>
                          </div>
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