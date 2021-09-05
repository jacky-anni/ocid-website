
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
  

    <section class="">
      <div class="box-body box-prfofile">
          <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
              <tr>
                
                <th><center>Liste des photos (<?= $photo_count= Query::count_prepare('photo',$_SESSION['id'],'posteur'); ?>)</center></th>
                <th class="hidden"> </th>
                <th class="hidden"></th>

              </tr>
              </thead>
              <tbody>

               <?php foreach( array_chunk( $photo_count= Query::liste ('photo',$_SESSION['id'],'posteur'), 3) as $photo): ?>
              <tr>

                <div class="row">
                <td>
                  <?php foreach($photo as $photo): ?>
                    <div class="col-md-4">
                      <a class="example-image-link" href="photos/photos/<?= $photo->nom ?>" data-lightbox="example-1" data-title="<?= $photo->titre?>" ><img class="example-image img-rounded img-responsive col-md-12" src="photos/photos//<?= $photo->nom ?>"  style=" padding: 1px; width: 580px; height: 250px;" /></a>
                      <p class="hidden"><?= $photo->nom ?></p>
                      

                      <center>
                          <a href="#<?= $photo->id;?>" style="padding: 5px;" role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
                          <?php include('photos/destroy.php'); ?>
                        </center>
                    </div>
                  <?php endforeach;  ?>

                </td>
              </div>
                
                 
                <td class="hidden"><?= $photo->date_post ?></td>
                <td class="hidden"><?= $photo->reference ?></td>
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
