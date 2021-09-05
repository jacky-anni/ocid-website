
<div class="box-footer box-comments">
	<div class="box-comment">
	  <!-- User image -->
	  <div class="comment-text">
	        <span class="username">

	        	<?php if ($publication->etat=='Hors ligne' AND $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=publication&publication=<?= $publication->slug; ?>&statut=<?= trim("En ligne");?>" class="btn btn-default btn-round btn-sm"> <i class="fa fa-share"></i>Mettre public</a>
				<?php endif ?>

				<?php if ($publication->etat=='En ligne' AND $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=publication&publication=<?= $publication->slug; ?>&statut=<?= trim('Hors ligne'); ?>" class="btn btn-default btn-round btn-sm"> <i class="ace-icon fa fa-circle gray"></i> Mettre privé</a>
				<?php endif ?>


				<?php if ($publication->posteur==$_SESSION['id'] || $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=modifier-publication&publication=<?= $publication->id; ?>" class="btn btn-primary btn-round btn-sm"> <i class="fa fa-edit"></i> Modifier</a>
				<a href="#<?= $publication->id;?>"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
				<?php endif ?>
	        </span><!-- /.username -->
	  </div>
	  <!-- /.comment-text -->
	</div>
</div>