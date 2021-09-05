<?php include('font-end/layout/head.php'); ?>
<html lang="en">
<?php 
	$offres= Query::affiche('offres',$url['1'],'slug');
	if(!$offres){
		echo "<script>window.location ='$link_menu/not-found';</script>";
	}
 ?>
  <title> Offre d'emploi -  <?= $offres->titre ?></title>
  <meta property="og:title" content="<?= $offres->titre ?>" />
  <meta property="og:url" content="<?= $link_conf.$_SERVER['REQUEST_URI'] ?>" />
  <meta property="og:image" content="<?= $link_conf.$link_admin ?>/dist/img/offre/icons8_New_Job_50px_2.png" />
  <meta property="og:description" content="OCID" />
  <meta property="og:site_name" content="OCID" />

  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ec2fd1d2d5f810012b13181&product=inline-share-buttons' async='async'></script>
  </head>
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
<?php banner("Offre d'emploi"); ?>

<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
	<div class="container">
		<div class="c-shop-order-complete-1 c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
			<div class="c-theme-bg">
				<p class="c-message c-center c-font-white c-font-30 c-font-sbold">
					<b><?= $offres->titre ?></b>
				</p>
			</div>
			<!-- BEGIN: ORDER SUMMARY -->
			<div class="row c-order-summary c-center">
				<ul class="c-list-inline list-inline">
					<li>
						<h3>Domaine:</h3>
						<p><?= $offres->domaine ?></p>
					</li>
					<li>
						<h3>Pays:</h3>
						<p><?= $offres->pays ?></p>
					</li>
					<li>
						<h3>Zone:</h3>
						<p><?= $offres->zone?></p>
					</li>
					<li>
						<h3>Date limite des dépots:</h3>
						<p><?= Fonctions::format_date( $offres->date_limite ); ?> </p>
					</li>
				</ul>
			</div>
			<!-- END: ORDER SUMMARY -->
			<!-- BEGIN: BANK DETAILS -->
			<div class="c-bank-details c-margin-t-30 c-margin-b-30">
				<p class="c-margin-b-20">
					<?= $offres->description ?>
				</p>
				<p style="border:1px silver solid; padding:4px;wid:auto; ">Les candidats doivent déposer leurs dossiers sur <a href="mailto:<?= $offres->email ?>" class="c-theme-color"><?= $offres->email ?></a> </p>
						
			</div>

			<!-- END: BANK DETAILS -->

			<!-- BEGIN: CUSTOMER DETAILS -->
			<div class="c-customer-details row" data-auto-height="true">
				<div class="col-md-12 c-margin-t-20">
					<div data-height="height">
						<h4><b>Pour plus d'informations: </b></h4>
						<ul class="list-unstyled">
							<li><b>Adress:</b> <?= $org->adresse ?></li>
							<li><b>Télephone:</b> <?= $org->telephone ?></li>
							<li><b>Email:</b> <a href="mailto:<?= $org->email?>" class="c-theme-color"><?= $org->email ?></a></li>
						</ul>
					</div>
				</div>
			</div><hr>
			<!-- END: CUSTOMER DETAILS -->

			<center><h4>Partagez</h4></center>
			<div class="sharethis-inline-share-buttons"></div></br>
		</div>
	</div>
</div> 







<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
