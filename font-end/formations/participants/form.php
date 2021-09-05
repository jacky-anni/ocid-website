<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Presence.php'); ?>
<!DOCTYPE html>
<html lang="en"    >
<title>Formulaire pour les participants</title>

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
<?php banner('Formation'); ?>
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style=" background-color: #26a8b4; background-image: url(<?= $link ?>/asskets/base/img/layout/banner.jpg); ">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-bold c-font-white c-font-29 c-font-slim" style="line-height: 35px; font-size: 25px;">Formulaire de présence</h3>
			<!-- <h3 class=" c-font-tlhin" style="color: yellow;">Questionnaire d'introduction</h3> -->
		</div>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
</div>

<div class="container">
		<b><?php include('admin/includes/flash.php'); ?></b>

			<div class="row">
				<!-- BEGIN: ADDRESS FORM -->
				<div class="col-md-12 c-padding-20" style="border: 1px solid silver;">
				<?php
					if (isset($_POST['valider'])) {
						extract($_POST);
						$presence = new Presence($siyati,$non,$depatman,$vil,$presence,$zone,$sinon,$telephone,$email);
						$presence->presence();


					}
				?>


				<?php if(isset($url[1]) AND $url[1]=='validate'){
					echo "<p class='alert alert-success'><b>Fomilè a valide avèk siksè</b></p>";
				}else{ ?>
				<form action="" method="POST" role="form" data-parsley-validate action="">
	    			<div class="col-md-12 row c-border-top">
	    				<div class="form-group col-md-12">
							

							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label"><b>Siyati:</b></label>
											<input type="text" name="siyati" value="<?php if(isset($_POST['siyati'])){echo $_POST['siyati'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Anizaire" required="">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label"><b>Non:</b></label>
											<input type="text" name="non" value="<?php if(isset($_POST['non'])){echo $_POST['non'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Jacky" required="">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label"><b>Nan ki depatman ou rete?</b></label>
											<select name="depatman" class="form-control" required="">
												 <option value="">Chwazi depatman an</option>
									            <option value="Nord" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Nord'){echo "selected";} ?> >Nord</option>

									            <option value="Nord-Est" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Nord-Est'){echo "selected";} ?>>Nord-Est</option>

									            <option value="Nord-Ouest" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Nord-Ouest'){echo "selected";} ?>>Nord-Ouest</option>

									            <option value="Sud" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Sud'){echo "selected";} ?>>Sud</option>

									            <option value="Sud-Est" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Sud-Est'){echo "selected";} ?>>Sud-Est</option>

									            <option value="Ouest" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Ouest'){echo "selected";} ?>>Ouest</option>

									            <option value="Centre" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Centre'){echo "selected";} ?>>Centre</option>

									            <option value="Artibonite" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Artibonite'){echo "selected";} ?>>Artibonite</option>

									            <option value="Nippes" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Nippes'){echo "selected";} ?>>Nippes</option>
									            <option value="Grand-Anse" <?php if(isset($_POST['depatman']) AND $_POST['depatman']=='Grand-Anse'){echo "selected";} ?>>Grand-Anse</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label"><b>Nan ki Vil ou rete ?</b></label>
											<input type="text" name="vil" value="<?php if(isset($_POST['vil'])){echo $_POST['vil'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Cap-Haitien" required="">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label class="control-label"> <b>Eske w ap vin patisipe nan atelye OCID ap òganize nan fen pwogram fòmasyon an?     </b></label>
								</div>
							</div>
							<div class="col-md-12">
							<input type="radio" value="Wi" class="c-rkadio" name="presence" <?php if(isset($_POST['presence']) AND $_POST['presence']=='Wi'){echo "checked";} ?>  required>
								<label for="radio11">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Wi
								</label>
							</div> 

							<div class="col-md-12">
							<input type="radio" value="Non"  class="c-rkadio" name="presence" <?php if(isset($_POST['presence']) AND $_POST['presence']=='Non'){echo "checked";} ?> required>
								<label for="radio11">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Non
								</label>
							</div> 
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label"><b>Si wap vini, nan kilès nan vil sa yo wap vini patisipe nan atelye a?</b></label>
										<select name="zone" class="form-control">
											 <option value="">Chwazi yon vil an</option>
								            <option value="Cap-Haitien" <?php if(isset($_POST['zone']) AND $_POST['zone']=='Cap-Haitien'){echo "selected";} ?> >Cap-Haitien</option>

								            <option value="Gonaïves" <?php if(isset($_POST['zone']) AND $_POST['zone']=='Gonaïves'){echo "selected";} ?>>Gonaïves</option>

								            <option value="Port-au-Prince" <?php if(isset($_POST['zone']) AND $_POST['zone']=='Port-au-Prince'){echo "selected";} ?>>Port-au-Prince</option>

								            <option value="Cayes" <?php if(isset($_POST['zone']) AND $_POST['zone']=='Cayes'){echo "selected";} ?>>Cayes</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label"><b>Si w pap vini, pouki rezon ?</b></label>
										<input type="text" name="sinon" value="<?php if(isset($_POST['sinon'])){echo $_POST['sinon'];} ?>" data-parsley-maxlength="250" class="form-control">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label"><b>Nimewo telefòn ou ?</b></label>
										<input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])){echo $_POST['telephone'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="+509 4872-9922" required>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label"><b>Imel ou ?</b></label>
										<input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="anizairejacky@gmail.com" required>
									</div>
								</div>
							</div>
						</div>

						
	    			</div>

	    			<div class="row c-border-top">
	    				<div class="col-md-12">
	    					<button type="submit" name="valider" class="btn btn-primary btn-lg"> <i class="fa fa-save"></i>  Soumettre</button>
	    				</div>
	    			</div>
	    			</form>
	    		<?php } ?>
	    		</div>
	    	

				</div>
				<!-- END: ORDER FORM -->
			</div>
	</div>
</div>


<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>

<script type="text/javascript">
	
</script>

</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
