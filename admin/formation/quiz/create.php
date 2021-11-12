<div class="modal fade" id="quiz" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b> <i class="fa fa-plus"></i> Ajouter un quiz</b></h4>
      </div>
      <form action="" method="POST" role="form" data-parsley-validate action="">
        <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nom du quiz</label>
              <input type="text" class="form-control" name="nom" id="exampleInputEmail1" data-parsley-maxlength="250" placeholder="Le nom ici..." required="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="quiz" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Enregistrer</button>

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
  if (isset($_POST['quiz'])) {
      extract($_POST);
      $quiz=new Quiz($nom,$_GET['module']);
      $quiz->ajouter();
  }

?>