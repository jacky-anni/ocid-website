<?php include('font-end/layout/head.php'); ?>
<?php 
	$article= Query::affiche('article',$url['1'],'slug');
	if(!$article){
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
 ?>
<title>Photos des activités</title>
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
<?php include('font-end/layout/banner.php');?>
<?php banner(""); ?>


<!-- BEGIN: CONTENT/ISOTOPE/GALLERY-5 -->
<div id="c-isotope-anchor-2" class="c-content-box c-size-md c-bg-img-center" style="background-color:#2ec3ce;">
        <div class="c-content-title-1">
            <h3 class="c-center c-font-uppercase c-font-bold c-font-white">Photos</h3>
            <div class="c-line-center c-theme-bg"></div>
        </div>
        <div class="c-content-isotope-filter-2 c-center" style="margin-top:-55px; color:white;">
         <b> <?= $article->titre ?></b>
        </div>
        <div class="c-content-isotope-gallery c-opt-5">
            
        <?php foreach (Query::liste_prepare('photo',$article->id,'reference',8) as $key => $photo): ?>
            <div class="c-content-isotope-item c-isotope-photo">
                <div class="c-content-isotope-image-container">
                    <img class="c-content-isotope-image" src="<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>"/>
                    <div class="c-content-isotope-overlay c-ilightbox-image-5"
                        href="<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>"
                        data-options="thumbnail:'<?= $link_admin ?>/dist/img/photos/<?= $photo->nom ?>'"
                        data-caption="<h4>Photo <?= $key +1?></h4><p><?= $photo->titre ?></p>"
                    >
                        <div class="c-content-isotope-overlay-icon">
                            <p><b> <i class="fa fa-eye c-font-white"></i> Voir plus</b></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>	

            
        </div>
</div><!-- END: CONTENT/ISOTOPE/GALLERY-5 -->





<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
