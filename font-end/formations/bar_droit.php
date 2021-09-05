<?php include("admin/class/Module.php"); ?>
<div class="col">
	<div class="c-content-title-1 c-theme c-title-md c-margin-t-40" style="margin: 0px;">
		<h5 class="c-font-bold c-font-uppercase alert alert-success" style="background-color: #25a8b4; color: white;">Intervenants</h5>
	</div>
	<div class="c-content-tab-1 c-theme c-margin-t-30">
			<div class="tab-content">
		    	<div class="tab-pane active" id="blog_recent_posts">
		    		<ul class="c-content-recent-posts-1">
		    		<?php foreach (Module::liste_intervenant($formation->id) as $enseignant): ?>
		    			<li>
		    				<div class="c-image">
		    					<img src="<?= $link_admin ?>/dist/img/user/<?= $enseignant->photo ?>" alt="" class="img-responsive img-thumbnail">
		    				</div>
		    				<div class="c-post">
		    					<a href="<?= $link_menu ?>/profil-intervenant/<?= $enseignant->id ?>" class="c-title" style="font-weight: bold;">
		    					<?= $enseignant->prenom ?>  <?= $enseignant->nom ?> 
		    					</a>
		    					<?php $cv=Query::affiche('cv',$enseignant->id,'id_user');?>
		    					<div class="c-date" style="font-size: 13px;"><?= $cv->titre ?></div>
		    				</div>
		    			</li>
		    		<?php endforeach ?>
		    		</ul>
		    	</div>
		  	</div>
	 </div>
</div>
	<h4 class="c-font-uppercase c-title" style="text-align: center; font-weight: bold;">Informations supplementaires</h4><hr/>

	<div class="col-md-12" style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div ><img src="<?= $link ?>/assets/base/img/icon/icons8_Guarantee_50px.png"></div>
			</div>
			<h4 style="font-weight: bold;">Certificat</h4>
			<p style="font-size: 15px;"> S vous terminez le cours entier, vous obtenez un certificat de l'OCID</p>
		</div>
	</div>
	<div class="col-md-12" style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div><img src="<?= $link ?>/assets/base/img/icon/icons8_Pass_Fail_64px.png" style="width: 50px;"></div>
			</div>
			<h3 style="font-weight: bold;">Attestation</h3>
			<p style="font-size: 15px;">Une attestation de participation vous sera delivrée après l'inscription</p>
		</div>
	</div>

	<div class="col-md-12" style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div><img src="<?= $link ?>/assets/base/img/icon/icons8_Calendar_50px.png" style="width: 50px;"></div>
			</div>
			<h3 style="font-weight: bold;">Durée</h3>
			<p style="font-size: 15px;">Ce cours se fera dans <?= Fonctions::duree($formation->date_debut,$formation->date_fin) ?>, du <?= Fonctions::format_date($formation->date_debut); ?> au <?= Fonctions::format_date($formation->date_fin); ?> </p>
		</div>
	</div>


	<div class="col-md-12"  style="margin-bottom: -30px;">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div><a href="<?= $link_admin ?>/dist/document/Esquisse du plan de formation en  Socialisation politique et Debat Argumenté.pdf" target="_blank"><img src="<?= $link ?>/assets/base/img/icon/icons8_PDF_50px_2.png" style="width: 50px;"></a></div>
			</div>
			<a href="<?= $link_admin ?>/dist/document/Esquisse du plan de formation en  Socialisation politique et Debat Argumenté.pdf" target="_blank">
				<h3 style="font-weight: bold;">Syllabus</h3>
				<p style="font-size: 15px;"> <button class="btn btn-primary"> <i class="fa fa-download"></i> Télécharger</button> </p>
			</a>
		</div>
	</div>

 <?php if(!isset($_SESSION['id_user']) AND $url[0]!='inscription'){ ?>
	<div class="col-md-12">
		<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">
			<div class="c-icon-wrapper" style="border: solid white 1px;">
				<div><a href="<?= $link_admin ?>/dist/document/Esquisse du plan de formation en  Socialisation politique et Debat Argumenté.pdf" target="_blank"><img src="<?= $link ?>/assets/base/img/icon/icons8_Internet_50px.png" style="width: 50px;"></a></div>
			</div>
			<a href="<?= $link_menu ?>/inscription/<?= $formation->id?>" target="_blank">
				<h3 style="font-weight: bold;">Inscription</h3>
				<a href="<?= $link_menu ?>/inscription/<?= $formation->id?>"></a>
				<button class="btn btn-primary">S'inscrire</button>
			</a>
		</div>
	</div>
	<?php  } ?>
