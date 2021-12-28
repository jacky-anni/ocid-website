<?php include('font-end/layout/head.php'); ?>
<title>Liste des publications | OCID</title>
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
<?php banner("Liste des publications"); ?>

<div class="container c-size-md c-bg-white">

	<div class="row">

		<div class="col-md-12">
			<table id="example" class="display ">
		        <thead>
		            <tr>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach (Query::liste_prepare ('publication','En ligne','etat') as $publication): ?>
		            <tr>
		                <td>
							<div class="c-content-blog-post-card-1 c-option-2 c-bordered" style="margin-bottom: -30px;">
								<div class="row c-margin-b-40">
									<div class="c-content-product-2">
										<div class="col-md-12">
											<div class="c-info-list">
												<h4 class="c-title c-font-bold c-font-20">
													<a class="c-theme-link" href="<?= $link_menu ?>/publication/<?= $publication->slug ?>" style="line-height: 29px;"><?=  $publication->titre ?></a>
												</h4>
												<p><?= substr($publication->contenue, 0,255) ?>..</p>
												<p><small style="color: #26a8b4;"><?= Fonctions::format_date( $publication->date_post); ?></small></p>
											</div>
											<p class="c-price c-font-26 c-font-thin">
												<a href="<?= $link_menu ?>/publication/<?= $publication->slug ?>">
													<button class="btn btn-sm c-theme-btn c-btn-bold"> <i class="fa fa-plus"></i> Voir plus</button>
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
		    </table></br>
		</div>
	</div>

	</div>
</div>

<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready( function() {
			$('#example').dataTable( {

				"oLanguage": {
					"oPaginate": {
						"sNext": "Suivant",
						"sPrevious": "Précedent",
					},
				},
				"language": {
						"lengthMenu": "Afficher _MENU_ ligne par page",
						"zeroRecords": "Aucune donnée trouvée",
						"info": "Page _PAGE_ sur _PAGES_",
						"infoEmpty": "Pas de donnée disponible",
						"infoFiltered": "(filtered from _MAX_ total records)"
						},

				"order": [],
				"bFilter": true,
				"aLengthMenu": [[10, 20, 30,50,100, -1], [10, 20, 30,50,100,"Tous"]],
			} );
		} );
	</script>
 </body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
