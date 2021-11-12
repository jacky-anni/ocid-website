<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
	
	$formation= Query::affiche('formation',$url[1],'id');
	if(!$formation->id){
		Fonctions::set_flash("Cette formation n'existe pas",'warning');
		header("location:$link_menu/formations");
	}
 ?>
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
	<?php banner("Inscription"); ?>

<div class="container">
	<!-- BEGIN: CONTENT/BARS/BAR-1 -->
<div class="c-content-box c-size-md">
	<div class="container">
		<div class="c-content-bar-1 c-opt-1">
			<h3 class="c-font-uppercase c-font-bold"><?= $formation->titre ?></h3>
			<p class="alert alert-danger" style="font-weight: bold;">
				L'inscription est terminée
			</p>
			<a href="<?= $link_menu ?>/cours/<?= $formation->id ?>" class="btn btn-md c-btn-square c-theme-btn c-btn-uppercase c-btn-bold">Suivre le cours</a>
		</div>
	</div> 
</div><!-- END: CONTENT/BARS/BAR-1 -->
</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
