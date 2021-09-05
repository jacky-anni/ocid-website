
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
            <a href="?page=créer-une-publication">
              <button class="btn btn-primary pull-right"><b> <i class="fa fa-plus"></i>  Nouvelle publication</b></button>
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
              <tr>
                <th class="hidden" ></th>
                <th class="hidden" ></th>
              </tr>
              </thead>
              <tbody>
                <?php 
                if($_SESSION['droit']=='Super Administrateur'){
                  $query=Query::liste('publication');
                }else{
                  $query=Query::liste_prepare('publication',$_SESSION['id'],'posteur');
                }
                foreach(array_chunk($query ,1) as $publication1):
                ?>
              <tr>
                <td>
                  <div class="row">
                  <?php foreach($publication1 as $publication): ?>
                   <div class="col-lg-12">
                    <div class="box-body">
                   
                    <a href="?page=publication&publication=<?= $publication->id; ?>">
                      <h4 style="line-height: 27px; font-weight: bold;"> <?= $publication->titre ?></h4></br>
                    </a>

                    <p style="margin-top: -20px;">
                      <?= substr($publication->contenue, 0,255); ?></br>
                      
                    </p></br>

                    <?php $categorie = Query::affiche('categorie',$publication->id_categorie,'id') ?>
                    <?php if(!empty($categorie)){ ?>
                      <span class="pull-right" style="margin-top: -25px; margin-bottom:10px; font-size: 15px; font-weight:bold; background:#3b8dbc; padding:5px; color:white;">
                            <?= $categorie->nom_categorie ?>
                      </span>
                    <?php }else{ ?>
                      <span class="pull-right" style="margin-top: -25px; font-size: 15px; font-weight:bold; background:#3b8dbc; padding:5px; color:white;">
                            Acune catégorie 
                      </span>
                    <?php } ?>
                    <a href="?page=publication&publication=<?= $publication->slug ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Voir plus</a>
                  </div>
                   </div>
                  <?php endforeach;  ?>
                  </div>
                </td>
                <td class="hidden"></td>
              </tr>
            <?php endforeach;  ?>
         
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
