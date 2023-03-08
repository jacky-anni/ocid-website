<div class="c-cart-menu">
<?php if(Fonctions::user()->id): ?>
	<div>
		<ul class="c-content-recent-posts-1">
		<li>
			<div class="c-image">
				<img src="<?= $link_admin ?>/dist/img/user/participant/<?= Fonctions::user()->photo ?>" onerror="this.src='https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1214428300?k=20&m=1214428300&s=170667a&w=0&h=NPyJe8rXdOnLZDSSCdLvLWOtIeC9HjbWFIx8wg5nIks='"" alt="" class="img-responsive img-thumbnail">
			</div>
			<div class="c-post">

				<div>
					<h2 style="font-weight: bold;"><?= Fonctions::user()->prenom ?>  <?= Fonctions::user()->nom ?></h2>
				</div>
				
				<div class="c-date" style="font-size: 13px;"><?= Fonctions::user()->email ?></div>
			</div>
		</li>
	</ul>
	</div>

	<div>
		<ul class="c-content-recent-posts-1">
			<li>
				<div class="c-post">
					<a href="<?= $link_menu ?>/profile" class="c-title" style="font-size: 15px;"> <i class="fa fa-user"></i> Mon profile</a>
				</div>
			</li>

			<li>
				<div class="c-post">
				<a href="<?= $link_menu ?>/tableau-de-bord" class="c-title" style="font-size: 15px;"> <i class="fa fa-dashboard"></i> Tableau de bord</a>
				</div>
			</li>

			<li>
				<div class="c-post">
					<a href="<?= $link_menu ?>/dossiers" class="c-title" style="font-size: 15px;"> <i class="fa fa-folder"></i> Mes dossiers</a>
				</div>
			</li>

			<li>
				<div class="c-post">
					<a href="#" class="c-title" style="font-size: 15px;"> <i class="fa fa-bell"></i> Notifications (0)</a>
				</div>
			</li>

			

			<li>
				<div class="c-post">
					<a href="<?= $link_menu ?>/deconnexion" class="c-title" style="font-size: 15px;"> <i class="fa fa-sign-out"></i> Déconnexion</a>
				</div>
			</li>

		</ul>
	</div>


 <?php endif ?>
</div>

<style type="text/css">
	.c-menu ul li a {
		padding: 20px;
	}
</style>