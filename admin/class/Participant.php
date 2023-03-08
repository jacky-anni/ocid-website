<?php

	class Participant
	{
		private $nom;
		private $prenom;
		private $sexe;
		private $departement;
		private $commune;
		private $telephone;
		private $telephone2;
		private $email;
		private $password;
		private $password_confirmation;

		function __construct($nom,$prenom,$sexe,$departement,$commune,$telephone,$telephone2,$email,$password,$password_confirmation)
		{

			$nom=htmlspecialchars($nom);
			$prenom=htmlspecialchars($prenom);
			$sexe=htmlspecialchars($sexe);
			$departement=htmlspecialchars($departement);
			$commune=htmlspecialchars($commune);
			$telephone=htmlspecialchars($telephone);
			$telephone2=htmlspecialchars($telephone2);
			$email=htmlspecialchars($email);
			$password=htmlspecialchars($password);
			$password_confirmation=htmlspecialchars($password_confirmation);
			
			
			// initialisation
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->sexe=$sexe;
			$this->departement=$departement;
			$this->commune=$commune;
			$this->telephone=$telephone;
			$this->telephone2=$telephone2;
			$this->email=$email;
			$this->password=$password;
			$this->password_confirmation=$password_confirmation;
		}

		// particpant de formation
		public static function ajouter($nom,$prenom,$departement,$commune,$sexe,$profession,$numero,$email,$telephone2,$niveau,$domaine,$membre,$structure,$etude,$password,$password_confirmation,$formation)
		{
			require './font-end/layout/config.php';
			// selectionner la fonction en question
			$formation = Query::affiche('formation',$formation,'id');
			if($formation) {
				// verifier si les mots de passe sont identiques
				if($password and $password_confirmation){
				// verifier si cet utilisateur est est deja existe
				$user = Query::affiche('participant_',$email,'email');
				// if existe user
				$user_exist = Query::count_prepare('participant',$email,'email');
				// definir l'ID du participant de
				$id = rand(100,999).Query::count_query('participant');

				// definirle rand pour le token 
				$rand = rand(100,999).rand(100,999);
				// definir le token 
				$token=sha1($formation->id).sha1($email).$rand;
				// // si il existe

				if($user_exist==0){
					if(!$user){
						// inserer le participant
						$req=class_bdd::connexion_bdd()->prepare("INSERT INTO participant(id,nom,prenom,sexe,departement,commune,email,telephone,telephone2,niveau,domiante_rtude,profession,qui_este_vous,nom_institution,participation_poitiques_publiques,photo,mdp,active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$req->execute(array($id,$nom,$prenom,$sexe,$departement,$commune,$email,$numero,$telephone2,$niveau,$domaine,$profession,$membre,$structure,$etude,'user.png',sha1($password),0));

						$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO token (id_user,rand_,token,action,date_post) VALUES (?,?,?,?,NOW())");
						$req1->execute(array($id,$rand,$token,"Active"));

						self::mail($id,$formation->id,$token,$rand);
						echo "<script>window.location ='$link_menu/activation/$id';</script>";
						// Fonctions::set_flash('Formation_suivie, connectez vous pour continuer','success');
						// $url = $_SERVER['REQUEST_URI'];
						// echo "<script>window.location ='$url/$id/2';</script>";
					}else{
						// inserer le participant la table
						$req=class_bdd::connexion_bdd()->prepare("INSERT INTO participant(id,nom,prenom,sexe,departement,commune,email,telephone,telephone2,niveau,domiante_rtude,profession,qui_este_vous,nom_institution,participation_poitiques_publiques,photo,mdp,active) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
						$req->execute(array($user->id,$nom,$prenom,$sexe,$departement,$commune,$email,$numero,$telephone2,$niveau,$domaine,$profession,$membre,$structure,$etude,$user->photo,sha1($password),1));

						// verifier s'il est deja suivie ce cours
						$requette2=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_participant=? AND id_formation=?");
						$requette2->execute(array($user->id,$formation->id));
						$data=$requette2->rowCount();
						// sinon, inserer dans la table de formation suivie
						if($data==0){
							$requette1=class_bdd::connexion_bdd()->prepare("INSERT INTO formation_suivie(id_participant,id_formation) VALUES(?,?)");
							$requette1->execute(array($user->id,$formation->id));
						}
						Fonctions::set_flash('Inscription effectué avec succès, connectez vous pour integrer notre communauté','success');
						echo "<script>window.location ='$link_menu/connexion';</script>";
					}
				}else{
				 echo "<p class='alert alert-danger'>Ce compte existe deja.</p>";
				}
				}else{
					echo "<p class='alert alert-danger'>Les mots de passe ne sont pas identiques.</p>";
				}
			}else{
				echo "<p class='alert alert-danger'>Cette formation n'est pas existe </p>";
			}
			
		}


		public static function mail($id,$formation_suivie,$token,$rand){
			require 'font-end/layout/config.php';
			// selectionner le participant
			$user=Query::affiche('participant',$id,'id');
			// selectionner l'organisation en question
			$org=Query::affiche('organisation',1,'id');

			$formation=Query::affiche('formation',$formation_suivie,'id');

			// sujet de l'email
			$Subject = "Confirmation de compte pour la formation de l'OCID";
			// outil de configuration
			$headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

			$Msg = "<p style='margin: 20px; font-size:17px;'>
				Salut <b>$user->prenom</b>,<br/>
				Nous sommes ravis de vous voir commencer le cours <b> <i>$formation->titre</i> </b> Tout d'abord, vous devez confirmer votre compte. Appuyez simplement sur le lien ci-dessous.</br>
				<a href='$org->site_web/activation/$token/$rand/$formation->id/$user->id' target='_blank'>Reinitialiser Confirmer votre email</a>
				</p>";
	        // le message
				//envoyer email
				$SendMessage = mail($user->email,$Subject,$Msg,$headers);
			    if ($SendMessage==true) {
			    	echo "";
			    }else
			    {
			    	echo "";
			    }
		}

		public static function activation($id,$formation_suivie,$token,$rand){
			// selectionner participant
			require './font-end/layout/config.php';
			$user=Query::affiche('participant',$id,'id');
			if($user){
				// verifier le token
				$requette1=class_bdd::connexion_bdd()->prepare("SELECT * FROM token WHERE id_user=? AND rand_=? AND token=?");
				$requette1->execute(array($id,$rand,$token));
				$verif_token =$requette1->fetch(PDO::FETCH_OBJ);
				if($verif_token){
						$formation=Query::affiche('formation',$formation_suivie,'id');
						if($formation){
							// verifie si on a deja suivie cette formation 
							$requette2=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_participant=? AND id_formation=?");
							$requette2->execute(array($user->id,$formation->id));
							$data=$requette2->rowCount();
							if($data==0){
								$requette1=class_bdd::connexion_bdd()->prepare("INSERT INTO formation_suivie(id_participant,id_formation) VALUES(?,?)");
								$requette1->execute(array($user->id,$formation->id));
							}
							$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET active=? WHERE id=?");
							$requette->execute(array(1,$user->id));

							Query::supprimer('token',$verif_token->id);

							Fonctions::set_flash("Compte activé",'success');
							echo "<script>window.location ='$link_menu/connexion';</script>";

						}else{
							Fonctions::set_flash("Cette formation n'existe pas",'warning');
							echo "<script>window.location ='$link_menu/formations';</script>";
						}
				}else{
					Fonctions::set_flash('Lien de validation invalide','warning');
			        echo "<script>window.location ='$link_menu/connexion';</script>";
				}

			}else{
				echo "<script>window.location ='$link_menu/404';</script>";
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
						// departement
						$_SESSION['departement']=$user->departement;

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
		public static function modifier_profil($nom,$prenom,$sexe,$departement,$commune,$telephone,$telephone2,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant)
		{
			require './font-end/layout/config.php';

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

			if (isset($sexe)) {
				// modifer lieu de naissance
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET sexe=? WHERE id=?");
				$requette->execute(array($sexe,$_SESSION['id_user']));
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

			if (isset($telephone)) {
				// modifer telephone
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET telephone=? WHERE id=?");
				$requette->execute(array($telephone,$_SESSION['id_user']));
			}

			if (isset($telephone2)) {
				// modifer telephone
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET telephone2=? WHERE id=?");
				$requette->execute(array($telephone2,$_SESSION['id_user']));
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
					Fonctions::set_flash("Votre mot de passe a été modifié",'success');
					echo "<script>window.location ='$link_menu/deconnexion';</script>";
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
			$Msg = "<p style='margin: 20px; font-size:17px;'>
					Salut <b>$user->prenom</b>,<br/>
					si vous n'avez pas fait cette demande, ignorez simplement cet e-mail. Sinon, veuillez cliquer sur le bouton ci-dessous pour changer votre mot de passe </br>
					<a href='$org->site_web/reset-password/$token/$email/edit' target='_blank' style='color:blue; font-weight: bold'>Confirmer mon compte</a>
					</p>";

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
								if($statut==1){
									<h6 syle='margin-top:40px;' >Salut $participant->prenom , </h6>
									<p>Observatoire Citoyen pour l'Institutionnalisation (OCID) a le plaisir pour vous anoncer que votre inscription au cour de <b>$formation->titre</b> à été validée avec succès </p> <br>
									<a href='www.ocidhaiti.org/connexion''
										<button class='btn btn-primary btn-xs'> Commencer à apprendre </button>
									</a>
								}else{
									<h6 syle='margin-top:40px;' >Salut $participant->prenom , </h6>
									<p>Observatoire Citoyen pour l'Institutionnalisation (OCID) a le regret pour vous anoncer que votre inscription au cour de <b>$formation->titre</b> à été réfusée </p> <br>
								}
								
								 </br><br>
								<i>Equipe de l'OCID</i>
							</div>
						</body>
						</html>";
					if($statut==1){
						Fonctions::set_flash("$participant->prenom"." a été validé avec succès",'success');
					}else{
						Fonctions::set_flash("$participant->prenom"." a été réfusé avec succès",'success');
					}
					//==========================================================================================
					// envoyer l'email 
					// sujet de l'email
					$Subject = "Validation de compte";
					// outil de configuration
					$headers  = 'MIME-Version: 1.0' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			        // le message
					// envoyer email
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