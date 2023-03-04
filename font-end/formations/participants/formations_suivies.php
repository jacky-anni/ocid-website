
<?php foreach (Query::liste_prepare('formation_suivie',$_SESSION['id_user'],'id_participant') as $formations): ?>
	
  <?php 
	$formation=Query::affiche('formation',$formations->id_formation,'id');
	$module_total= Query::count_prepare('module_formation',$formation->id,'id_formation');

    // verifier la quantite de quiz passe
	$module_total = Module::count($formation->id);
	$module_passe= Quiz::pass_module($_SESSION['id_user'],$formation->id);
	if($module_passe > $module_total){
		$module_passe = $module_total;
	}

	$note =0;

	// verifi si le modue passe est egal a 0
	if ($module_passe>0) {
		// pourcentage de module passe;
		$note= number_format($module_passe/$module_total*100);
		if($note>100){
			$note=100;
		}
	}
 ?>
<div class="row">
<div class="col-md-4">
	<div class="item">
  		<div class="c-content-blog-post-card-1 c-option-2">		
  			<div class="c-media c-content-overlay">
  				<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>">
  					<img class="c-overlay-object img-responsive" src="<?= $link ?>/assets/base/img/layout/formation-template.jpg" alt="">
  				</a>
  			</div>
  			<div class="c-body">
	  			<div class="c-title c-font-bold">
	  				<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>" style="font-size: 15px; font-weight: bold; text-align: center;"><?= $formation->titre ?> </a>
	  			</div>
	  			<div class="c-author">
	  				<span >Ajouté le:</span>
	  				<span>  <?= Fonctions::format_date($formation->date_post) ?></span>
	  			</div>

	  			<div class="c-panel">							
					<div class="c-comments"><a href="#"><i class="icon-speech"></i> <?= $module_passe ?>/<?= $module_total ?> <?php if($module_total>1){echo "Modules";}else{echo "Module";} ?></a></div>
				</div>

			

                 <div class="progress">
				  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?= $note ?>%; background-color: #00a65a;">
				    	<?= $note ?>%  
				  	</div>
				</div> 

                <div class="c-panel" style="margin-bottom: -25px;">
					<ul class="c-tags c-theme-ul-bg">
						<li><a href="<?= $link_menu ?>/releve-note/<?= $formation->id ?>" target="_blank" style="color: black; font-weight: bold;">Notes</a></li>

						<?php if($module_passe!=$module_total and $formation->fermeture == 0 and $formation->certificat_livre==1): ?>
							<li><a href="<?= $link_menu ?>/attestation/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?>" style="color: black; font-weight: bold; " target="_blank"> <i class="fa fa-file"></i> Attestation</a></li>
						<?php endif ?>

						<?php if($module_passe==$module_total and $formation->fermeture == 0 and $formation->certificat_livre==1): ?>
							<li><a href="<?= $link_menu ?>/certificat/<?= $formation->id ?>/<?= $_SESSION['id_user'] ?>" style="color: black; font-weight: bold;" target="_blank"> <i class="fa fa-certificate"></i> Certificat</a></li>
						<?php endif ?>
					</ul>							
				</div>
				
            </div>

            <small>
				<?php if($module_passe!=$module_total): ?>
					<p class="alert alert-info" style=" padding: 3px; color: black; text-align: center;"><b> <i class="fa fa-close"></i> Terminer le cours pour obtenir votre certificat</b></p>
				<?php endif ?>

				<?php if($module_passe==$module_total): ?>
					<p class="alert alert-info" style=" padding: 3px; color: red; text-align: center;"><b> <i class="fa fa-check"></i> Cours terminé</b></p>
				<?php endif ?>
			</small>
        </div>
  	</div>
</div>
<?php endforeach; ?>
</div>
