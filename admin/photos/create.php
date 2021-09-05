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
            $article=Query::affiche('article',$_GET['article'],'id');
            if (!$article) {
              header("Location:?page=Créer-un-article");
            }
            $user=Query::affiche('utilisateur',$article->posteur,'id');
        ?>
          
          <div class="box-body">
            <div class="col-md-6">
              <h5 id="success"></h5>
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="dist/img/user/<?= $user->photo ?>" alt="User Image">
                      <span class="username"><a href="#"><?= $user->prenom ?>  <?= $user->nom?></a></span>
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
                      <form action="" method="POST" id="frmbox" onsubmit="return formSubmit();">

                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label>Desription</label>
                                  <textarea class="form-control" maxlength="253" name="titre" required=""></textarea>
                                  <input type="hidden" name="id" value="<?= $_GET['article'] ?>" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                   <label>Choisir une photo</label>
                                   <input type="file" name="upload_image" accept="image/*" id="upload_image" required="" class="btn btn-primary btn-block" />
                              </div>
                            </div>
                          </div>

                          

                             <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <button type="submit" class="btn btn-primary" name="enregistrer" ><i class="fa fa-plus"></i> Ajouter </button>
                              </div>
                            </div>
                          </div>
                      </form>
                     
                    </div>
                    
                  </div>
                  
                  <!-- /.box-body -->
                </div>

                <div id="uploaded_image" style="width: 100%;"></div></br>
                <!-- /.box -->


         <div class="info-box">
            <div id="uploadimageModal" class="modal" role="dialog"  >
              <div>
                <div class="modal-dialog" style="width: 650px;">
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="font-weight: bold;">Rogner votre photo</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row" style="height: 63%;">
                            <div class="col-md-8 text-center">
                              <div id="image_demo"></div>
                            </div>
                            <div class="col-md-4" style="padding-top:100px;">
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

        </div>
      </div>

      <div class="col-md-6">
        <div id="liste"></div>
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
      width:630,
      height:400,
      type:'square' //circle
    },
    boundary:{
      width:630,
      height:400,
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
        url:"photos/upload.php",
        type: "POST",
        data:{"image": response,},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>

<script type="text/javascript">
  function formSubmit(){
    $.ajax({
      type: 'POST',
      url: 'photos/upload.php',
      data: $('#frmbox').serialize(),
      success: function(response){
        $('#success').html(response);
      }
    });
    var form= document.getElementById('frmbox').reset();
    return false;
  }
</script>

 <script type="text/javascript">
  document.cookie="id=<?= $_GET['article']; ?>";
    setInterval('liste_user()',500);
      function liste_user(article)
      {
        $('#liste').load('photos/photo.php');
      }
  </script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
