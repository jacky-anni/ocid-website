
<div class="box-footer box-comments">
	<div class="box-comment">
	  <!-- User image -->
	  <div class="comment-text">
	        <span class="username">
			

				<?php if ($formations->etat=='Hors ligne'): ?>
				<a href="?page=formation&formations=<?= $formations->id; ?>&statut=<?= trim("En ligne");?>" class="btn btn-default btn-round btn-sm"> <i class="fa fa-share"></i>Mettre public</a>
				<?php endif ?>

				<?php if ($formations->etat=='En ligne'): ?>
				<a href="?page=formation&formations=<?= $formations->id; ?>&statut=<?= trim('Hors ligne'); ?>" class="btn btn-default btn-round btn-sm"> <i class="ace-icon fa fa-circle gray"></i> Mettre privé</a>
				<?php endif ?>

				<a class="btn btn-primary btn-sm" href="?page=modification-de-formation&formations=<?= $formations->id ?>"> <i class="fa fa-edit"></i> Modifier</a>

				<a href="#<?= $formations->id;?>"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>

	
	        </span><!-- /.username -->
	  </div>
	  <!-- /.comment-text -->
	</div>
</div>