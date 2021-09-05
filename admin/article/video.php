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
    <?php
      $article=Query::affiche('article',$_GET['article'],'id');
       if (!$article->id || $article->posteur!=$_SESSION['id']) {
        // si l'article n'existe pas
         header("Location:?page=Liste-des-articles");
       }

    ?>
    <section class="">
      <div class="box-body box-prfofile">
          <div class="box">
          <div class="col-md-12">
          <div class="box box-solid">
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p><?= $article->titre; ?></p>
                <small>Publié le: <cite title="Source Title"><?= Fonctions::format_date( $article->date_post ); ?></cite></small>
              </blockquote>

              <ul class="nav nav-tabs">
                <li><a href="?page=Article&article=<?= $article->id; ?>" ><i class="fa fa-files-o"></i>  L'activité</a></li>
                <li><a href="?page=photo-activités&article=<?= $article->id ?>" ><i class="fa fa-film"></i>  Photos (<?= Query::count_prepare('photo',$_GET['article'],'reference'); ?>)</a></li>
                <li><a href="?page=Liste-des-articles"><i class="fa fa-list"></i>  Toutes les activités</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
              <tr>
                
                <th><center>Liste des photos (<?= Query::count_prepare('video',$_GET['article'],'reference'); ?>)</center></th>
                <th class="hidden"> </th>
                <th class="hidden"></th>

              </tr>
              </thead>
              <tbody>
               <?php foreach( array_chunk( Query::liste_prepare ('video',$_GET['article'],'reference'), 3) as $video): ?>
              <tr>

                <div class="row">
                <td>
                  <?php foreach($video as $video): ?>
                    <div class="col-md-4">
                      <h4 class="media-heading">
                          <div class="embed-responsive embed-responsive-16by9">
                           <?= $video->lien ?>


                          </div>
                          <div class="well col-md-12" style="background-color: #438eb9;">
                            <h4 class="white  smaller lighter" style=" color: white; line-height: 27px; "><?= $video->nom ?></h4>
                            <span class="pull-right" style="font-size: 12px; color: white;"> Publiée le : <?= $video->date_post ?></span>
                          </div>

                          <div style="margin-top: -20px;">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $video->id;?>"><b> <i class="fa fa-edit"></i>  Modifier</b></button>

                          <a href="#<?= $video->id;?>1"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
                          
                          </div>
                        </h4>
                  </div>
                  <?php include('video/edit.php') ?>
                  <?php include('video/destroy.php') ?>
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
