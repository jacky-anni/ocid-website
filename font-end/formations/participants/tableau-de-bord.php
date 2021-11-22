<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php Fonctions::redirect();?>
<!DOCTYPE html>
<html lang="en"  >
<title>Formations | <?= $org->sigle ?></title>

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
	<?php banner('Tableau de bord'); ?>

	<div class="container">
		<div class="c-layout-sidebar-content ">
		<!-- BEGIN: PAGE CONTENT -->
		<!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY -->

		<div class="c-content-feature-10">
			<!-- End-->
			<ul class="c-list">
				<li>
					<div class="c-card c-font-right wow animate fadeInLeft">
						<i class="fa fa-file c-font-27 c-theme-font c-float-right c-border c-border-opacity"></i>
						<div class="c-content c-content-right">
							<h3 class="c-font-uppercase c-font-bold">Formations</h3>
							<p>
								Liste de mes formations
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2"></div>
				</li>
				<div class="c-border-middle c-bg-opacity-2"></div>
			</ul>
	
		</div>

		<?php include('admin/includes/flash.php'); ?>
		<?php include('font-end/formations/participants/formations_suivies.php') ?>
		
		</div>
	</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
