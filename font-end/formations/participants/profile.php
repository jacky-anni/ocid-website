<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Participant_Pol.php'); ?>
<?php include('admin/class/Utilisateur.php'); ?>
<?php Fonctions::redirect();?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= $link_admin ?>/bower_components/crop/croppie.js"></script>
<link rel="stylesheet" href="<?= $link_admin ?>/bower_components/crop/croppie.css" />
<title>Formation | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
	<?php $user=Query::affiche('participant',$_SESSION['id_user'],'id'); ?>
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <?php include('font-end/layout/header.php');?>
    <?php include('font-end/layout/logo_and_search.php');?>
    <?php include('font-end/layout/menu.php');?>
    <?php include('font-end/layout/user_bar.php');?>
</header>
<div class="c-layout-page">
	<?php include('font-end/layout/banner.php');?>
	<?php banner('Page de profile'); ?>

<div class="container">

	<div class="c-layout-sidebar-content ">
		<div class="row c-margin-t-25">
			<?php include('admin/includes/flash.php'); ?>
			<div class="col-md-4 c-margin-b-20 c-margin-t-10">
				<center class="list-group-item col-md-12">
				<img src="<?= $link_admin ?>/dist/img/user/participant/<?= Fonctions::user()->photo ?>" class="img-responsive img-thumbnail col-md-12" style="margin: 10px;" >
				<h4 class="c-font-uppercase c-font-bold"><?= Fonctions::user()->prenom ?>  <?= Fonctions::user()->nom ?></h4><hr/>

				<!-- 	The following addresses will be used on the checkout page by default. -->
					<p class="list-groupj-item" >
						<span style="font-size: 15px;">Ajouter une photo</span>
							<input type="file" name="upload_image" accept="image/*" id="upload_image" class=" btn-block col-md-12 list-group-item" style="width: 100%" />  
					<div id="uploaded_image"></div>
					</p>      

					<div class="col-md-12">
						<div class="c-content-ver-nav" style="text-align: left;">
									<ul class="c-menu c-arrow-dot1 c-theme">
										<li><a href="#"><i class="fa fa-graduation-cap"></i> Mes formations</a></li>
										<li><a href="#"><i class="fa fa-bell"></i> Notifications (0)</a></li>
										<li><a href="<?= $link_menu ?>/deconnexion"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
									</ul>
						</div>
					</div>
					
			</div>
			<div class="col-md-8">
				<div class="c-content-tab-1 c-theme c-margin-t-30">
					<div class="clearfix">
						<ul class="nav nav-tabs  c-font-bold">
							<li class="active"><a href="#tab_1_1_content" data-toggle="tab"><i class="fa fa-user"></i>  Informations Personnelles</a></li>
							<li><a href="#tab_1_2_content"  data-toggle="tab"> <i class="fa fa-lock"></i>  Mot de passe</a></li>
						</ul>
					</div>
					<div class="tab-content c-bordered c-padding-lg">
						<div class="tab-pane active" id="tab_1_1_content">
						<h5 style=""><b>A- RENSEIGNEMENTS PERSONNELS</b> </h5><hr/>
							<form action="" method="post" role="form" data-parsley-validate action="">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="form-group col-md-6">
												<label class="">Nom</label>
												<input type="text" name="nom" value="<?= $user->nom ?>" class="form-control" placeholder="Ex : Anizaire" required="">
											</div>
											<div class="col-md-6">
												<label class="">Prénom</label>
												<input type="text" name="prenom" value="<?= $user->prenom ?>" class="form-control" placeholder="Ex : Jacky" required="">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="form-group col-md-6">
												<label class="">Sexe </label>
												<select name="sexe" class="form-control"  required="">
													 <option value="">Choisir votre sexe</option>
										            <option value="Homme" <?php if($user->sexe=='Homme'){echo "selected";} ?> >Homme</option>
										            <option value="Femme" <?php if($user->sexe=='Femme'){echo "selected";} ?>>Femme</option>
												</select>
											</div>
											<div class="col-md-6">
												<label class="">Département</label>
												<select name="departement" class="form-control"  required="">
													 <option value="">Choisir un département</option>
										            <option value="Nord" <?php if($user->departement=='Nord'){echo "selected";} ?> >Nord</option>

										            <option value="Nord-Est" <?php if($user->departement=='Nord-Est'){echo "selected";} ?>>Nord-Est</option>

										            <option value="Nord-Ouest" <?php if($user->departement=='Nord-Ouest'){echo "selected";} ?>>Nord-Ouest</option>

										            <option value="Sud" <?php if($user->departement=='Sud'){echo "selected";} ?>>Sud</option>

										            <option value="Sud-Est" <?php if($user->departement=='Sud-Est'){echo "selected";} ?>>Sud-Est</option>

										            <option value="Ouest" <?php if($user->departement=='Ouest'){echo "selected";} ?>>Ouest</option>

										            <option value="Centre" <?php if($user->departement=='Centre'){echo "selected";} ?>>Centre</option>

										            <option value="Artibonite" <?php if($user->departement=='Artibonite'){echo "selected";} ?>>Artibonite</option>

										            <option value="Nippes" <?php if($user->departement=='Nippes'){echo "selected";} ?>>Nippes</option>
										            <option value="Grand-Anse" <?php if($user->departement=='Grand-Anse'){echo "selected";} ?>>Grand-Anse</option>
												</select>
											</div>
										</div>
									</div>
								</div>

									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="">Commune </label>
													<select name="commune" class="form-control"  required="">
														<option value="">Choisir votre commune</option>
																<?php foreach(Query::liste('commune') as $commune): ?>
																<option value="<?= $commune->commune ?>" <?php if($user->commune==$commune->commune){echo "selected";} ?> ><?= $commune->commune ?></option>
																<?php endforeach ?>
													</select>
												</div>
												<div class="col-md-6">
													<label class="">Téléphone</label>
													<input type="text" name="telephone" value="<?= $user->telephone ?>" class="form-control" placeholder="+5094872 0022" required="">
												</div>
											</div>
										</div>
									</div>

										<div class="row">
										<div class="col-md-12">
											<div class="row">
			
												<div class="col-md-12">
													<label class="">Téléphone alternatif</label>
													<input type="text" name="telephone2" value="<?= $user->telephone2 ?>" class="form-control" placeholder="+5093349-90" required="">
												</div>
											</div>
										</div>
									</div>
									</br><hr>

									<?php if($user->statut=="Cadre d’un parti politique ou d’une organisation"): ?>
										<div class="row">
											<h5 style=""><b>B- RÉFÉRENCE DU PARTI POLITIQUE OU DE L’ORGANISATION DE LA SOCIETE CIVILE</b> </h5><hr/>
											<div class="col-md-12">
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">Indiquez le nom du parti politique ou de l’organisation de la société civile qui vous recommande </label>
														<input type="text" name="societe" value="<?= $user->nom_parti ?>" class="form-control" data-parsley-maxlength="250" placeholder="Réseau Civisme et de la personne (RECIDP)" required="">
													</div>
													<div class="col-md-6">
														<label class="control-label">Indiquez l’adresse du parti politique ou de l’organisation de la société civile qui vous recommande </label>
														<input type="text" name="adresse" value="<?= $user->adresse ?>" data-parsley-maxlength="250" class="form-control" placeholder="#15, Ruelle la paix, Fondation Vincent, Cap-Haitien" required="">
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-12">
														<label class="control-label">Nom et Prénom du dirigeant ou de la dirigeante du parti politique ou de l’organisation de la société civile qui vous recommande  </label>
														<input type="text" name="nom_dirigeant" value="<?= $user->nom_dirigeant ?>" class="form-control" data-parsley-maxlength="250" placeholder="Eddy Roméus" required="">
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label">Téléphone du dirigeant ou de la dirigeante </label>
														<input type="text" name="telephone_dirigeant" value="<?= $user->telephone_dirigeant ?>" class="form-control" data-parsley-maxlength="250" placeholder="+5094973 9494" required="">
													</div>
													<div class="col-md-6">
														<label class="control-label">Courriel du dirigeant ou de la dirigeante  </label>
														<input type="email" name="email_dirigeant" value="<?= $user->email_dirigeant ?>" data-parsley-maxlength="250" class="form-control" placeholder="anizairejacky@gmail.com" required="">
													</div>
												</div>



											</div>
										</div><hr/>
									<?php endif ?>





								<div class="row">
									<div class="col-md-12">
										<button type="submit" name="modifier" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold btn-sm"> <i class="fa fa-edit"></i> <b>Modifier</b></button>
									</div>
								</div>
							</form>

						</div>
						<div class="tab-pane" id="tab_1_2_content">
							<form action="" method="POST" role="form" data-parsley-validate action="">
								<div class="row">
								<div class="form-group col-md-12">
									<label class="control-label">Entrer  un mot passe</label>
									<input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress"  class="form-control" data-parsley-maxlength="250" name="password" id="password2" data-parsley-minlength="6"  required="">
								</div>
								<div class="col-md-12">
									<label class="control-label">Répéter le mot de passe</label>
									<input type="password" data-parsley-equalto="#password2" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250"  required=""></br>
								</div>

								<div class="row">
									<div class="form-group col-md-12">
										<button type="submit" name="changer"  class="btn btn-primary"> <i class="fa fa-edit"></i> Changer</button>
									</div>
								</div>

									
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php $_SESSION['user_id_upload']=rand(1000000,1000000000000); ?>

		</div>
			<?php 
				if(isset($_POST['modifier']))
				{
					extract($_POST);


					$participant=Participant_Pol::modifier_profil($nom,$prenom,$sexe,$departement,$commune,$telephone,$telephone2,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant);


					// Participant::modifier_profil($nom,$prenom,$lieu_naissance,$departement,$commune,$niveau,$universite,$domaine,$organisation,$parti,$occupation,$email,$numero);
				}

				if(isset($_POST['changer']))
				{
					extract($_POST);
					Participant::modifier_password($password_actuel,$password,$password_confirmation);
				}
			?>

		</div><!-- END: CONTENT/SHOPS/SHOP-MY-ADDRESSES-1 -->
	<!-- END: PAGE CONTENT -->
	</div>
