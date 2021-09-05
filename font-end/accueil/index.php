<?php include('font-end/layout/head.php'); ?>
<title>Acceuil</title>
<!DOCTYPE html>
<html lang="en"  >
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>

<div class="c-layout-page">
	<?php include('font-end/layout/slide.php'); ?>

		<!-- BEGIN: CONTENT/BARS/BAR-3 -->
<!-- 		<div class="c-content-box c-size-md" style="background-color: #30c4d2;margin-top:0px; z-index: 11111111111111;">
			<div class="container">
				<div class="c-content-bar-3">
					<div class="row">
						<div class="col-md-7">
							<div class="c-content-title-1">
								<h3 class=" c-font-bold" style="line-height:30px;">L’Observatoire Citoyen pour l’Institutionnalisation de la Démocratie (OCID)</h3>
								<p style="text-transform: none; margin-top:-15px; font-weig:bold;">Un consortium d’organisations de la société civile formé de l’Initiative de la Société Civile (ISC), du Centre Œcuménique de Droits Humains (CEDH) et de JURIMEDIA.</p>
							</div>
						</div>
						<div class="col-md-3 col-md-offset-2">
							<div class="c-content-v-center" style="height: 90px;">
								<div class="c-wrapper">
									<div class="c-body">
										<button type="button" class="btn btn-md c-btn-square c-btn-border-2x c-txheme-btn c-btn-uppercase c-btn-bold"> <i class="fa fa-plus"></i> Voir plus...</button>
									</div>
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div> 
		</div> -->

		<br/>

		<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1" style="margin-bottom: 0px; background-color: white;">
			<div class="col-md-3 col-sm-6">
				<div class="c-content-feature-2" data-height="height">
					<div class="c-icon-wrapper">
						<div class="c-content-line-icon c-theme">
						<img src="<?= $link ?>/assets/base/img/icon/icons8_Charity_96px_1.png" style="width:75px; margin-top:-10px;" >
						</div>
					</div>
					<!-- <h3 class="c-font-uppercase c-font-bold c-title">Web Design</h3> -->
					<h4 style="line-height:25px;">Le monitoring de la participation citoyenne</h4>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="c-content-feature-2" data-height="height" style="padding:29px;">
					<div class="c-icon-wrapper">
						<div class="c-content-line-icon c-theme">
							<img src="<?= $link ?>/assets/base/img/icon/icons8_Process_100px.png" style="width:65px; margin-top:-5px;" >
						</div>
					</div>
					<!-- <h3 class="c-font-uppercase c-font-bold c-title">Web Design</h3> -->
					<h4 style="line-height:25px;">Le suivi des institutions et des processus politiques  </h4><br>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="c-content-feature-2" data-height="height" style="padding:29px;">
					<div class="c-icon-wrapper">
						<div class="c-content-line-icon c-theme">
							<img src="<?= $link ?>/assets/base/img/icon/icons8_Elections_100px.png" style="width:75px; margin-top:-10px;" >
						</div>
					</div>
					<!-- <h4 class=" c-font-bold c-title" style="font-size:17px;">L’observation de la compétition politique (élections)</h4> -->
					<h4 style="line-height:25px;">L’observation de la compétition politique (élections) </h4><br>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="c-content-feature-2" data-height="height" style="padding:27px;" >
					<div class="c-icon-wrapper">
						<div class="c-content-line-icon c-theme">
						<img src="<?= $link ?>/assets/base/img/icon/icons8_Commercial_100px.png" style="width:75px; margin-top:-5px;" >
						</div>
					</div>
					<!-- <h3 class="c-font-uppercase c-font-bold c-title">Web Design</h3> -->
					<h4 style="line-height:25px;">Le plaidoyer en faveur de politiques publiques cohérentes, justes et efficaces. </h4>
				</div>
			</div>
			
		</div>


		<div class="c-content-box c-size-lg" >
			<div class="container" style="background-color:white;">
				<div class="">
					<div class="row">
						<div class="col-md-7">
							<div class="c-content-feature-5">
								<div class="c-content-title-1 wow amimate fadeInDown">
									<h3 class="c-left c-font-dark c-font-uppercase c-font-bold">Mission</h3>
									<div class="c-line-left c-bg-blue-3 c-theme-bg"></div>
								</div>
								<div class="c-text wow animate fadeInLeft">
									<h4 style="line-height:25px;width:100%; font-weight:500;">Promouvoir la participation de la société civile haïtienne au renforcement de la gouvernance démocratique.</h4>
								</div>
								<a href="<?= $link_menu ?>/a-propos">
									<button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">A propos</button>
								</a>
								<img class="c-photo img-responsive wow animate fadeInUp" width="475" alt="" src="<?= $link ?>/assets/base/img/layout/temp.jpg"/>
							</div>
						</div>
						<div class="col-md-5">
							Il œuvre depuis sa création en janvier 2015 pour la consolidation de la 
							démocratie en Haïti et, en particulier, pour l’instauration d’un système
							 électoral garantissant aux citoyens et citoyennes haïtiens la possibilité 
							 de pouvoir choisir librement et démocratiquement leurs dirigeants.

							 

							<ul class="c-content-list-1 c-theme">
								<p><b>Valeurs: </b></p>
							 	<li>Responsabilité et vigilance citoyenne ; </li>
							 	<li> 	Exercice des libertés démocratiques et défense des droits de la personne ;  </li>
							 	<li>Indépendance et esprit critique ;  </li>
							 	<li>Recherche du bien commun, engagement civique. </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="c-content-box c-size-md c-bg-white">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 wow animate fadeInLeft">						
						<!-- Begin: Title 1 component -->
						<div class="c-content-title-1">
							<h3 class="c-font-bold">Actualités</h3>
							<div class="c-line-left c-theme-bg"></div>
						</div>

						<table id="example" class="display ">
					        <tbody>
					            <?php foreach (Query::liste_prepare ('publication','En ligne','etat',4) as $publication): ?>
					            <tr>
					                <td>
										<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="margin-bottom: -30px;">
											<div class="row c-margin-b-40">
												<div class="c-content-product-2">
													<div class="col-md-12">
														<div class="c-info-list" style="padding:10px;">
															<h4 class="c-title c-font-17">
																<a class="c-theme-link" href="<?= $link_menu ?>/publication/<?= $publication->slug ?>" style="line-height: 26px; font-weight:500;"><?= $publication->titre ?></a>
															</h4>
															<p><small style="color: #26a8b4;"><?= Fonctions::format_date( $publication->date_post); ?></small></p>
														</div>
													</div>
												</div>
											</div>
										</div>
					                </td>
					            </tr>
					            <?php endforeach ?>
					        </tbody>
					    </table>

					</div>
					<div class="col-sm-6 wow animate fadeInRight">
						<div class="c-content-tab-4 c-opt-3" role="tabpanel">
							<ul class="nav nav-justified" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab-31" role="tab" data-toggle="tab" class="c-font-16">Activités</a>
								</li>
								<li role="presentation">
									<a href="#tab-32" role="tab" data-toggle="tab" class="c-font-16">Evènements</a>
								</li>
							</ul>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="tab-31">
									<ul class="c-tab-items">
										 <?php foreach (Query::liste_prepare ('article','En ligne','etat',4) as $article): ?>
											<li class="row">
												<div class="col-sm-4 col-xs-5">
													<div class="c-photo">
														<img class="img-responsive" width="150" height="100" src="<?= $link_admin ?>/dist/img/article/<?= $article->photo ?>"  alt=""/>
													</div>
												</div>
												<div class="col-sm-8 col-xs-7">
													<p class="c-font-16"><a href="<?= $link_menu ?>/activite/<?= $article->slug ?>"><?= substr($article->titre, 0,100) ?>...</a></p>
													<small style="color: #26a8b4;"><?= Fonctions::format_date( $article->date_post); ?></small>
												</div>
											</li><hr>
										 <?php endforeach ?>
									
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tab-32">
									<table id="example" class="display ">
								        <tbody>
								            <?php foreach (Query::liste ('evenement',4) as $event): ?>
								            <tr>
								                <td>
													<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="margin-bottom: -30px;">
														<div class="row c-margin-b-40">
															<div class="c-content-product-2">
																<div class="col-md-12">
																	<div class="c-info-list" style="padding:10px;">
																		<h4 class="c-title c-font-17">
																			<a class="c-theme-link" style="line-height: 29px; font-weight: 500;"><?= $event->titre ?></a>
																		</h4>
																		<p>
																			<small style="color: #26a8b4; font-weight: bold;">  <span style="color:red;"><i class="fa fa-calendar"></i> <?= Fonctions::format_date( $event->date_event); ?></span> - <i class="fa fa-home"></i> <?= $event->lieu; ?> - <span style="color:black;"><i class="fa fa-clock"></i> <?=$event->heure; ?></span></small>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
								                </td>
								            </tr></hr>
								            <?php endforeach ?>
								        </tbody>
								    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>

				<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
					<div class="container">
						<div class="c-content-title-4">
							<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1" style="text-align: center;">Découvrir nos formations</span></h3><hr>
						</div>

							<?php foreach (Query::liste_prepare('formation','En ligne','etat',1) as $formations): ?>
							<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="padding: 10px; background-color: white;">
								<div class="row c-margin-b-40">
									<div class="c-content-product-2">
										<div class="col-md-4">
											<div class="c-content-overlay">
												<div class="c-bg-img-center c-overlay-object img-rounded" data-height="height" style="height: 230px; background-image: url(<?= $link ?>/assets/base/img/layout/formation-template.jpg);"></div>
											</div>
										</div>
										<div class="col-md-8">
											<div class="c-info-list">
												<h3 class="c-title c-font-bold c-font-22">
													<a class="c-theme-link" href="<?= $link_menu ?>/formation/<?= $formations->id ?>" style="line-height: 29px;"><?= $formations->titre ?></a>
												</h3>
												<p><?= substr($formations->description, 0,150) ?>...</p>
												
												<?php if($formations->certificat=='Oui'){?>
													<p class="c-payment-type c-font-14 c-font-bold"> <i class="fa fa-certificate"></i> Certificat gratuit
													</p>
												<?php }else{ ?>
														<p class="c-payment-type c-font-14 c-font-bold"> <i class="fa fa-certificate"></i> Pas de certificat
													</p>
												<?php } ?>
												<p><small style="color: #26a8b4;"><?php $suivie= Query::count_prepare('formation_suivie',$formations->id,'id_formation'); ?> <?php if($suivie<1){echo "$suivie Participant";}elseif($suivie==1){echo "$suivie Personne suit cette formation";}else{echo "$suivie Personnes suivent cette formation";} ?></small></p>
												
											</div>
											<p class="c-price c-font-26 c-font-thin">
												<a href="<?= $link_menu ?>/formation/<?= $formations->id ?>">
													<button class="btn btn-sm c-theme-btn c-btn-bold"> <i class="fa fa-plus"></i> Voir le cours</button>
												</a>

												<?php
													if(isset($_SESSION['id_user'])){
												?>
												<a href="<?= $link_menu ?>/cours/<?= $formations->id ?>">
													<button class="btn btn-primary btn-sm c-btn-bold"> <i class="fa fa-sign-in"></i> Suivre le cours</button>
												</a>
												<?php } ?>

												
												</p>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach ?>
					</div>
				</div>
			</div>
			 
			</div>
	        <!-- End-->
	    </div>
	    <!-- End-->
	</div>
