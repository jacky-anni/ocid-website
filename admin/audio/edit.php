
<div class="modal fade" id="<?= $audio->id ?>25" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-edit"></i> Modifier cet audio</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de la audio</label>
              <input type="text" value="<?= $audio->nom;?>" class="form-control" name="nom" data-parsley-maxlength="254" id="exampleInputEmail1" placeholder="Le titre ici..." required="">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Le lien d'integration soundcloud</label>
              <textarea class="form-control" name="lien"  placeholder="<iframe width='1173' height='660' src='https://www.youtube.com/embed/R3fXaeBMgiA' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>s" rows="6" required=""><?= $audio->lien;?></textarea> 
            </div>
            <input type="hidden" name="id_audio" value="<?= $audio->id?>">
        </div><br>
        <div class="modal-footer">
          <button type="submit" name="modifier" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Modifier</button>

          <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> <i class="fa fa-close"></i> Fermer</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
  if (isset($_POST['modifier'])) {
      extract($_POST);
      $audio = new Audio($nom,$_GET['module'],$_SESSION['id'],$lien);
      $audio->modifier($id_audio);
       Fonctions::set_flash('Audio modifiée','success');
       if (isset($_GET['article'])) {
        // si c'est audio article
        $id=$_GET['article'];
        header("Location:?page=Article&article=$id");
      }elseif($_GET['module']){
        // si c'est audio module de formation
        $module=$_GET['module'];
        $formation=$_GET['id'];
        header("Location:?page=module&id=$formation&module=$module");
      }else{
        // si c'est un audio comme ca
        header("Location:?page=Audios");
      }
  }

?>