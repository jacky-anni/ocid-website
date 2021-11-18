<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Participant_Pol.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en"  >
<title>Reinitialisation de mot de passe | <?= $org->sigle ?></title>

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
	<?php banner("Reinitialisation de mot de passe"); ?>

<div class="container">
	<?php include('admin/includes/flash.php'); ?>
	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">

			<!--  <?php if (isset($url[1]) AND !isset($url[2])):?>
				 <div class="col-md-12">
				 	<div class="" data-height="height">
				 		<center>
				 			<div class="c-content-line-icon c-theme c-icon-comment"></div>
				 			<h3 class=" c-font-bold">Un email envoyé sur <b><?= $url[1] ?></h3>
				 		</center>
						
					</div>
				 </div>
			<?php endif ?> -->

			 <?php if (isset($url[1]) AND isset($url[2]) AND isset($url[3])):?>
				 
				 <div class="col-md-6 col-md-offset-3">
				 	<div class="modal-content c-square">
					    <div class="modal-body">
					       <!--  <h3 class="c-font-24 c-font-sbold"><b> <i class="fa fa-sign-in"></i> Connexion</b></h3> -->
					      <!--   <p>Let's make today a great day!</p> -->
					      <?php include('admin/includes/flash.php'); ?>
					      <h6 id="success1" style="font-size: 14px;"></h5>
					        <form action="connexion.php" method="POST" action="" role="form" data-parsley-validate action="" >
					            <div class="form-group">
					                <label class="control-label"><b>Nouveau mot de passe</b></label>
									<input type="password" placeholder="Nouveau mot de passe" data-parsley-trigger="keypress"  class="form-control" data-parsley-maxlength="250" name="password" id="password1" data-parsley-minlength="6"  required="">
					            </div>
					            <div class="form-group">
					                <label class="control-label"><b>Répéter le mot de passe</b></label>
									<input type="password" data-parsley-equalto="#password1" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250"  required="">
					            </div>
					            <div class="form-group">
					                <button type="submit" name="valider" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login"> <i class="fa fa-sign-in"></i> Valider</button>
					            </div>
					        </form>
					    </div>

					</div>
				 </div>
			<?php endif ?>
		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->

		<?php
			if(isset($_POST['valider'])){
				extract($_POST);
				Participant_Pol::reset_password($url[1],$url[2],$password,$password_confirmation);
			}

		?>

	<!-- END: PAGE CONTENT -->
	</div>
</div>


</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
