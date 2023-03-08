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
		<?php include('admin/includes/flash.php'); ?>
			<h2><b>MES FORMATIONS</b></h2> <hr>
			 <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
				<div class="container">
				<div class="c-page-title c-pull-left">
					<h5 class="c-font-uppercase c-font-bold">Bienvenue <?= Fonctions::user()->prenom ?></h5>
					<?php  
						$group = Fonctions::user()->departement;
						$link_group;
						if($group=='Nord' or $group=='Nord-Est'){
							$link_group = "https://chat.whatsapp.com/LLi7SauTlamJOhAwNU1MZ9";
						}elseif ($group=='Artibonite' or $group=='Nord-Ouest' or $group=='Centre'){
							$link_group = "https://chat.whatsapp.com/Gm3bxxRxbYIFQbQtMMt2ze";
						}elseif($group=='Ouest' or $group=='Sud-Est' or $group=='Nippes'){
							$link_group = "https://chat.whatsapp.com/Ft4s6gp3RyTIf0JnXZCNAu";
						}else{
							$link_group = "https://chat.whatsapp.com/FctqJJILdoVKNi3g2nnt9E";
						} 
					?>
					
					<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
						<li><a href="<?= $link_group ?>" target="_blank" style="color:blue; font-weight:bold;"> <i class="fa fa-whatsapp"></i> Interegrez le groupe de la formation</a></li>  
					</ul>
				</div>
				</div>
			</div><hr>
			<?php include('font-end/formations/participants/formations_suivies.php') ?>
		</div>
	</div>


</div>
</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
