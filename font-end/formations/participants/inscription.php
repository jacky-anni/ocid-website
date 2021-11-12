<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Participant_Pol.php'); ?>

<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<?php
	$formation= Query::affiche('formation',$url[1],'id');
	if(!$formation){
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}

	// verifier si la l'inscription est terminé
	if($formation AND $formation->inscription ==0){
		echo "<script>window.location ='$link_menu/inscription_/$formation->id';</script>";
	}
 ?>
<title>Inscription | <?= $org->sigle ?></title>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>
<div class="c-layout-page">
<?php include('font-end/layout/banner.php');?>
<?php banner('Inscription'); ?>
<?php include('font-end/formations/banner.php'); ?>

	<div class="container">
		<?php include('admin/includes/flash.php'); ?>
			<div class="row">


			  <?php if($formation->type==2 AND !isset($_GET['form'])): ?>
					<h3 class="c-font-bold c-font-uppercase c-font-24" style="color: #26a8b4;">FORMULAIRE  D’INSCRIPTION</h3>
					<h3 class="c-font-bo c-font-19" style="margin-bottom: -20px;">Qui êtes-vous ? </h3>
					<?php include('admin/includes/flash.php'); ?>
					<div class="c-content-box c-size-md " style="height:70px; display: block;">
						<div class="container " style="display:block; float: left;">
							<div class="c-content-bar-2 c-opt-1">
								<div class="row c-bg-grey-1" data-auto-height="true" style="padding:10px;">
									<div class="col-md-6" style="background-color:#26a8b4;;">
										<a href="<?= $link_menu?>/inscription/<?= $formation->id ?>&form=formation1">
											<div class="c-content-v-center c-bg-resd" data-height="height">
												<div class="c-wrapper">
													<div class="c-body">
														<h3 class="c-font-white c-font-bold">Un-e Certifié-e du programme de formation en Socialisation politique et débat argumenté de l’OCID ?  </h3>
													</div>
												</div>
											</div>
										</a>
										
									</div>

									<a href="<?= $link_menu?>/inscription/<?= $formation->id ?>&form=formation2">
										<div class="col-md-6" style="background-color:#26a8b4;;">
											<div class="c-content-v-center c-bg-red" data-height="height">
												<div class="c-wrapper">
													<div class="c-body">
														<h3 class="c-font-white c-font-bold">un-e cadre d’un parti politique ou d’une organisation de la société civile ?.</h3>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div> 
					</div>
				<?php endif ?> 
			<div class="clear" style="clear: both; "></div>



			<?php if(isset($_GET['form']) AND $_GET['form'] == "formation1"){ ?>

				<div class="row" >
					<div class="col-md-12">
					<?php include('inscription/form.php'); ?>
					</div>
					
				</div> 

			<?php }elseif(isset($_GET['form']) AND $_GET['form'] == "formation2"){ ?>
				<div class="row" >
					<div class="col-md-12">
					<?php include('inscription/form_validation.php'); ?>
					</div>
					
				</div>

			<?php } ?>


				
				

				<!-- BEGIN: CONTENT/BARS/BAR-2 -->
				



				
					
				</div>

			<ul class="c-content-recent-posts-1">
			    <li></li>
			 </ul>	<!-- END: ORDER FORM -->
			</div>
	</div>



</div>



<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