</div>
</div>

	<div id="uploadimageModal" class="modal" role="dialog"  style="width: auto; z-index: 11111111111;">
	  <div>
	    <div class="modal-dialog">
	    <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <h4 class="modal-title" style="font-weight: bold;">Rogner et continuer</h4>
	          </div>
	          <div class="modal-body">
	            <center>
	              <div class="row" style="height: 50%;">
	                <div class="col-md-8 text-center">
	                  <div id="image_demo" style="width: 100%;"></div>
	                </div>
	                <div class="col-md-4" >
	              </div>
	            </div>
	            </center>
	          </div></br></br>
	          <div class="modal-footer">
	            <button class="btn btn-success crop_image "> <b><i class="fa fa-edit"></i>  Modifier</b> </button>
	            <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-close"></i> <b>Close</b></button>
	          </div>
	      </div>
	    </div>
	  </div>
	</div>
	<style type="text/css">
		label{
			font-size: 13px;
		}
	</style>



<?php include('font-end/layout/footer.php'); ?>
<?php include('font-end/layout/script.php'); ?>
<script>  
$(document).ready(function(){

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:310,
      height:310,
      type:'square' //circle
    },
    boundary:{
      width:310,
      height:310,
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"admin/formation/participant/upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          window.location.href="<?= $link_menu ?>/profile";
          // $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>
</body>
    

<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->
</html>
