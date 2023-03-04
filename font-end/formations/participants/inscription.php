<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
$formation = Query::affiche('formation', $url[1], 'id');
if (!$formation) {
	Fonctions::set_flash("Cette formation n'existe pas", 'warning');
	echo "<script>window.location ='$link_menu/formations';</script>";
}
// verifier si la l'inscription est terminé
if ($formation and $formation->inscription == 0) {
	echo "<script>window.location ='$link_menu/inscription_/$formation->id';</script>";
}
?>
<title>Inscription | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
	<!-- BEGIN: HEADER -->
	<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
		<?php include('font-end/layout/header.php'); ?>
		<?php include('font-end/layout/logo_and_search.php'); ?>
		<?php include('font-end/layout/menu.php'); ?>
		<?php include('font-end/layout/user_bar.php'); ?>
	</header>
	<div class="c-layout-page">
		<?php include('font-end/layout/banner.php'); ?>
		<?php banner('Inscription'); ?>
		<?php include('font-end/formations/banner.php'); ?>

		<div class="container">
		<?php include('admin/includes/flash.php'); ?>
		<div class="row">
			<?php include('inscription/info-personnelles.php') ?>
		</div>
	</div>
	<?php include('font-end/layout/footer.php'); ?>
	<?php include('font-end/layout/script.php'); ?>
</body>


<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->

</html>