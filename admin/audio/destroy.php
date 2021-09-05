<div id="<?= $audio->id;?>26" class="modal fade" tabindex="-1" >
	<center>
	<div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
		<div class="modal-content">
			<form method="POST" action="">
			<div class="modal-body">
				<center>
					<p><img src="dist/img/icon/icons8_Minus_48px_1.png"></p>
					<h5 class="smaller lighter blue no-margin"><b> Supprimer cet audio ?</b></h5>
				<input type="hidden" name="id" value="<?= $audio->id ?>">
				</center>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-sm btn-danger btn-round pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Annuler
				</button>

				<button type="submit" name="supprimer" class="btn btn-sm btn-success btn-round pull-left">
					<i class="ace-icon fa fa fa-trash-o"></i>
				  Supprimer
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</center>
</div>

	<?php
		//pour supprimer une photo
		if (isset($_POST['supprimer'])) {
			Query::supprimer('audio',$_POST['id']);
			Fonctions::set_flash("Video supprimée avec succès","success");

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
		        header("Location:?page=Audio");
		      }
			
		}
	?>