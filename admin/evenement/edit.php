  
<div class="modal fade" id="<?= $event->id; ?>" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-edit"></i> Modifier un evènement</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre de l'evènement</label>
              <input type="text" class="form-control" name="titre" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" value="<?= $event->titre; ?>" placeholder="Le titre ici..." required="">
              <input type="hidden" value="<?= $event->id; ?>" name="id">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Decription</label>
              <textarea class="form-control" name="description" id="exampleInputEmail1" rows="4" placeholder="La description ici..."><?= $event->description; ?></textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">date</label>
              <input type="date" class="form-control" name="date" value="<?= $event->date_event; ?>" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250"  required="">
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Heure</label>
              <input type="text" class="form-control" name="heure" value="<?= $event->heure; ?>" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="12h - 2h" required="">
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Lieu</label>
              <input type="texte" class="form-control" name="lieu" id="exampleInputEmail1" maxlength="250" data-parsley-maxlength="250" placeholder="Le lieu de évènement" value="<?= $event->lieu; ?>" required="">
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" name="edit" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Modifier</button>

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
  if (isset($_POST['edit'])) {
  extract($_POST);
    $event = new Evenement($titre,$description,$date,$heure,$lieu);
    $event->modifier($id);
  }

?>