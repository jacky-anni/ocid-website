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
    <div class="row">
      <div class="col-md-12">
        <?php include('includes/flash.php'); ?>
      </div>
      
    </div>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-primary">
      <div class="box-body box-profile">
         <?php
            $_SESSION['id_article']=$_GET['article'];
            $article=Query::affiche('article',$_GET['article'],'id');
            if(!$article){
              Fonctions::set_flash("Cet article n'existe pas",'danger');
             header("Location:?page=Ajouter-un-article");
            }
            $user=Query::affiche('utilisateur',$article->posteur,'id');
          ?>
          
          <div class="box-body">
            <div class="col-md-10">
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="dist/img/user/<?= Fonctions::utilisateur()->photo ?>" alt="User Image">
                      <span class="username"><a href="#"><?= $user->prenom ?>  <?= $user->nom ?></a></span>
                      <span class="description"><?= $article->etat ?> - <?= Fonctions::format_date( $article->date_post ); ?></span>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <div class="comment-text">
                                <span class="username">
                                  <?= $article->titre ?>
                                </span><!-- /.username -->
                          </div>
                          <!-- /.comment-text -->
                        </div>
                      </div>

                    <div class="panel-body">
                      <center>
                      <label>Choisir une photo</label>
                        <input type="file" name="upload_image" accept="image/*" id="upload_image" class="btn btn-primary btn-block" />
                        <br />
                        <div id="uploaded_image"></div>
                        </center>
                    </div>
                    <p class="col-md-12"><?= $article->contenue; ?></p>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


               <div class="info-box">
                  <div id="uploadimageModal" class="modal" role="dialog"  style="width: auto;">
                    <div>
                      <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" style="font-weight: bold;">Rogner votre photo</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row" style="height: 63%;">
                                  <div class="col-md-8 text-center">
                                    <div id="image_demo" style="width: 100%;"></div>
                                  </div>
                                  <div class="col-md-4" style="padding-top:30px;">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-success crop_image"> <i class="fa fa-crop"></i>  Rogner et terminer </button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <a href="?page=Article&article=<?= $_GET['article']; ?>">
                   <button  class="btn btn-primary"> <i class="fa fa-image"></i> Enregistrer plus tard</button>
                 </a>

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

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>  
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:580,
      height:300,
      type:'square' //circle
    },
    boundary:{
      width:580,
      height:300,
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"article/upload/article.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          window.location.href="?page=Article&article=<?= $_GET['article'] ?>";
          // $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
