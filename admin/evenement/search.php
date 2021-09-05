 <div class="col-md-3">
    <div class="box-header">
        <h3 class="box-title">Selectionner une période</h3>
      </div>
      <div class="box-body">
        <!-- Date -->
        <form action="" method="POST" >
        <div class="col-md-12">
          <div class="form-group">
            <label>Date début:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" name="date_debut" value="<?php if(isset($date_debut)){echo $date_debut;} ?>" class="form-control pull-right" required id="datepicker">
            </div>
            <!-- /.input group -->
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label>Date de fin:</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" name="date_fin" value="<?php if(isset($date_fin)){echo $date_fin;} ?>" class="form-control pull-right" required id="datepicker">
            </div>
            <!-- /.input group -->
          </div>
        </div>

         <div class="col-md-12">
          <center>
          <div class="form-group">
            <button type="submit" name="rechercher" class="btn btn-primary btn-block"> <i class="fa fa-search-plus"></i> Rechercher</button>
          </div>
          </center>
        </div>
        </form>
      </div>

      <?php
        if(isset($_POST['rechercher'])){
          extract($_POST);
          header("Location:?page=evènements&date_debut=$date_debut&date_fin=$date_fin");
        }
      ?>
      <!-- /.box-body -->
</div>