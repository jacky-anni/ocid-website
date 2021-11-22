<?php include('font-end/layout/head.php'); ?>
<title>Galerie de videos</title>
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
<?php banner("Galerie de videos"); ?>


<!-- BEGIN: CONTENT/ISOTOPE/GALLERY-5 -->
<div class="c-content-box c-size-md c-bg-white">
    <div class="c-content-box c-overflow-hide c-bs-grid-reset-space">  
     <div class="container">
            <div class="row" >
             <?php foreach (Query::liste('video',49) as $key => $videos): ?>
                <div class="col-md-3">
                    <div>
                        
                        <p style="background:#2dc3ce; width: 95%; marngin-top-20px;">
                            <?= $videos->lien?>
                            <span style="padding:13px; color:black; text-align:center; display:block;height: 90px;font-weight: 500;"><?= substr($videos->nom , 0,80)?><?php if(strlen($videos->nom)>=80){echo "...";} ?></span>
                        </p>
                    </div>

                </div>
            <?php endforeach ?>


           </div>
     </div>

    </div>
</div><!-- END: CONTENT/ISOTOPE/GALLERY-5 -->





<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    
<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
<style type="text/css">
iframe
{
    width: 100%;
    height: 30%;
    margin-bottom: 7px;

}
</style>