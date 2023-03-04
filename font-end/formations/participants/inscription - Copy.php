<?php include('font-end/layout/head.php'); ?>
<?php include('admin/class/Participant.php'); ?>
<?php include('admin/class/Formation.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php

$formation = Query::affiche('formation', $url[1], 'id');
if (!$formation->id) {
	Fonctions::set_flash("Cette formation n'existe pas", 'warning');
	header("location:$link_menu/formations");
}

// verifier si la l'inscription est terminé
if ($formation and $formation->inscription == 0) {
	header("location:$link_menu/inscription_/" . $formation->id);
}
?>
<title>Inscription | <?= $org->sigle ?></title>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
	<!-- BEGIN: HEADER -->
	<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
		<?php include('font-end/layout/header.php'); ?>
		<?php include('font-end/layout/logo_and_search.php'); ?>
		<?php include('font-end/layout/menu.php'); ?>
		<?php include('font-end/layout/user_bar.php'); ?>
	</header>
	<div class="c-layout-page">
		<?php include('font-end/layout/banner.php'); ?>
		<?php banner('Inscription'); ?>
		<?php include('font-end/formations/banner.php'); ?>

		<div class="container">
			<?php include('admin/includes/flash.php'); ?>
			<div class="row">
				<div class="col-md-12 c-padding-20">
					<h3 class="c-font-bold c-font-uppercase c-font-24" style="color: #26a8b4;">FORMULAIRE D’INSCRIPTION</h3>
					<h3 class="c-font-bo c-font-19" style="margin-bottom: -20px;">Qui êtes-vous ? </h3>
					<?php if ($formation->type == 2 and empty($url[2])) { ?>
						<div class="c-content-box c-size-md " style="height:70px;">
							<div class="container ">
								<div class="c-content-bar-2 c-opt-1">
									<div class="row c-bg-grey-1" data-auto-height="truse" style="padding:10px;">
										<div class="col-md-6" style="background-color:#26a8b4;;">
											<a href="">
												<div class="c-content-v-center c-bg-resd" data-height="height">
													<div class="c-wrapper">
														<div class="c-body">
															<h3 class="c-font-white c-font-bold">Un-e Certifié-e du programme de formation en Socialisation politique et débat argumenté de l’OCID ?</h3>
														</div>
													</div>
												</div>
											</a>

										</div>

										<a href="">
											<div class="col-md-6" style="background-color:#26a8b4;;">
												<div class="c-content-v-center c-bg-red" data-height="height">
													<div class="c-wrapper">
														<div class="c-body">
															<h3 class="c-font-white c-font-bold">un-e cadre d’un parti politique ou d’une organisation de la société civile ?.</h3>
														</div>
													</div>
												</div>
											</div>
										</a>


									</div>
								</div>
							</div>
						</div>
					<?php } ?>





					</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>


					<!-- BEGIN: ADDRESS FORM -->
					<div class="col-md-12 c-padding-20">
						<h3 class="c-font-bold c-font-uppercase c-font-24" style="color: #26a8b4;">FORMULAIRE D’INSCRIPTION</h3>
						<p>Si vous avez déjà inscrit <a href="<?= $link_menu ?>/connexion" class="btn btn-success btn-sm"> <i class="fa fa-sign-in"></i> connectez-vous</a></p>
						<hr>
						<?php include('admin/includes/flash.php'); ?>
						<?php
						if (isset($_POST['enregistrer'])) {
							extract($_POST);
							// info sur le user
							$participant = new Participant($nom, $prenom, $lieu_naissance, $departement, $commune, $niveau, $universite, $domaine, $association, $partiP, $occupation, $email, $whatsapp, $numero, $condition, $password, $password_confirmation);
							$participant->ajouter($formation->id);
						}

						?>
						<!-- BEGIN: CONTENT/BARS/BAR-2 -->
						<form action="" method="post" role="form" data-parsley-validate action="">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Nom</label>
											<input type="text" name="nom" value="<?php if (isset($_POST['nom'])) {
																						echo $_POST['nom'];
																					} ?>" class="form-control" data-parsley-maxlength="250" placeholder="Ex : Anizaire" required="">

										</div>
										<div class="col-md-6">
											<label class="control-label">Prénom</label>
											<input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) {
																						echo $_POST['prenom'];
																					} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Jacky" required="">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Lieu de naissance </label>
											<input type="text" name="lieu_naissance" value="<?php if (isset($_POST['lieu_naissance'])) {
																								echo $_POST['lieu_naissance'];
																							} ?>" class="form-control" data-parsley-maxlength="250" placeholder="Ex : Port-Margot" required="">
										</div>
										<div class="col-md-6">
											<label class="control-label">Département</label>
											<select name="departement" class="form-control" required="">
												<option value="">Choisir un département</option>
												<option value="Nord" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord') {
																			echo "selected";
																		} ?>>Nord</option>

												<option value="Nord-Est" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord-Est') {
																				echo "selected";
																			} ?>>Nord-Est</option>

												<option value="Nord-Ouest" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nord-Ouest') {
																				echo "selected";
																			} ?>>Nord-Ouest</option>

												<option value="Sud" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Sud') {
																		echo "selected";
																	} ?>>Sud</option>

												<option value="Sud-Est" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Sud-Est') {
																			echo "selected";
																		} ?>>Sud-Est</option>

												<option value="Ouest" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Ouest') {
																			echo "selected";
																		} ?>>Ouest</option>

												<option value="Centre" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Centre') {
																			echo "selected";
																		} ?>>Centre</option>

												<option value="Artibonite" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Artibonite') {
																				echo "selected";
																			} ?>>Artibonite</option>

												<option value="Nippes" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Nippes') {
																			echo "selected";
																		} ?>>Nippes</option>
												<option value="Grand-Anse" <?php if (isset($_POST['departement']) and $_POST['departement'] == 'Grand-Anse') {
																				echo "selected";
																			} ?>>Grand-Anse</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label">Commune</label>
											<input type="text" name="commune" value="<?php if (isset($_POST['commune'])) {
																							echo $_POST['commune'];
																						} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Port-Margot" required="">
										</div>
									</div>
								</div>
							</div>

							<div class="row c-border-top">
								<div class="form-group col-md-12">
									<div class="row">
										<div class="col-md-12">
											<label class="control-label">Niveau d'étude</label>
										</div>
									</div>

									<div class="col-md-4">
										<div class="c-radjio">
											<input type="radio" value="Primaire" id="radio80" class="c-rkadio" name="niveau" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'Primaire') {
																																	echo "checked";
																																} ?>>
											<label for="radio80">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												Primaire
											</label>
										</div>
									</div>

									<div class="col-md-4">
										<div class="c-radjio">
											<input type="radio" value="Secondaire" id="radio60" class="c-rkadio" name="niveau" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'Secondaire') {
																																	echo "checked";
																																} ?>>
											<label for="radio60">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												Secondaire
											</label>
										</div>
									</div>

									<div class="col-md-4">
										<div class="c-checkbox c-toggle-hide" data-object-selector="c-account1" data-animation-speed="600">
											<div class="c-radio">
												<input type="radio" id="radio70" value="Universitaire" name="niveau" class="c-check" required="" <?php if (isset($_POST['niveau']) and $_POST['niveau'] == 'Universitaire') {
																																						echo "checked";
																																					} ?>>
												<label for="radio70" style="font-weight: normal;">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>
													Universitaire
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row c-account1">
								<div class="form-group col-md-12">
									<label class="control-label">Université </label>
									<input type="text" name="universite" class="form-control" placeholder="Ex: Université Antenor Firmin (UNAF)" data-parsley-maxlength="250" value="<?php if (isset($_POST['universite'])) {
																																															echo $_POST['universite'];
																																														} ?>" id="universite1">
								</div>

								<div class="form-group col-md-12">
									<label class="control-label">Domaine d'étude </label>
									<input type="text" name="domaine" class="form-control" placeholder="Ex: Sciences Informatiques" data-parsley-maxlength="250" value="<?php if (isset($_POST['domaine'])) {
																																											echo $_POST['domaine'];
																																										} ?>">
								</div>
							</div>


							<div class="row c-border-top">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											Etes – vous :
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="c-checkbox c-toggle-hide" data-object-selector="c-account4" data-animation-speed="600" style="margin-top: 10px;">
												<input type="checkbox" name="organisation" value="Membre d’une association" id="checkbox1-77" <?php if (isset($_POST['organisation']) and $_POST['organisation'] == 'Membre d’une association') {
																																					echo "checked";
																																				} ?> class="c-check form-control">
												<label for="checkbox1-77">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>
													Membre d’une association
												</label>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<div class="c-checkbox c-toggle-hide" data-object-selector="c-account5" data-animation-speed="600" style="margin-top: 10px;">
												<input type="checkbox" name="parti" id="checkbox1-78" value="Membre d’un parti politique" class="c-check form-control" <?php if (isset($_POST['organisation']) and $_POST['organisation'] == 'Membre d’un parti politique') {
																																											echo "checked";
																																										} ?>>
												<label for="checkbox1-78">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>
													Membre d’un parti politique
												</label>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-12">
								<div class="row c-account4">
									<div class="form-group col-md-12">
										<label class="control-label">quel est le nom de l'organisation</label>
										<input type="text" name="association" value="<?php if (isset($_POST['association'])) {
																							echo $_POST['association'];
																						} ?>" data-parsley-maxlength="250" class="form-control c-square c-theme" placeholder="OCID">
									</div>
								</div>

								<div class="row c-account5">
									<div class="form-group col-md-12">
										<label class="control-label">Quel est le nom du parti</label>
										<input type="text" name="partiP" value="<?php if (isset($_POST['partiP'])) {
																					echo $_POST['partiP'];
																				} ?>" data-parsley-maxlength="250" class="form-control c-square c-theme" placeholder="xxxxxxxxx">
									</div>
								</div>
							</div>

							<div class="row c-border-top">
								<div class="col-md-12">
									<div class="form-group col-md-6">
										<label class="control-label">Occupation actuelle : </label>
										<input type="text" name="occupation" value="<?php if (isset($_POST['occupation'])) {
																						echo $_POST['occupation'];
																					} ?>" data-parsley-trigger="keypress" class="form-control" data-parsley-maxlength="250" placeholder="Développeur / Community Manager">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label">Email</label>
										<input type="email" name="email" value="<?php if (isset($_POST['email'])) {
																					echo $_POST['email'];
																				} ?>" data-parsley-trigger="keypress" class="form-control" placeholder="Ex : anizairejacky@gmail.com" data-parsley-maxlength="250" required="">
									</div>
								</div>
							</div>

							<div class="row c-border-top">
								<div class="form-group col-md-12">
									<div class="row">
										<div class="col-md-12">
											<label class="control-label">Avez-vous accès à un téléphone avec une application WhatsApp ? </label>
										</div>
									</div>
									<div class="col-md-4">
										<div class="c-checkbox c-toggle-hide" data-object-selector="c-account" data-animation-speed="600">
											<div class="c-radio">
												<input type="radio" id="radio1" value="Oui" name="whatsapp" class="c-check" required="" <?php if (isset($_POST['whatsapp']) and $_POST['whatsapp'] == 'Oui') {
																																			echo "checked";
																																		} ?>>
												<label for="radio1">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span>
													Oui
												</label>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="c-radjio c-toggle-hide">
											<input type="radio" value="Non" id="radio11" class="c-rkadio" name="whatsapp" <?php if (isset($_POST['whatsapp']) and $_POST['whatsapp'] == 'Non') {
																																echo "checked";
																															} ?>>
											<label for="radio11">
												<span class="inc"></span>
												<span class="check"></span>
												<span class="box"></span>
												Non
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row c-account">
								<div class="form-group col-md-12">
									<label class="control-label">Quel est votre numéro WhatsApp ? </label>
									<input type="text" name="numero" data-parsley-maxlength="250" class="form-control" placeholder="Ex: +5094872-9922" value="<?php if (isset($_POST['numero'])) {
																																									echo $_POST['numero'];
																																								} ?>">
								</div>
							</div>


							<div class="row c-border-top">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Entrer un mot de passe</label>
											<input type="password" placeholder="Mot de passe" data-parsley-trigger="keypress" class="form-control" data-parsley-maxlength="250" name="password" id="password1" data-parsley-minlength="6" required="">
										</div>
										<div class="col-md-6">
											<label class="control-label">Répéter le mot de passe</label>
											<input type="password" data-parsley-equalto="#password1" name="password_confirmation" class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250" required="">

										</div>
									</div>
								</div>
							</div>

							<div class="row c-border-top">
								<div class="form-group col-md-12"></br>
									<p class="help-block"><b>En vous inscrivant à cette formation, vous vous engagez à :</b> </br>
										- Compléter toute la formation. </br>
										- participer à la séance de regroupement en fin de formation dans la ville la plus proche de votre commune (Cap-Haitien ; Cayes ; Port-au-Prince ; Gonaïves). </br>
										- réaliser les travaux pratiques en équipe
									</p>



									<div class="c-checkbox">
										<input type="checkbox" id="checkbox1-110" value="Oui" name="condition" c-rkadio class="c-check" required="" <?php if (isset($_POST['condition']) == 'Oui') {
																																						echo "checked";
																																					} ?>>
										<label for="checkbox1-110">
											<span class="inc"></span>
											<span class="check"></span>
											<span class="box"></span>
											J'accepte les conditions d'utilisation
										</label>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12" role="group">
								<button type="submit" name="enregistrer" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold">S'inscrire</button>
								<button type="reset" class="btn btn-lg btn-default c-btn-uppercase c-btn-bold">Annuler</button>
							</div>
						</form>
					</div>

					<ul class="c-content-recent-posts-1">
						<li></li>
					</ul> <!-- END: ORDER FORM -->
				</div>
			</div>



		</div>



		<?php include('font-end/layout/footer.php'); ?>
		<?php include('font-end/layout/script.php'); ?>
</body>


<!-- Mirrored from themehats.com/themes/jango/demos/default/megamenu-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 20:19:22 GMT -->

</html>