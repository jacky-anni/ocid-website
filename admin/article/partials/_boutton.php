
<div class="box-footer box-comments">
	<div class="box-comment">
	  <!-- User image -->
	  <div class="comment-text">
	        <span class="username">

	        	<?php if ($article->etat=='Hors ligne' AND $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=Article&article=<?= $article->id; ?>&statut=<?= trim("En ligne");?>" class="btn btn-default btn-round btn-sm"> <i class="fa fa-share"></i>Mettre public</a>
				<?php endif ?>

				<?php if ($article->etat=='En ligne' AND $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=Article&article=<?= $article->id; ?>&statut=<?= trim('Hors ligne'); ?>" class="btn btn-default btn-round btn-sm"> <i class="ace-icon fa fa-circle gray"></i> Mettre privé</a>
				<?php endif ?>


				<?php if ($article->posteur==$_SESSION['id'] || $_SESSION['droit']=='Administrateur'): ?>
				<a href="?page=Modifier-article&article=<?= $article->id; ?>" class="btn btn-primary btn-round btn-sm"> <i class="fa fa-edit"></i> Modifier le contenue</a>

				  <a class="btn btn-success btn-sm" href="?page=Ajouter-une-photo&article=<?= $article->id ?>"> <i class="fa fa-camera"></i> Modifier l'mage</a>

				<a href="#<?= $article->id;?>"  role="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm" > <i class="fa fa-trash"></i> Supprimer</a>
				<?php endif ?>
	        </span><!-- /.username -->
	  </div>
	  <!-- /.comment-text -->
	</div>
</div>