</div><!-- END: CONTENT/BLOG/RECENT-POSTS -->


<!-- BEGIN: CONTENT/SLIDERS/CLIENT-LOGOS-2 -->
<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-testsimonials-4" data-slider="owl">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Nos PArtenaires</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>

			<div class="owl-carousel c-theme c-owl-nav-center" data-single-item="true" data-navigation-label="true" data-slide-speed="5000" data-rtl="false" style="margin-bottom:-120px;">
				<div class="item">
					<div class="c-content-testimonial-4" >
					<!-- 	<div class="c-content">
							Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat diam dolor sit amet consectetuer adipiscing elit
						</div> -->
						<div class="c-person">
							<center>
								<img src="<?= $link ?>/assets/base/img/partenaire/ned.png" style="width:150px;" class="img-responsive">
								<div class="c-person-detail c-font-uppercase">
									<h4 class="c-name">National Democratic Institute</h4>
									<p class="c-position c-font-bold c-theme-font">NDI</p>
								</div>
							</center>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="c-content-testimonial-4">
						<div class="c-person">
							<center>
								<img src="<?= $link ?>/assets/base/img/partenaire/ndi.jpg" style="width:150px;" class="img-responsive">
								<div class="c-person-detail c-font-uppercase">
									<h4 class="c-name">NATIONAL ENDOWMENT FOR DEMOCRACY</h4>
									<p class="c-position c-font-bold c-theme-font">NED</p>
								</div>
							</center>
						</div>
					</div>
				</div>
			</div>



	    </div>
	    <!-- End-->
	</div>
