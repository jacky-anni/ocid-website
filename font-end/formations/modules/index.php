<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Module.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<?php include('admin/class/Quiz.php'); ?>
<?php Fonctions::redirect();?>
<!DOCTYPE html>
<html>
<?php 
	$formation=Query::affiche('formation',$url[1],'id');
	// if (!$formation) {
	// 	Fonctions::set_flash("Cette formation n'existe pas",'warning');
	// 	echo "<script>window.location ='$link_menu/formations';</script>";
	// }

	$check = Formation::formation_suivie_verif($formation->id,$_SESSION['id_user']);
	if($check==0){
		Fonctions::set_flash("Vous n'avez pas suivi cette formation",'warning');
		echo "<script>window.location ='$link_menu/formations';</script>";
	}
?>
<title>Liste des modules - <?= $formation->titre ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>
<div class="c-layout-page">
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;"><?= $formation->titre ?></h3>
			<h3 class=" c-font-tlhin" style="color: yellow;">Liste des modules</h3>
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>



<div class="c-content-box c-size-md">
	<div class="container">
		<div class="row c-page-faq-2">
			<div class="c-page-title c-pull-left">
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
		    <div class="col-sm-12">
				<?php $today = date("Y-m-d"); ?>
				<?php if($formation->date_debut <= $today){ ?>
			    <?php include('partials/modules.php'); ?>
			    <div class="alert alert-success alert-sm alert-dismissible" role="alert">
					 <a class="c-font-slim" href="<?= $link_menu ?>/releve-note/<?= $formation->id ?>">Voir les résultats ? </a>.
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
				</div>
				<?php }else{ ?>

					<p class="alert alert-success alert-sm "><b>Date début : </b> <?= Fonctions::format_date($formation->date_debut) ?> </p>


					<?php } ?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	ul li
	{
		list-style-type: none;
	}
</style>

<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script>
	function myFunction() {
	  alert("Terminer le module précédent pour avoir accès à ce fichier");
	  
	}
</script>


</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
