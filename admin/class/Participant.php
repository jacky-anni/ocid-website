<?php

	class Participant
	{
		private $nom;
		private $prenom;
		private $lieu_naissance;
		private $departement;
		private $commune;
		private $niveau;
		private $universite;
		private $domaine;
		private $organisation;
		private $parti;
		private $occupation;
		private $email;
		private $whatsapp;
		private $numero;
		private $condition;
		private $password;
		private $password_confirmation;

		function __construct($nom,$prenom,$lieu_naissance,$departement,$commune,$niveau,$universite,$domaine,$organisation,$parti,$occupation,$email,$whatsapp,$numero,$condition,$password,$password_confirmation)
		{

			$nom=htmlspecialchars($nom);
			$prenom=htmlspecialchars($prenom);
			$lieu_naissance=htmlspecialchars($lieu_naissance);
			$departement=htmlspecialchars($departement);
			$commune=htmlspecialchars($commune);
			$niveau=htmlspecialchars($niveau);
			$universite=htmlspecialchars($universite);
			$domaine=htmlspecialchars($domaine);
			$organisation=htmlspecialchars($organisation);
			$parti=htmlspecialchars($parti);
			$occupation=htmlspecialchars($occupation);
			$email=htmlspecialchars(trim($email));
			$whatsapp=htmlspecialchars($whatsapp);
			$numero=htmlspecialchars($numero);
			$condition=htmlspecialchars($condition);
			$password=htmlspecialchars($password);
			$password_confirmation=htmlspecialchars($password_confirmation);
			
			
			// initialisation
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->lieu_naissance=$lieu_naissance;
			$this->departement=$departement;
			$this->commune=$commune;
			$this->niveau=$niveau;
			$this->universite=$universite;
			$this->domaine=$domaine;
			$this->organisation=$organisation;
			$this->parti=$parti;
			$this->occupation=$occupation;
			$this->email=$email;
			$this->whatsapp=$whatsapp;
			$this->numero=$numero;
			$this->condition=$condition;
			$this->password=$password;
			$this->password_confirmation=$password_confirmation;

		}

		public function ajouter($formation_suivie)
		{
			// verifier si la formation existe
			$formation = Query::affiche('formation',$formation_suivie,'id');

			// si il existe 
			if($formation){
				require './font-end/layout/config.php';
				// verifier tous les champs
				if(!empty($this->nom) AND !empty($this->prenom) AND !empty($this->lieu_naissance) AND !empty($this->departement) AND !empty($this->commune) AND !empty($this->niveau) AND!empty($this->email) AND !empty($this->whatsapp) AND !empty($this->condition) AND !empty($this->password) AND !empty($this->password_confirmation)){


					//valideer les choix
					if ($this->niveau=='Universitaire') {
						$this->universite=$this->universite;
						$this->domaine=$this->domaine;
					}else{
						$this->universite='';
						$this->domaine='';
					}


					if($this->whatsapp=='Oui'){
						$this->numero=$this->numero;
					}else{
						$this->numero='';
					}

					// Valider l'email
					  if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
					  	// valider password
					    	if($this->password==$this->password_confirmation){
					    		// // verifier si l'email existe
					    		$count = Query::count_prepare('participant',$this->email,'email');
					    		// $id=rand(100,999).$count.rand(100,999);
					    		if (!$count) {

					    			$count_total = Query::count_query('participant');
					    			$id = $count_total+1;

					    			$req=class_bdd::connexion_bdd()->prepare("INSERT INTO participant(id,nom,prenom,lieu_naissance,departement,commune,niveau,universite,domaine_etude,organisation,parti,occupation,email,telephone,numero_what,signature,photo,mdp,active,date_post) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
					    		$req->execute(array($id, $this->nom,$this->prenom,$this->lieu_naissance,$this->departement,$this->commune,$this->niveau,$this->universite,$this->domaine,$this->organisation,$this->parti,$this->occupation,$this->email,$this->whatsapp,$this->numero,$this->condition,'user.png',sha1($this->password),0));
					    			$token=sha1($this->email).sha1($this->password);

					    			$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
					    			$req1->execute(array($id,$formation->id));
					    			
					    			// envoie mail
					    			self::mail($id,$formation->id);
					    			echo "<script>window.location ='$link_menu/activation/$id';</script>";
					    			// echo "<script>window.location ='$link_menu/activation/$id';</script>";

					    		}else{
					    			// Fonctions::set_flash('Ce compte existe déjà, connectez-vous','success');
					    			echo "<p class='alert alert-danger'>Ce compte existe déjà.</p>";
									// echo "<scrip>twindow.location ='$link_menu/connexion';</script>";
					    		}

							}else{
								echo "<p class='alert alert-danger'>Les mots de passe ne sont pas disponibles.</p>";
							}
					  }else{
					  	echo "<p class='alert alert-danger'>L'adresse e-mail n'est pas valide</p>";
					  }

				}else{
					echo "<p class='alert alert-danger'>Seulement le champs (Etes – vous et occupation) qui doivent être vide</p>";
				}

			}else{
				echo "<script>window.location ='$link_menu/formations';</script>";
			}
		}


		public static function mail($id,$formation_suivie){
			require 'font-end/layout/config.php';
			// selectionner le participant
			$user=Query::affiche('participant',$id,'id');
			// selectionner l'organisation en question
			$org=Query::affiche('organisation',1,'id');
			//token pour la validation
			$token=sha1($user->email).$user->mdp;
			// sujet de l'email
			$Subject = "Confirmation de compte pour la formation de l'OCID";
			// outil de configuration
			$headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	        // le message
			$Msg="
				<head>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'>
					<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
					<meta content='width=device-width, initial-scale=1.0' name='viewport'/>
					<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
				</head>

				<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
				    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
				        <!-- LOGO -->
				        <tr>
				            <td bgcolor='#26a8b4' align='center'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#26a8b4' align='center' style='padding: 0px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
				                            <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Bienvenue!</h1> <img src='$org->site_web/$link_admin/dist/img/logo/$org->logo' width='125' height='120' style='display: block; border: 0px;' />
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
				                        	
				                        	
				                            <p style='margin: 20px; font-size:17px; line-height:23px;'>
				                            Salut $user->prenom,<br/>
				                            Nous sommes ravis de vous voir commencer. Tout d'abord, vous devez confirmer votre compte. Appuyez simplement sur le bouton ci-dessous.</p>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left'>
				                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                                <tr>
				                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>

				                                        <table border='0' cellspacing='0' cellpadding='0'>
				                                            <tr>
				                                                <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='$org->site_web/$link_menu/activation/$token/$id/$formation_suivie' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; background-color: #26a8b4; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #26a8b4; display: inline-block;'>Confirmer votre compte</a>
				                                                </td>
				                                            </tr>
				                                        </table>
				                                    </td>
				                                </tr>
				                            </table>
				                        </td>
				                    </tr> <!-- COPY -->


				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
				                            <p style='margin: 20px; font-size:17px;'>L'equipe de l'OCID</p>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
				                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Pour plus d'informations</h2>
				                            <p style='margin: 0;'><a href='#' target='_blank' style='color: #FFA73B;'>www.ocid.org</a></p>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				    </table>
				</body>";
				// envoyer email
				$SendMessage = mail($user->email,$Subject,$Msg,$headers);
			    if ($SendMessage==true) {
			    	echo "";
			    }else
			    {
			    	echo "";
			    }
		}

		public static function activation($token,$id){
			// selectionner participant
			require './font-end/layout/config.php';
			$user=Query::affiche('participant',$id,'id');
			if ($user) {
				// generer le token
				$token_recuperer=sha1($user->email).$user->mdp;
				// si tous ce passe bien
				if ($token_recuperer==$token) {
					// activer le compte
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET active=? WHERE id=?");
					$requette->execute(array(1,$user->id));
					Fonctions::set_flash('Compte validé avec suucès, connectez-vous','success');
					echo "<script>window.location ='$link_menu/connexion';</script>";
					// header("location:$link_menu/tableau-de-bord");
					
				}else{
					// sinon
					Fonctions::set_flash('Compte validé avec suucès, connectez-vous','success');
					echo "<script>window.location ='$link_menu/connexion';</script>";
				}
			}else{
				Fonctions::set_flash("Ce compte n'existe pas ",'success');
				echo "<script>window.location ='$link_menu/connexion';</script>";
			}
		}

		public static function authentifier($email,$password){

			// verifier si l'email est valide 
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				// verifier l'email et le mot de passe 
				$requette=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant WHERE email=? AND mdp=?");
				$requette->execute(array($email,sha1($password)));
				$userFound=$requette->rowCount();
				if ($userFound==1) {
					// verifier si le compte est active
					$user=$requette->fetch(PDO::FETCH_OBJ);
					// verifier si le compte est active
					$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant WHERE id=? AND active=?");
					$req->execute(array($user->id,1));
					$userActive=$req->rowCount();

					if($userActive){
						require '../../font-end/layout/config.php';
						session_start();
						$_SESSION['id_user']=$user->id;
						// selectionner nom
						$_SESSION['nom']=$user->nom;
						// selectionner prenom
						$_SESSION['prenom']=$user->prenom;
						// // selectionner email
						$_SESSION['email']=$user->email;

						if ($_SESSION['redirec_url']) {
							$url=$_SESSION['redirec_url'];
						}else{
							$url="$link_menu/tableau-de-bord";
						}
						$_SESSION['redirec_url']=null;
						
						echo "<script>window.location ='$url';</script>";
						

					}else{
						echo "<p class='alert alert-danger'>Ce compte n'est pas activé, un email de confirmation a envoyé sur $user->email</p>";
					}
					
				}else{
					// si les donnees ne sont pas correct
					echo "<p class='alert alert-danger'>Email ou mot de passe incorrect</p>";
				}
			}else{
				// si les donnees ne sont pas correct
					echo "<p class='alert alert-danger'>L'email n'est pa valide</p>";
			}
			
		}

		// modifier profil
		public static function modifier_profil($nom,$prenom,$lieu_naissance,$departement,$commune,$niveau,$universite,$domaine,$organisation,$parti,$occupation,$email,$numero)
		{
			require './font-end/layout/config.php';
			// modifier le profil

			// valideer les choix
			if ($niveau=='Universitaire') {
				$universite=$universite;
				$domaine=$domaine;
			}else{
				$universite='';
				$domaine='';
			}

			if($whatsapp=='Oui'){
				$numero=$numero;
			}else{
				$numero='';
			}


			if (isset($nom)) {
				// modifer nom
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET nom=? WHERE id=?");
				$requette->execute(array($nom,$_SESSION['id_user']));
			}

			if (isset($prenom)) {
				// modifer prenom
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET prenom=? WHERE id=?");
				$requette->execute(array($prenom,$_SESSION['id_user']));
			}

			if (isset($lieu_naissance)) {
				// modifer lieu de naissance
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET lieu_naissance=? WHERE id=?");
				$requette->execute(array($lieu_naissance,$_SESSION['id_user']));
			}

			if (isset($departement)) {
				// modifer departement
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET departement=? WHERE id=?");
				$requette->execute(array($departement,$_SESSION['id_user']));
			}

			if (isset($commune)) {
				// modifer commune
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET commune=? WHERE id=?");
				$requette->execute(array($commune,$_SESSION['id_user']));
			}

			if (isset($niveau)) {
				// modifer niveau
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET niveau=? WHERE id=?");
				$requette->execute(array($niveau,$_SESSION['id_user']));
			}

			if (isset($universite)=='Universitaire') {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET universite=? WHERE id=?");
				$requette->execute(array($universite,$_SESSION['id_user']));

				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET domaine_etude=? WHERE id=?");
				$requette->execute(array($domaine,$_SESSION['id_user']));
			}


			if (isset($organisation)) {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET organisation=? WHERE id=?");
				$requette->execute(array($organisation,$_SESSION['id_user']));
			}

			if (isset($parti)) {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET parti=? WHERE id=?");
				$requette->execute(array($parti,$_SESSION['id_user']));
			}

			if (isset($occupation)) {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET occupation=? WHERE id=?");
				$requette->execute(array($occupation,$_SESSION['id_user']));
			}

			if (isset($email)) {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET email=? WHERE id=?");
				$requette->execute(array($email,$_SESSION['id_user']));
			}


			if (isset($numero)) {
				// modifer numero
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET numero_what=? WHERE id=?");
				$requette->execute(array($numero,$_SESSION['id_user']));

				// valider telephone
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET 	telephone=? WHERE id=?");
				$requette->execute(array('Oui',$_SESSION['id_user']));
			}

			Fonctions::set_flash('Profil modifié','success');
			echo "<script>window.location ='$link_menu/profile';</script>";
		}

		// modifier la photo de profil
		// modifier photo
		public static function upload($photo,$id)
		{
			//selectionner l'utilisateur en cours 
			$user=Query::affiche('participant',$id,'id');
			// // supprmer l'ancienne photo
			 Query::supprimer_fichier_one('../../dist/img/user/participant/'.$user->photo);

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET photo=? WHERE id=?");
			$requette->execute(array($photo,$id));
			Fonctions::set_flash('Photo de profil modifiée','success');
			echo "<script>window.location ='$link_menu/profile';</script>";
			
		}

		// modifier le mot de passe
		public static function modifier_password($password_actuel,$password,$password_confirmation)
		{
			// include config
			require './font-end/layout/config.php';
			// selection le mot de passe en cours
			$password_actuel=Query::affiche('participant',sha1($password_actuel),'mdp');
			// verifier si on a un bon de passe
			if($password_actuel){
				// verifier si les mots de passe sont les memes
				if($password==$password_confirmation){
					// mettre a jour le mot de passe
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET mdp=? WHERE id=?");
					$requette->execute(array(sha1($password),$_SESSION['id_user']));
					$url=$_SERVER['REQUEST_URI'];
					Fonctions::set_flash("Votre mot de passe a été modifié",'success');
					echo "<script>window.location ='$url';</script>";
				}else{
					// si les mots de passe ne sont pas les memes
					$url=$_SESSION['redirec_url'];
					Fonctions::set_flash("Les mots de passe ne sont identiques",'danger');
					echo "<script>window.location ='$url';</script>";
				}

			}else{
				// si le mot de passe actuel n'est pas correct
				$url=$_SESSION['redirec_url'];
				Fonctions::set_flash("Le mot de passe actuel n'est pas correct",'danger');
				echo "<script>window.location ='$url';</script>";
			}
		}

		// reset password
		public static function reset_password_mail($email){
			require 'font-end/layout/config.php';
			// selectionner le participant
			$user=Query::affiche('participant',$email,'email');
			if (!$user) {
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Cet email n'existe pas.",'danger');
				echo "<script>window.location ='$url';</script>";
			}
			// selectionner l'organisation en question
			$org=Query::affiche('organisation',1,'id');
			// token
			$token=sha1($user->email).$user->mdp;
			// sujet de l'email
			$Subject = "Reinitialisation de mot de passe";
			// outil de configuration
			$headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	        // le message
			$Msg="
				<head>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
					<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'>
					<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
					<meta content='width=device-width, initial-scale=1.0' name='viewport'/>
					<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
				</head>

				<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
				    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
				        <!-- LOGO -->
				        <tr>
				            <td bgcolor='#26a8b4' align='center'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#26a8b4' align='center' style='padding: 0px 10px 0px 10px;'>
				              
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
				                        
				                            <p style='margin: 20px; font-size:17px; line-height:23px; margin-top:-20px;'>
				                            Salut $user->prenom,<br/>
				                            si vous n'avez pas fait cette demande, ignorez simplement cet e-mail. Sinon, veuillez cliquer sur le bouton ci-dessous pour changer votre mot de passe</p>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left'>
				                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                                <tr>
				                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>

				                                        <table border='0' cellspacing='0' cellpadding='0'>
				                                            <tr>
				                                                <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='$org->site_web/reset-password/$token/$email/edit' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; background-color: #26a8b4; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #26a8b4; display: inline-block;'>Reinitialiser</a></td>
				                                            </tr>
				                                        </table>

				                                    </td>
				                                </tr>
				                            </table>
				                        </td>
				                    </tr> <!-- COPY -->


				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
				                            <p style='margin: 20px; font-size:17px;'>L'equipe de l'OCID</p>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				        <tr>
				            <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
				                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
				                    <tr>
				                        <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
				                            <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Pour plus d'informations</h2>
				                            <p style='margin: 0;'><a href='#' target='_blank' style='color: #FFA73B;'>www.ocid.org</a></p>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				        </tr>
				    </table>
				</body>";
				// envoyer email
				$SendMessage = mail($user->email,$Subject,$Msg,$headers);
			    if ($SendMessage==true) {
			    	$url=$_SERVER['REQUEST_URI'];
			    	Fonctions::set_flash("Un message de restauration envoyé sur $user->email",'success');
			    	echo "<script>window.location ='$url';</script>";
			    }else
			    {
			    	echo "";
			    }
		}

		// modifier le mot de passe
		public static function reset_password($token_user,$email,$password,$password_confirmation)
		{
			// include config
			require './font-end/layout/config.php';
			$user=Query::affiche('participant',$email,'email');
			if (!$user) {
				// echo "<p class='alert alert-danger'>Cette email n'existe pas.</p>";
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Cette email n'existe pas.",'danger');
				echo "<script>window.location ='$url';</script>";
			}
			// gereation de token
			$token=sha1($user->email).$user->mdp;

			if($token_user!=$token) {
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Une erreur s'est produite",'danger');
				echo "<script>window.location ='$url';</script>";
			}


			if($password==$password_confirmation){
				// verifier l'email
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET mdp=? WHERE email=?");
					$requette->execute(array(sha1($password),$email));
					Fonctions::set_flash("Votre mot de passe a été modifié avec succès",'success');
					echo "<script>window.location ='$link_menu/connexion';</script>";

				}else{
					// si le mot de passe actuel n'est pas correct
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("L'adresse email n'est pas valide",'danger');
				echo "<script>window.location ='$url';</script>";
				}

			}else{
				// si le mot de passe actuel n'est pas correct
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Les mots de passe ne sont pas identiques",'danger');
				echo "<script>window.location ='$url';</script>";
			}
			
		}


		// valider participant par admin
		public static function valider_or_no($participant,$formation,$statut){
			// rechercher le participant 
			$participant = Query::affiche('participant',$participant,'id');
			// rechercher la formation
			$formation = Query::affiche('formation',$formation,'id');

			if($participant){
				if ($formation) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET active=? WHERE id=?");
					$requette->execute(array($statut,$participant->id));

					// verifier si on a deja suie ce courd

					$requette1=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_participant=? AND id_formation=?");
					$requette1->execute(array($participant->id,$formation->id));
					$count = $requette1->rowCount();

					if($count==0){
						$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO formation_suivie (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
					 	$req1->execute(array($participant->id,$formation->id));
					}

					$url=$_SERVER['REQUEST_URI'];
					$Msg = "<head>
						<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
						<link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'>
						<meta content='width=device-width, initial-scale=1.0' name='viewport'/>
						<meta http-equiv='Content-type' content='text/html; charset=utf-8'>
						</head>
						<body>
							<div style='margin: 15px;'
								<br>
								<h4 syle='margin-top:40px;' >Salut $participant->prenom , </h4>
									<p>Observatoire Citoyen pour l'Institutionnalisation (OCID) a le plaisir pour vous anoncer que votre inscription au cours de <b>$formation->titre</b> à été validée avec succès </p> <br>
									<a href='http://www.ocidhaiti.org/tableau-de-bord'
										<button class='btn btn-primary btn-xs'> Commencer à apprendre </button>
								</a>
								
								 </br><br>
								<i>Equipe de l'OCID</i>
							</div>
						</body>
						</html>";
						Fonctions::set_flash("$participant->prenom "." a été validé avec succès",'success');
					//==========================================================================================
					// envoyer l'email 
					// sujet de l'email
					$Subject = "Validation de compte";
					// outil de configuration
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
					
			        // le message
					//envoyer email
					$SendMessage = mail($participant->email,$Subject,$Msg,$headers);
				    if ($SendMessage==true) {
				    	$url=$_SERVER['REQUEST_URI'];
				    	echo "<script>window.location ='$url';</script>";
				    }else
				    {
				    	echo "";
				    }

				    $url=$_SERVER['REQUEST_URI'];
					echo "<script>window.location ='$url';</script>";
				}else{
					Fonctions::set_flash("cette formation n'existe pas",'danger');
					echo "<script>window.location ='?page=formations';</script>";
				}
			}else{
				$url=$_SERVER['REQUEST_URI'];
				Fonctions::set_flash("Participant n'existe pas",'danger');
				echo "<script>window.location ='$url';</script>";
			}
		}

	}
?>