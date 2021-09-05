<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Formation | <?= $org->sigle ?></title>

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
	<?php banner("Confirmation d'inscription"); ?>

<div class="container">
	<?php include('admin/includes/flash.php'); ?>
	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">
			<div class="c-content-box c-size-md">
	<div class="container">
		<div class="c-content-bar-1 c-opt-1">
			<h3 class="c-font-uppercase c-font-bold">Cours de Socialisation Politique et Débat Argumenté</h3>
			<p class="alert alert-danger" style="font-weight: bold;">
				L'inscription est terminée
			</p>
			<!-- <a href="<?= $link_menu ?>/cours/<?= $formation->id ?>" class="btn btn-md c-btn-square c-theme-btn c-btn-uppercase c-btn-bold">Suivre le cours</a> -->
		</div>
	</div> 
</div><!-- END: CONTENT/BARS/BAR-1 -->



			<?php
				// if (isset($url[1]) AND isset($url[2]) AND isset($url[3])) {

				// 	$formation=
					
				// 	Participant::activation($url[1],$url[2]);
				// 	// formation suivie
				// 	echo "<script>window.location ='$link_menu/inscription/$formation';</script>";
				//     Formation::suivie($url[3],$url[2]);
				// }


			 ?>

			 <?php if (isset($url[1]) AND !isset($url[2]) AND !isset($url[3])):?>
				 <div class="col-md-12">
				 	<div class="" data-height="height">
				 		<?php $user=Query::affiche('participant',$url[1],'id'); ?>
				 		<center>
				 			<div class="c-content-line-icon c-theme c-icon-comment"></div>
				 			<h3 class=" c-font-bold">Inscription réussie</h3>
							<p>Un email de confirmation envoyé sur <b><?= $user->email ?></b></p>
				 		</center>
						
					</div>
				 </div>
			<?php endif ?>
		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->

	<!-- END: PAGE CONTENT -->
	</div>
</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
