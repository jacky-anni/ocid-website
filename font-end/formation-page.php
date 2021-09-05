
<!-- BEGIN: CONTENT/SHOPS/SHOP-2-1 -->
<!-- <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space">
	<div class="container">
		<div class="c-content-title-4">
			<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">Découvrir nos formations</span></h3>
		</div>
		<?php foreach (Query::liste_prepare('formation','En ligne','etat') as $formation): ?>
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
									<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>" style="font-size: 18px; font-weight: bold; text-align: center;"><?= $formation->titre ?> </a>
								</div>
								<div class="c-author">
									<span style="text-align: justify-all;"><?= substr($formation->description, 0,150) ?>..</span>
								</div>

								<div class="c-panel" style="margin-bottom: -25px;">
									<ul class="c-tags c-theme-ul-bg">
										<li><a href="" style="color: black; font-weight: bold;"> <i class="fa fa-user"></i>  <?=  $participants_ =Query::count_prepare('formation_suivie',$formation->id,'id_formation') ?> <?php if($participants_>1){echo "Participants";}else{echo "Participant";} ?></a></li>
										
										<li><a href="" style="color: black; font-weight: bold;"> <i class="fa fa-list"></i> <?=  $module_ =Query::count_prepare('module_formation',$formation->id,'id_formation') ?> <?php if($module_>1){echo "Modules";}else{echo "Module";} ?></a></li>
									</ul>							
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<?php endforeach ?>
	</div>
</div> -->
