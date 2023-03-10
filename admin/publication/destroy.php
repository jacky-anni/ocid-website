<div id="<?= $publication->id;?>" class="modal fade" tabindex="-1" >
	<center>
	<div class="modal-dialog" style="max-width: 300px; margin-top:180px; ">
		<div class="modal-content">
			<form method="POST" action="">
			<div class="modal-body">
				<center>
					<p><img src="dist/img/icon/icons8_Minus_48px_1.png"></p>
					<h5 class="smaller lighter blue no-margin"><b> Supprimer cet publication ?</b></h5>
					<input type="hidden" name="id" value="<?= $publication->id ?>">
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

			//delete artile
			Query::supprimer('publication',$_POST['id']);

			// supprimer photo publication dans le folder
			Query::supprimer_fichier_one('dist/img/publication/'.$publication->photo);

			// suprimmer toutes les photos lier dans le folder
			// Query::supprimer_fichier('photo','photo/server/uploads/', $publication->id);

			Query::supprimer_fichier_many('photo','reference',$publication->id,'dist/img/photos/');

			// delete photo
			Query::supprimer('photo',$_POST['id'],'reference');

			// delete video
			Query::supprimer('video',$_POST['id'],'reference');

			Fonctions::set_flash("publication supprimé avec succès","success");
			header("Location:?page=publications");
		}
	?>