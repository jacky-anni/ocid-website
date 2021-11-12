<?php include('font-end/layout/head.php'); ?>
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
	<?php banner(''); ?>

	<div class="container">
		<div class="c-layout-sidebar-content ">

			<div class="col-md-12">
					<div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="padding: 15px;">
						<div class="c-content-title-1">
							<h4 class="c-font-uppercase c-font-bold">Finalisez votre inscription</h4>
							<?php

								$user=Query::affiche('participant',$url[1],'id');

								if(isset($_POST['envoyer'])){
									if($user){
										require "admin/class/Participant_Pol.php";
										if (strtolower($_FILES['document']['type']=='application/pdf')) {
											Participant_Pol::add_document($user->id,$_FILES['document']['name']);
										}
										else
										{
											Fonctions::set_flash('Le document doit etre au format PDF','danger');
											$redirect=$_SERVER['REQUEST_URI'];
											echo "<script>window.location ='$redirect';</script>";
										}
									}else{
										Fonctions::set_flash('Connecter et réessayer','success');
										echo "<script>window.location ='$link_menu/connexion;</script>";
									}
								}

								
							?>
							<div class="c-line-left"></div>
							<p><b>Ajouter le document signé ici en pdf</b></p>
							<form  enctype="multipart/form-data" method="post" role="form" data-parsley-validate action="">
							<input type="file" name="document" accept="application/pdf"><hr>
								<span class="input-group-btn">
									<button type="submit" name="envoyer" class="btn c-theme-btn c-btn-square c-font-bold" type="button">Soumettre</button>
								</span>
							</form>
							
						</div>
					</div>
				</div>
		
		
		</div>
	</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
