<?php  require 'class/Audio.php'; ?>
<div class="modal fade" id="audio" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-film"></i> Ajouter un audio</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de l'audio</label>
              <input type="text" class="form-control" name="nom" id="exampleInputEmail1" data-parsley-maxlength="254" placeholder="Le titre ici..." required="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Le lien d'integration soundcloud</label>
                <textarea class="form-control" name="lien"  placeholder="<iframe width='1173' height='660' src='https://www.youtube.com/embed/R3fXaeBMgiA' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>" rows='6' required=""></textarea>
              </div>
          </div>

            <div class="row">
              <div class="col-md-12">
                <div class="modal-footer">
                  <button type="submit" name="submit4" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Enregistrer</button>

                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> <i class="fa fa-close"></i> Fermer</button>
                </div>
              </div>
            </div>
       
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
  if (isset($_POST['submit4'])) {
      extract($_POST);
      $video = new Audio($nom,$_GET['module'],$_SESSION['id'],$lien);
      $video->ajouter();
      Fonctions::set_flash('Audio enregistrée avec succès','success');

      if (isset($_GET['article'])) {
        // si c'est video article
        $id=$_GET['article'];
        header("Location:?page=Article&article=$id");
      }elseif($_GET['module']){
        // si c'est video module de formation
        $module=$_GET['module'];
        $formation=$_GET['id'];
        header("Location:?page=module&id=$formation&module=$module");
      }else{
        // si c'est un video comme ca
        header("Location:?page=audios");
      }

      
  }

?>