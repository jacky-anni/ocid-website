
<div class="modal fade" id="<?= $video->id;?>" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-edit"></i> Modifier cette video</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de la video</label>
              <input type="text" value="<?= $video->nom;?>" class="form-control" name="nom" maxlength="250" data-parsley-maxlength="250" id="exampleInputEmail1" placeholder="Le titre ici..." required="">
            </div>

            <!-- <div class="form-group">
              <label for="exampleInputEmail1">Activités</label>
              <select class="form-control" name="activite">
                 <option  value="Aucune" <?php if($video->reference=='Aucune'){echo "selected";} ?>>Aucune activité</option>
                <?php foreach( Query::liste_prepare ('article',$_SESSION['id'],'posteur') as $article): ?>
                  <option value="<?= $article->id ?>" <?php if($video->reference==$article->id){echo "selected";} ?>><?= substr($article->titre, 0,90); ?>... </option>
                <?php endforeach; ?>
              </select>
            </div> -->

            <div class="form-group">
              <label for="exampleInputEmail1">Le lien d'integration youtube</label>
              <textarea class="form-control" name="lien"  placeholder="<iframe width='1173' height='660' src='https://www.youtube.com/embed/R3fXaeBMgiA' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>s" rows="6" required=""><?= $video->lien;?></textarea> 
            </div>

            <input type="hidden" name="id_video" value="<?= $video->id?>">
        </div>
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
      $video = new Video($nom,$_GET['module'],$_SESSION['id'],$lien);
      $video->modifier($id_video);

      // $article=$_GET['article'];

      // if (isset($article)) {
      //   header("Location:?page=video-activités&article=$article");
      // }else{
      //   header("Location:?page=Videos");
      // }
      // Fonctions::set_flash('Video successfully registered !','success');
  }

?>