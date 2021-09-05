<?php

$url='';
if (isset($_GET['url'])) {
	$url=explode('/', $_GET['url']);
}

switch ($url) 
{
	/*==================================================*/
	case '':
		 require 'font-end/accueil/index.php';
	break;

	// case $url[0]=='home':
	// 	header("Location:home");
	// 	 // require 'font-end/accueil/index.php';
	// break;

	/*==================================================*/

	// connecter ;'utilisateur'
	case $url[0]=='connexion':
		 require 'font-end/connexion/connexionWithoutModal.php';
	break;

	// deonnecter l'utilisateur
	case $url[0]=='deconnexion':
		 require 'font-end/deconnexion/index.php';
	break;


	// reset password
	case $url[0]=='reset-password':
		 require 'font-end/participants/restaurer-password.php';
	break;

	/*==================================================*/
		// inscription participant
		case $url[0]=='inscription':
			 require 'font-end/formations/participants/end-inscription.php';
		break;

		// activation de compte
		case $url[0]=='activation':
			 require 'font-end/formations/participants/mail_activation.php';
		break;
		// profile
		case $url[0]=='profile':
			 require 'font-end/formations/participants/profile.php';
		break;
		// tableau de bord
		case $url[0]=='tableau-de-bord':
			 require 'font-end/formations/participants/tableau-de-bord.php';
		break;

		// tableau de bord
		case $url[0]=='mes-formations':
			 require 'font-end/formations/participants/mes-formations.php';
		break;
	/*==================================================*/

	// A propos
	case $url[0]=='a-propos':
		 require 'font-end/a-propos/a-propos.php';
	break;
	/*==================================================*/
	// coordination
	case $url[0]=='coordination':
		require 'font-end/a-propos/coordination.php';
   break;

   case $url[0]=='profile-comite':
		require 'font-end/a-propos/profile.php';
	break;

	// suivre le cours
	case $url[0]=='cours':
		 require 'font-end/formations/modules/index.php';
	break;

	// suivre le cours
	case $url[0]=='cours-suivi':
		 require 'font-end/formations/modules/show.php';
	break;

	// suivre le cours
	case $url[0]=='document':
		 require 'font-end/formations/modules/document.php';
	break;

	/*==================================================*/
	// conctact
	case $url[0]=='contact':
		 require 'font-end/contact/index.php';
	break;

	/*==================================================*/

	/*==================================================*/
		// liste des formations
		case $url[0]=='formations':
			 require 'font-end/formations/index.php';
		break;

		// afficher une formation
		case $url[0]=='formation':
			 require 'font-end/formations/show.php';
		break;
	/*==================================================*/

	// releve de note
	case $url[0]=='releve-note':
		require 'font-end/formations/participants/releve_note.php';
	break;

	// A propos
	case $url[0]=='dossiers':
		 require 'font-end/formations/participants/dossiers.php';
	break;

	// certificat
	case $url[0]=='certificat':
		require 'font-end/formations/participants/certificat.php';
	break;

		// attestation
	case $url[0]=='attestation':
		require 'font-end/formations/participants/attestation.php';
	break;

		// releve de notes
	case $url[0]=='releve-de-note':
		require 'font-end/formations/participants/releve.php';
	break;

		// note
	case $url[0]=='note':
		require 'font-end/formations/participants/note.php';
	break;

	// quiz
	case $url[0]=='quiz':
		require 'font-end/formations/modules/quiz.php';
	break;

	// questionnaire introductif
	case $url[0]=='questionnaire-introductif':
		require 'font-end/formations/modules/sondage.php';
	break;

	// reultat quiz
	case $url[0]=='resultat-quiz':
		require 'font-end/formations/modules/resulat-quiz.php';
	break;

	// reultat sondage
	case $url[0]=='resultat-sondage':
		require 'font-end/formations/modules/resultat-sondage.php';
	break;
	/*==================================================*/

	case $url[0]=='form':
		require 'font-end/participants/form.php';
	break;


	case $url[0]=='formulaire-conclusion':
		require 'font-end/formations/modules/sondage2.php';
	break;

	case $url[0]=='profil-intervenant':
		require 'font-end/formations/modules/intervenant/show.php';
	break;

	/*==================================================*/

	case $url[0]=='activite':
		require 'font-end/activite/show.php';
	break;

	case $url[0]=='photos':
		require 'font-end/activite/photos.php';
	break;


	case $url[0]=='videos':
		require 'font-end/activite/videos.php';
	break;

	case $url[0]=='activites':
		require 'font-end/activite/index.php';
	break;

	case $url[0]=='evenements':
		require 'font-end/evenement/index.php';
	break;

	case $url[0]=='projets':
		require 'font-end/projet/index.php';
	break;

	case $url[0]=='projet':
		require 'font-end/projet/show.php';
	break;

	case $url[0]=='galerie-de-photos':
		require 'font-end/galerie/photos.php';
	break;

	case $url[0]=='galerie-de-videos':
		require 'font-end/galerie/videos.php';
	break;

	case $url[0]=='publications':
		require 'font-end/publication/index.php';
	break;

	case $url[0]=='publication':
		require 'font-end/publication/show.php';
	break;

	case $url[0]=='offres':
		require 'font-end/offres/index.php';
	break;

	case $url[0]=='offre-emploi':
		require 'font-end/offres/show.php';
	break;



	default:
		require 'font-end/erreur/404.php';
	break;
}

// if ($url=='') {
// 	echo "Page Acceuil";
// }elseif ($url[2]) {
// 	echo "Liste des articles";
// }

