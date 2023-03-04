<?php 
    $participant = Query::affiche('participant', $url[2], 'id');;
?>


<div class="col-md-12">
 <?php if($participant){ ?>
    <h4>Informations supplementaires</h4>
    <form action="" method="post" role="form" data-parsley-validate action="">
        <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label">Domaine d'etude</label>
                    <input type="text" name="niveau" value="<?php if (isset($_POST['niveau'])) {
                        echo $_POST['niveau'];
                    } ?>" class="form-control" data-parsley-maxlength="250" placeholder="Entrer votre nom" required="">
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Universite</label>
                <input type="text" name="universite" value="<?php if (isset($_POST['universite'])) {
                    echo $_POST['universite'];
                } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre nom" required="">
            </div>

            <div class=" form-group col-md-6">
                <label class="control-label">teephone alternatif</label>
                <input type="text" name="telephone2" value="<?php if (isset($_POST['telephone2'])) {
                    echo $_POST['telephone2'];
                } ?>" data-parsley-maxlength="250" class="form-control" placeholder="Entrer votre nom">
            </div>
            </div>
    </form>
 <?php }else{ ?>

   <p class="alert alert-warning">Les informations ne sont pas disponibles</p>

    <?php } ?>



</div>
