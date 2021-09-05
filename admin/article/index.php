
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
            <a href="?page=Créer-un-article">
              <button class="btn btn-primary pull-right"><b> <i class="fa fa-plus"></i>  Nouveau article</b></button>
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
              <tr>
                <th class="hidden" >projet</th>
                <th class="hidden" >Activités</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                if($_SESSION['droit']=='Super Administrateur'){
                  $query=Query::liste('article');
                }else{
                  $query=Query::liste_prepare('article',$_SESSION['id'],'posteur');
                }
                foreach(array_chunk($query ,1) as $article1):
                ?>
              <tr>
                <td>
                  <div class="row">
                  <?php foreach($article1 as $article): ?>
                    <div class="col-lg-6">
                       <a href="?page=Article&article=<?= $article->id; ?>">
                      <img class="img-responsive col-md-12" src="dist/img/article/<?php if(!empty($article->photo)){echo $article->photo;}else{echo 'template.png';} ?>" alt="Photo" style="padding: 10px;">
                    </a>
                    </div>
                   <div class="col-lg-6">
                    <div class="box-body">
                   
                    <a href="?page=Article&article=<?= $article->id; ?>">
                      <h4 style="line-height: 27px; font-weight: bold;"> <?= $article->titre ?></h4></br>
                    </a>

                    <p style="margin-top: -20px;">
                      <?= substr($article->contenue, 0,255); ?></br>
                      <?php $projet= Query::affiche('projet',$article->reference,'id') ?>
                      <?php if(!empty($projet->titre)){ ?>
                        <small style="color: red; "><i><a href="?page=Projet&projet=<?=  $projet->id ?>">Projet : <?= $projet->titre ?></a></i> </small>
                      <?php } ?>
                      
                    </p></br>

                    <span class="pull-right" style="margin-top: -25px; font-size: 15px;">
                      <a href="?page=photo-activités&article=<?= $article->id ?>">
                        <i class="fa fa-image"></i>  <?= $photo= Query::count_prepare('photo',$article->id,'reference'); ?> <?php if($photo>1){echo "Photos";}else{echo "Photo";} ?> 
                      </a>  
                    -   <a href="?page=photo-activités&article&article=<?= $article->id ?>">
                      <i class="fa fa-film"></i>  <?= $video= Query::count_prepare('video',$article->id,'reference'); ?> <?php if($video>1){echo "Videos";}else{echo "Video";} ?>
                    </a></span>
                    <a href="?page=Article&article&article=<?= $article->id ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Voir plus</a>
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
