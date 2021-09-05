<?php include('font-end/layout/head.php'); ?>
<title>Liste des projets| OCID</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
<?php banner("Liste des projets"); ?>

<div class="c-content-box c-size-md c-bg-white">

	<div class="c-content-box c-size-md c-bg-grsey-1">
		<div class="col-md-12">
			<div class="c-content-box c-size-md">
				<div class="container" style="margin-top:-90px;">
					<table id="example" class="display ">
				        <thead>
				            <tr>
				                <th></th>
				            </tr>
				        </thead>
				        <tbody>
				            <?php foreach (Query::liste_prepare ('projet','En ligne','etat') as $projets): ?>
				            <tr>
				                <td>
									<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="margin-bottom: -30px;">
										<div class="row c-margin-b-40">
											<div class="c-content-product-2">
												<div class="col-md-4">
													<div class="c-content-overlay">
														<div class="c-bg-img-center c-overlay-object img-rounded" data-height="height" style="height: 230px; background-image: url(<?= $link_admin ?>/dist/img/projet/<?= $projets->photo ?>);"></div>
													</div>
												</div>
												<div class="col-md-8">
													<div class="c-info-list">
														<h4 class="c-title c-font-bold c-font-20">
															<a class="c-theme-link" href="<?= $link_menu ?>/projet/<?= $projets->slug ?>" style="line-height: 29px;"><?=  $projets->titre ?></a>
														</h4>
														<p><?= substr($projets->presentation, 0,255) ?>..</p>
														<p><small style="color: #26a8b4;"><?= Fonctions::format_date( $projets->date_debut); ?> - <?= Fonctions::format_date( $projets->date_fin); ?></small></p>
													</div>
													<p class="c-price c-font-26 c-font-thin">
														<a href="<?= $link_menu ?>/projet/<?= $projets->slug ?>">
															<button class="btn btn-sm c-theme-btn c-btn-bold"> <i class="fa fa-plus"></i> Voir le cours</button>
														</a>
														</p>
												</div>
											</div>
										</div>
									</div>
				                </td>
				            </tr></br>
				            <?php endforeach ?>
				        </tbody>

				    </table>
				</div>
				</div>
	         </div> 
		  </div>
	</div>
</div>

<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function() {
	  $('#example').dataTable( {

	    "oLanguage": {
	      "oPaginate": {
	        "sNext": "Suivant",
	        "sPrevious": "Précedent"
	      },
	    },
	    "bFilter": true,
	    "aLengthMenu": [[10, 20, 30,50,100, -1], [10, 20, 30,50,100,"Tous"]],

	  } );
	} );
</script>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