</div><!-- END: CONTENT/SLIDERS/CLIENT-LOGOS-2 -->

</div>







<?php include('font-end/layout/footer.php'); ?>
<script src="<?= $link ?>/assets/plugins/jquery.min.js" type="text/javascript"></script>
<?php include('font-end/layout/script.php'); ?>

	</script>
	<!-- END: THEME SCRIPTS -->

			<!-- BEGIN: PAGE SCRIPTS -->
	<script>
			$(document).ready(function() {
    var slider = $('.c-layout-revo-slider .tp-banner');

    var cont = $('.c-layout-revo-slider .tp-banner-container');

    var api = slider.show().revolution({
        sliderType:"standard",
        sliderLayout:"fullscreen",
        responsiveLevels:[2048,1024,778,320],
        gridwidth: [1240, 1024, 778, 320],
        gridheight: [868, 768, 960, 720],
        delay: 15000,    
        startwidth:1170,
        startheight: App.getViewPort().height,

        navigationType: "hide",
        navigationArrows: "solo",

        touchenabled: "on",

        navigation: {
            keyboardNavigation:"off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation:"off",
            onHoverStop:"on",
            bullets: {
                style:"round",
                enable:true,
                hide_onmobile:false,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                hide_under:0,
                hide_over:9999,
                direction:"horizontal",
                h_align:"right",
                v_align:"bottom",
                space:5,
                h_offset:60,
                v_offset:60,

            },
        },

        spinner: "spinner2",

        fullScreenOffsetContainer: '.c-layout-header',

        shadow: 0,

        hideTimerBar:"on",

        hideThumbsOnMobile: "on",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "on",
        hideArrowsOnMobile: "on",
        hideThumbsUnderResolution: 0
    });
}); //ready	
			</script>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
