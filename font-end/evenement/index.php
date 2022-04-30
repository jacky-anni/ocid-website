<?php include('font-end/layout/head.php'); ?>
 <?php head("Evènements","Observatoire Citoyen pour l’Institutionnalisation de la Démocratie",""); ?>
<!DOCTYPE html>
<?php 
	include('admin/class/Evenement.php');
?>
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
<?php banner("Evènements"); ?>

<div class="container">
    <div class="c-layout-sidebar-menu c-theme ">
    <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
        <div class="c-sidebar-menu-toggler">
            <h3 class="c-title c-font-uppercase c-font-bold"><br><hr></h3>
            <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                <button class="btn btn-primary"><h3 style="color:white;"><b> <i class="fa fa-calendar"></i> Classification par mois</b></h3></button>
                <!-- Mois de <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span> -->
            </a>
        </div>

                <ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
                    <li class="c-dropdown c-open">
                        <a href="javascript:;" class="c-toggler">Affichage par mois<span class="c-arrow"></span></a>
                        <ul class="c-dropdown-menu">
                            <li class="c-active">
                                <a href="<?= $link_menu ?>/evenements/1">Janvier</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/2">Février</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/3">Mars</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/4">Avril</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/5">Mai</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/6">Juin</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/7">Juillet</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/8">Aout</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/9">Septembre</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/10">Octobre</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/11">Novembre</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements/12">Décembre</a>
                            </li>

                            <li class="">
                                <a href="<?= $link_menu ?>/evenements">Tous les mois</a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- END: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
			 </div>
			<div class="c-layout-sidebar-content ">
                <div class="row c-margin-b-40">
                    <div class="c-content-product-2 c-bg-white">
                    <?php if(isset($url[1])){ ?>
                        <?php foreach(Evenement::mois($url[1]) as $event): ?>
                            <div class="col-md-12" >
                                <div class="c-info-list" style="border:1px solid silver; padding:10px;">
                                    <h3 class="c-title c-font-bold c-font-22 c-font-dark">
                                        <a class="c-theme-link"><?= $event->titre ?></a>
                                    </h3>
                                    <p class="c-order-date c-font-18 c-font-thin c-theme-font"><b><?= Fonctions::format_date($event->date_event); ?></b></p>
                                    <p class="c-desc c-font-16 c-font-thin"><?= $event->description ?></p>
                                    <p style="background-color:#32c5d2; padding:3px; color:white; "> <i class="fa fa-home"></i> <?=  $event->lieu?></p>
                                    <p class="c-price c-font-20 c-font-thin"><i class="fa fa-hour"></i> <?=  $event->heure?></p>
                                    <p class="c-payment-type c-font-14" style="color:red;">
                                        <i>
                                        <?php
                                            $jours= Fonctions::calcul_jour('evenement','date_event','NOW()',$event->id);
                                            if ($jours>1) {
                                            echo " Dans  ".$jours."  jours  ";
                                            }elseif ($jours==1) {
                                            echo " Dans  ".$jours."  jour ";
                                            }
                                            elseif ($jours==0) {
                                            echo "Aujourd'hui";
                                            }else{
                                            echo "Terminé";
                                            }
                                        ?>
                                        </i>
                                </p>
                                </div>
                                <hr>
                            </div>
                            <?php endforeach; ?>
                        <?php }else{ ?>
                        <?php foreach(Query::liste ('evenement', 10) as $event): ?>
                        <div class="col-md-12" >
                            <div class="c-info-list" style="border:1px solid silver; padding:10px;">
                                <h3 class="c-title c-font-bold c-font-22 c-font-dark">
                                    <a class="c-theme-link"><?= $event->titre ?></a>
                                </h3>
                                <p class="c-order-date c-font-18 c-font-thin c-theme-font"><b><?= Fonctions::format_date($event->date_event); ?></b></p>
                                <p class="c-desc c-font-16 c-font-thin"><?= $event->description ?></p>
                                <p style="background-color:#32c5d2; padding:3px; color:white; "> <i class="fa fa-home"></i> <?=  $event->lieu?></p>
                                <p class="c-price c-font-20 c-font-thin"><i class="fa fa-hour"></i> <?=  $event->heure?></p>
                                <p class="c-payment-type c-font-14" style="color:red;">
                                    <i>
                                    <?php
                                        $jours= Fonctions::calcul_jour('evenement','date_event','NOW()',$event->id);
                                        if ($jours>1) {
                                        echo " Dans  ".$jours."  jours  ";
                                        }elseif ($jours==1) {
                                        echo " Dans  ".$jours."  jour ";
                                        }
                                        elseif ($jours==0) {
                                        echo "Aujourd'hui";
                                        }else{
                                        echo "Terminé";
                                        }
                                    ?>
                                    </i>
                               </p>
                            </div>
                            <hr>
                        </div>
                        <?php endforeach; ?>
                    <?php } ?>
                    </div>
                </div>

			<!-- END: PAGE CONTENT -->
			</div>
		</div>
	</div>

<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
<style>
    ul li{
        font-weight:bold;
    }
</style>