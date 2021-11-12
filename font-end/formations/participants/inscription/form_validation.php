<div class="col-md-12">
	<!-- BEGIN: ADDRESS FORM -->
	<div class="col-md-12 c-padding-20">
	<h3 class="c-font-bold c-font-uppercase c-font-24" style="color: #26a8b4;">FORMULAIRE  D’INSCRIPTION</h3>
	<p>Si vous avez déjà inscrit <a href="<?= $link_menu ?>/connexion" class="btn btn-success btn-sm"> <i class="fa fa-sign-in"></i> connectez-vous</a></p>
	<hr>
		<?php 
			if (isset($_POST['enregistrer_validation'])) {
				extract($_POST);
				// info sur le user
				if(isset($condition) AND $condition=="Oui"){
					$participant= new  Participant_Pol($nom,$prenom,$sexe,$departement,$commune,$telephone,$telephone2,$email,$password,$password_confirmation);
					$participant->ajouter_societe_politque($formation->id,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant);
				}else{
					echo "<p class='alert alert-danger'>Vous devez accepter les conditions d'utilisation.</p>";
				}
				
			}
		?>

	
	<form action="" method="post" role="form" data-parsley-validate action="">
	<div class="row">
		<h4 style=""><b>A- RENSEIGNEMENTS PERSONNELS</b> </h4><hr/>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Nom</label>
					<input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" class="form-control" data-parsley-maxlength="250" placeholder="Ex : Anizaire" required="">
				</div>
				<div class="col-md-6">
					<label class="control-label">Prénom</label>
					<input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="Ex : Jacky" required="">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Sexe</label>
					<select name="sexe" class="form-control" required="">
						 <option value="">Choisir vore sexe</option>
			            <option value="Homme" <?php if(isset($_POST['sexe']) AND $_POST['sexe']=='Homme'){echo "selected";} ?> >Homme</option>
			            <option value="Femme" <?php if(isset($_POST['sexe']) AND $_POST['sexe']=='Femme'){echo "selected";} ?> >Femme</option>
					</select>
				</div>
				<div class="col-md-6">
					<label class="control-label">Département</label>
					<select name="departement" class="form-control" required="">
						 <option value="">Choisir un département</option>
			            <option value="Nord" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Nord'){echo "selected";} ?> >Nord</option>

			            <option value="Nord-Est" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Nord-Est'){echo "selected";} ?>>Nord-Est</option>

			            <option value="Nord-Ouest" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Nord-Ouest'){echo "selected";} ?>>Nord-Ouest</option>

			            <option value="Sud" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Sud'){echo "selected";} ?>>Sud</option>

			            <option value="Sud-Est" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Sud-Est'){echo "selected";} ?>>Sud-Est</option>

			            <option value="Ouest" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Ouest'){echo "selected";} ?>>Ouest</option>

			            <option value="Centre" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Centre'){echo "selected";} ?>>Centre</option>

			            <option value="Artibonite" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Artibonite'){echo "selected";} ?>>Artibonite</option>

			            <option value="Nippes" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Nippes'){echo "selected";} ?>>Nippes</option>
			            <option value="Grand-Anse" <?php if(isset($_POST['departement']) AND $_POST['departement']=='Grand-Anse'){echo "selected";} ?>>Grand-Anse</option>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Commune de residence</label>
					<select class="form-control" name="commune" required="">
						<option value="">Choisir une commune</option>
						<?php foreach (Query::liste('commune') as $commune): ?>
							<option value="<?= $commune->commune ?>" <?php if(isset($_POST['commune']) AND $_POST['commune']==$commune->commune){echo "selected";} ?>><?= $commune->commune ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="col-md-6">
					<label class="control-label">Votre numero Whatsapp</label>
					<input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])){echo $_POST['telephone'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="+50934569087" required="">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<label class="control-label">Téléphone alternatif </label>
					<input type="text" name="telephone2" value="<?php if(isset($_POST['telephone2'])){echo $_POST['telephone2'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="+50934569087">
				</div>

				<div class="col-md-6">
					<label class="control-label">Email</label>
					<input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" data-parsley-trigger="keypress" class="form-control" placeholder="Ex : joeben@gmail.com" data-parsley-maxlength="250" required="">
				</div>
			</div>
		</div>
	</div><br>

	<hr/><br/>

	<div class="row">
		<h4><b>B- RÉFÉRENCE DU PARTI POLITIQUE OU DE L’ORGANISATION DE LA SOCIETE CIVILE </b>  </h4><hr/>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Indiquez le nom du parti politique ou de l’organisation de la société civile qui vous recommande </label>
					<input type="text" name="societe" value="<?php if(isset($_POST['societe'])){echo $_POST['societe'];} ?>" class="form-control" data-parsley-maxlength="250" placeholder="Réseau Civisme et de la personne (RECIDP)" required="">
				</div>
				<div class="col-md-6">
					<label class="control-label">Indiquez l’adresse du parti politique ou de l’organisation de la société civile qui vous recommande </label>
					<input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="#15, Ruelle la paix, Fondation Vincent, Cap-Haitien" required="">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-12">
					<label class="control-label">Nom et Prénom du dirigeant ou de la dirigeante du parti politique ou de l’organisation de la société civile qui vous recommande  </label>
					<input type="text" name="nom_dirigeant" value="<?php if(isset($_POST['nom_dirigeant'])){echo $_POST['nom_dirigeant'];} ?>" class="form-control" data-parsley-maxlength="250" placeholder="Eddy Roméus" required="">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Téléphone du dirigeant ou de la dirigeante </label>
					<input type="text" name="telephone_dirigeant" value="<?php if(isset($_POST['telephone_dirigeant'])){echo $_POST['telephone_dirigeant'];} ?>" class="form-control" data-parsley-maxlength="250" placeholder="+5094973 9494" required="">
				</div>
				<div class="col-md-6">
					<label class="control-label">Courriel du dirigeant ou de la dirigeante  </label>
					<input type="email" name="email_dirigeant" value="<?php if(isset($_POST['email_dirigeant'])){echo $_POST['email_dirigeant'];} ?>" data-parsley-maxlength="250" class="form-control" placeholder="anizairejacky@gmail.com" required="">
				</div>
			</div>

			<div class="row ">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<label class="control-label">Entrer  un mot de passe</label>
							<input type="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" placeholder="Mot de passe" data-parsley-trigger="keypress"  class="form-control" data-parsley-maxlength="250" name="password" id="password1" data-parsley-minlength="6"  required="">
						</div>

						<div class="col-md-6">
							<label class="control-label">Répéter le mot de passe</label>
							<input type="password" value="<?php if(isset($_POST['password_confirmation'])){echo $_POST['password_confirmation'];} ?>" data-parsley-equalto="#password1" name="password_confirmation"class="form-control" placeholder="Repeter le mot de passe" data-parsley-trigger="keypress" data-parsley-minlength="6" data-parsley-maxlength="250"  required="">
						</div>
					</div>
				</div>
			</div>


		</div>
	</div><hr/>

	</div>

	<div class="row c-border-top">
		<div class="form-group col-md-12">
			<p class="help-block"><b>En vous inscrivant à cette formation, vous vous engagez à :</b> </br> 
				<ul>
					<li>Compléter l’intégralité de la formation, et notamment réaliser les exercices individuels et en groupe correspondant à chaque thème abordé, participer aux interactions sur le forum de discussions WhatsApp et consulter les ressources disponibles sur la plateforme</li>
					<li>participer à la séance de regroupement en fin de formation dans la ville la plus proche de votre commune (Cap-Haitien ; Cayes ; Port-au-Prince ; Gonaïves).</li>
					<li>Réaliser les travaux pratiques en équipe</li>
					<li>b)	Participer à la conduite de focus groups avec les acteurs de ma région en vue de recueillir leurs commentaires sur les principales recommandations d’un  Rapport d’analyse des politiques publiques ciblées par OCID </li>
				</ul>
			</p>

			<p>
				<small style="color:red;">
				Une fois que vous aurez fini de compléter le Formulaire d'inscription, veuillez appuyer sur l'onglet indiquant d'en générer une version PDF. Puis,  imprimez le fichier, signez et faites signer par la personne responsable qui vous recommande. Enfin, numérisez ("scannez") le Formulaire signé et téléversez-le ("upload") sur la plateforme pour valider votre inscription. 
				Sachez que, sans cette validation, vous ne pourrez pas accéder aux cours.
				Merci
				</small>
			</p>



			<div class="c-checkbox">
				<input type="checkbox" name="condition" required c-rkadio class="c-check">
				<input type="checkbox" id="checkbox1-110" value="Oui" name="condition" required="" c-rkadio class="c-check" <?php if(isset($_POST['condition'])=='Oui'){echo "checked";} ?>>
				<label for="checkbox1-110">
					<span class="inc"></span>
					<span class="check"></span>
					<span class="box"></span>
					J'accepte les conditions
				</label>
			</div>

			
		</div>
	</div>
	<div class="form-group col-md-12" role="group">
		<button type="submit" name="enregistrer_validation" class="btn btn-lg c-theme-btn c-btn-uppercase c-btn-bold">S'inscrire</button>
		<button type="reset" class="btn btn-lg btn-default c-btn-uppercase c-btn-bold">Annuler</button>
	</div>
</form>
</div>