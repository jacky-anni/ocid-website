<?php include('font-end/layout/head.php'); ?>
<title>Offres d'emplois</title>
 <?php head("Offres d'emplois","Observatoire Citoyen pour l’Institutionnalisation de la Démocratie",""); ?>

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
<?php banner("Offres d'Emplois"); ?>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<div class="c-content-panel">
			<div class="c-label"><b>Nos offres d'emplois</b></div>
			<?php if(Query::count_query('offres')>=1){ ?>
			<div class="c-body">
				<?php foreach (Query::liste('offres') as $key => $offres): ?>
					<p style="font-weight:bodld">
						<div class="row">
<!-- 							<div class="col-md-2">
								 <img src="<?= $link ?>/assets/base/img/icon/icons8_New_Job_50px_1.png" style="widht=""100%;">	
							</div> -->
							<div class="col-md-12">
								<h2 style="line-height:26px;"><a href="<?= $link_menu ?>/offre-emploi/<?= $offres->slug?>"><?= $offres->titre  ?></a></h2>
							</div>
						</div>

						<div class="c-customer-details row" data-auto-height="true">
							<div class="col-md-6 col-sm-6 c-margin-t-0">
								<div data-height="height">
									<ul class="list-unstyled">
										<li><b>Domaine: </b><?= $offres->domaine ?></li>
										<li><b>Pays:</b> <?= $offres->pays ?></li>
										<li><b>Zone:</b> <?= $offres->zone?></li>
										<li><b>Date limite des dépots:</b> <?= Fonctions::format_date( $offres->date_limite ); ?> </li>
										<!-- <li>Email: <a href="mailto:info@jango.com" class="c-theme-color">info@jango.com</a></li>
										<li>Skype: <span class="c-theme-color">jango</span></li> -->
									</ul>
								</div>
							</div>
						</div>

					</p>
					<p>Les candidats doivent déposer leurs dossiers sur <a href="mailto:<?= $offres->email ?>" class="c-theme-color"><?= $offres->email ?></a> </p>
						
					<div class="c-content-divider">
						<i class="icon-dot c-square"></i>
					</div>
				<?php endforeach ?>	
			</div>
			<?php }else{ ?>
			<br>
				<h3 class="alert alert-success"><b>Pas d'offre pour l'instant</b></h3>

			<?php } ?>


		</div>
	</div>
</div>







<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
