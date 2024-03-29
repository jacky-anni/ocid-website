<?php

	class Participant_Pol
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
		public function ajouter($formation_suivie)
		{
			// verifier si la formation existe
			$formation = Query::affiche('formation',$formation_suivie,'id');
			// si il existe 
			if($formation){
				require './font-end/layout/config.php';
				// verifier tous les champs
				if(!empty($this->nom) AND !empty($this->prenom) AND !empty($this->sexe) AND !empty($this->departement) AND !empty($this->commune) AND !empty($this->telephone) AND!empty($this->email)   AND !empty($this->password) AND !empty($this->password_confirmation) ){

					// Valider l'email
					  if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
					  	// valider password
					    	if($this->password==$this->password_confirmation){
					    		// // verifier si l'email existe
					    		$count = Query::count_prepare('liste_certifie_socpol',$this->email,'email');
					    		if ($count==1) {
					    			//  verifier si on a reussie la formation 
					    			$user_formation= Query::affiche('participant',$this->email,'email');
										// verifier si on adeja inscrit
										$requette2=class_bdd::connexion_bdd()->prepare("SELECT * FROM inscription WHERE id_participant=? AND id_formation=?");
										$requette2->execute(array($user_formation->id,$formation->id));
										$data=$requette2->rowCount();
										if($data==0){
											// remplacer les modifications 
											$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET nom=?, prenom=?, sexe=?, departement=?, commune=?, telephone=?, telephone2=?, active=?,mdp=? WHERE id=?");
											$requette->execute(array($this->nom,$this->prenom,$this->sexe,$this->departement,$this->commune,$this->telephone,$this->telephone2,0,sha1($this->password),$user_formation->id));
											
											$rand = rand(100,999).rand(100,999);
											$token=sha1($user_formation->id).sha1($this->email).$rand;
											
											$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
											$req1->execute(array($user_formation->id,$formation->id));

											$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO token (id_user,rand_,token,action,date_post) VALUES (?,?,?,?,NOW())");
											$req1->execute(array($user_formation->id,$rand,$token,"Active"));
											// envoie mail
											self::mail($user_formation->id,$formation->id,$token,$rand);
											echo "<script>window.location ='$link_menu/activation/$user_formation->id&action=ksjxxbxbbdgb';</script>";
										}else{
											echo "<p class='alert alert-danger'>Vous avez déà suivie cette formation</p>";
										}

					    		}else{

									echo "<p class='alert alert-danger'>Vous n'avez pas été réussi la formation en Socialisation Politique.</p>";
					    			
									// echo "<scrip>twindow.location ='$link_menu/connexion';</script>";
					    		}

							}else{
								echo "<p class='alert alert-danger'>Les mots de passe ne sont pas disponibles.</p>";
							}
					  }else{
					  	echo "<p class='alert alert-danger'>L'adresse e-mail n'est pas valide</p>";
					  }

				}else{
					echo "<p class='alert alert-danger'>Seulement le champ	Téléphone alternatif  qui doit être vide</p>";
				}

			}else{
				echo "<script>window.location ='$link_menu/formations';</script>";
			}
		}

		// participant 
		public function ajouter_societe_politque($formation_suivie,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant)
		{
			// verifier si la formation existe
			$formation = Query::affiche('formation',$formation_suivie,'id');
			// si il existe 
			if($formation){
				require './font-end/layout/config.php';
				// verifier tous les champs
				if(!empty($this->nom) AND !empty($this->prenom) AND !empty($this->sexe) AND !empty($this->departement) AND !empty($this->commune) AND !empty($this->telephone) AND!empty($this->email)   AND !empty($this->password) AND !empty($this->password_confirmation)){
					// Valider l'email

					if(!empty($societe) AND !empty($adresse) AND !empty($nom_dirigeant) AND !empty($telephone_dirigeant) AND !empty($email_dirigeant)){

					  if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
					  	// valider password
					    	if($this->password==$this->password_confirmation){
					    			//  verifier si on a reussie la formation 
									$user_formation= Query::affiche('participant',$this->email,'email');

									if(!$user_formation){
										$id = rand(100,999).Query::count_query('participant');
										$rand = rand(100,999).rand(100,999);
										$token=sha1($id).sha1($this->email).$rand;
										//information generales
										$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO participant (id,nom,prenom,sexe,departement,commune,email,telephone,telephone2,signature,photo,active,update_,mdp,date_post) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
										$requette->execute(array($id,$this->nom,$this->prenom,$this->sexe,$this->departement,$this->commune,$this->email,$this->telephone,$this->telephone2,"Oui","user.png",0,0,sha1($this->password)));

										// inscription
										$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
										$req1->execute(array($id,$formation->id));
										// recommoantio
										$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO recommandation (id_user,institution,adresse,nom_dirigeaint,telephone,email,document,date_post) VALUES (?,?,?,?,?,?,?,NOW())");
										$req1->execute(array($id,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant,""));

											// creation de token 
										$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO token (id_user,rand_,token,action,date_post) VALUES (?,?,?,?,NOW())");
										$req1->execute(array($id,$rand,$token,"Active"));
										// envoie mail
										self::mail($id,$formation->id,$token,$rand);
										header("Location:$link_menu/activation/$id");
										echo "<script>window.location ='$link_menu/activation/$id';</script>";
									}else{
										// verifier si on a deja inscrit
										$requette2=class_bdd::connexion_bdd()->prepare("SELECT * FROM inscription WHERE id_participant=? AND id_formation=?");
										$requette2->execute(array($formation->id,$user_formation->id));
										$data=$requette2->rowCount();
										// sinon
										if (!$data){
											// remplacer les modifications 
											$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET nom=?, prenom=?, sexe=?, departement=?, commune=?, telephone=?, telephone2=?, active=?,mdp=? WHERE id=?");
											$requette->execute(array($this->nom,$this->prenom,$this->sexe,$this->departement,$this->commune,$this->telephone,$this->telephone2,1,sha1($this->password),$user_formation->id));
											


											
											
											
											// $req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO recommandation (id_user,institution,adresse,nom_dirigeaint,telephone,email,document,date_post) VALUES (?,?,?,?,?,?,?,NOW())");
											// $req1->execute(array($user_formation->id,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant,""));


											// $req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
											// $req1->execute(array($user_formation->id,$formation->id));

											// $req2 = class_bdd::connexion_bdd()->prepare("INSERT INTO formation_suivie (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
											// $req2->execute(array($user_formation->id,$formation->id));

											// Fonctions::set_flash('Formation_suivie, connectez vous','success');
											// echo "<script>window.location ='$link_menu/connexion';</script>";
										}else{

										}
									}

									///si le compte n'existe pas
					    			//if(!$user_formation) {
										// creation de l'id
										// $id = rand(100,999).Query::count_query('participant');
										// $rand = rand(100,999).rand(100,999);
										// $token=sha1($id).sha1($this->email).$rand;
										// //information generales
										// $requette=class_bdd::connexion_bdd()->prepare("INSERT INTO participant (id,nom,prenom,sexe,departement,commune,email,telephone,telephone2,signature,photo,active,update_,mdp,date_post) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
										// $requette->execute(array($id,$this->nom,$this->prenom,$this->sexe,$this->departement,$this->commune,$this->email,$this->telephone,$this->telephone2,"Oui","user.png",0,0,sha1($this->password)));

									// 	// inscription
									// 	$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
									// 	$req1->execute(array($id,$formation->id));

									// 	// creation de token 
									// 	$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO token (id_user,rand_,token,action,date_post) VALUES (?,?,?,?,NOW())");
									// 	$req1->execute(array($id,$rand,$token,"Active"));

									// 	$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO recommandation (id_user,institution,adresse,nom_dirigeaint,telephone,email,document,date_post) VALUES (?,?,?,?,?,?,?,NOW())");
									// 	$req1->execute(array($id,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant,""));

									// 	// envoie mail
									// 	self::mail($id,$formation->id,$token,$rand);
									// 	header("Location:$link_menu/activation/$id");
									// 	echo "<script>window.location ='$link_menu/activation/$id';</script>";	
									// }else{
										// // verifier si on a deja inscrit
										// $requette2=class_bdd::connexion_bdd()->prepare("SELECT * FROM formation_suivie WHERE id_participant=? AND id_formation=?");
										// $requette2->execute(array($formation->id,$user_formation->id));
										// $data=$requette2->rowCount();
										// // sinon
										// if (!$data){
										// 	// remplacer les modifications 
										// 	$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET nom=?, prenom=?, sexe=?, departement=?, commune=?, telephone=?, telephone2=?, active=?,mdp=? WHERE id=?");
										// 	$requette->execute(array($this->nom,$this->prenom,$this->sexe,$this->departement,$this->commune,$this->telephone,$this->telephone2,1,sha1($this->password),$user_formation->id));
											
										// 	$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO recommandation (id_user,institution,adresse,nom_dirigeaint,telephone,email,document,date_post) VALUES (?,?,?,?,?,?,?,NOW())");
										// 	$req1->execute(array($user_formation->id,$societe,$adresse,$nom_dirigeant,$telephone_dirigeant,$email_dirigeant,""));


										// 	$req1 = class_bdd::connexion_bdd()->prepare("INSERT INTO inscription (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
										// 	$req1->execute(array($user_formation->id,$formation->id));

										// 	$req2 = class_bdd::connexion_bdd()->prepare("INSERT INTO formation_suivie (id_participant,id_formation,date_post) VALUES (?,?,NOW())");
										// 	$req2->execute(array($user_formation->id,$formation->id));

										// 	// Fonctions::set_flash('Formation_suivie, connectez vous','success');
										// 	// echo "<script>window.location ='$link_menu/connexion';</script>";
										// }

										

									//}

							}else{
								echo "<p class='alert alert-danger'>Les mots de passe ne sont pas disponibles.</p>";
								}
						}else{
							echo "<p class='alert alert-danger'>L'adresse e-mail n'est pas valide</p>";
						}
					}else{
						echo "<p class='alert alert-danger'>Seulement le champ téléphone alternatif qui doit être vide</p>";
					}

				}else{
					echo "<p class='alert alert-danger'>Seulement le champ téléphone alternatif qui doit être vide</p>";
				}

			}else{
				echo "<script>window.location ='$link_menu/formations';</script>";
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
				            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
								<tr>
								<td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
									
								</td>
							</tr>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 27px;'>
				                            <p style='margin: 20px; font-size:17px; line-height:23px;'>
				                            Salut <b>$user->prenom</b> ,<br/>
				                            Nous sommes ravis de vous voir commencer le cours <b> <i>$formation->titre</i> </b> Tout d'abord, vous devez confirmer votre compte. Appuyez simplement sur le bouton ci-dessous.</p>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td bgcolor='#ffffff' align='left'>
				                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                                <tr>
				                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>

				                                        <table border='0' cellspacing='0' cellpadding='0'>
				                                            <tr>
				                                                <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='$org->site_web/activation/$token/$rand/$formation->id/$user->id' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; background-color: #26a8b4; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #26a8b4; display: inline-block;'>Confirmer votre compte</a>
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
					// // verifier si le token exipire
					// $date1 = $verif_token->date_post;
					// $date2 = date('Y-m-d h:i:s ', time());
					// $diff = $date1 - $date2;
					// $hours = $diff / ( 60 * 60 );

					//if($hours<2 AND $user->update_!=1){
						// verifier si la formation existe
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
							// valider le compte
							$count = Query::count_prepare('liste_certifie_socpol',$user->email,'email');

							if($formation->type==2 AND $count==1){
								$update = 1;
							}else{
								$update = 0;
							}

							$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET update_=?, active=? WHERE id=?");
							$requette->execute(array($update,1,$user->id));

							Query::supprimer('token',$verif_token->id);

							Fonctions::set_flash("Compte activé",'success');
							echo "<script>window.location ='$link_menu/connexion';</script>";

						}else{
							
							Fonctions::set_flash("Cette formation n'existe pas",'warning');
							echo "<script>window.location ='$link_menu/formations';</script>";
						}
					// }else{
					// 	$requette1=class_bdd::connexion_bdd()->prepare("DELETE FROM token WHERE id=?");
					// 	Query::supprimer('token',$verif_token->id);
					// 	Fonctions::set_flash('Lien de validation expiré','warning');
					// 	echo "<script>window.location ='$link_menu/connexion';</script>";
					// }
				}else{
					Fonctions::set_flash('Lien de validation expiré','warning');
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

		public static function add_document($id,$document){
			if (!empty($document)) {
				$nom_document=time().Query::Count_query('document');
				copy($_FILES['document']['tmp_name'], 'admin/dist/document/dossier/'.$nom_document.".pdf");

				// regarder si c'est déja existe 
				$check = Query::affiche("participant",$id,"id");
				if($check){
					require 'font-end/layout/config.php';
					$req=class_bdd::connexion_bdd()->prepare("UPDATE recommandation SET document = ? WHERE id_user =? ");
					$req->execute(array($nom_document.".pdf",$check->id));

					$req=class_bdd::connexion_bdd()->prepare("UPDATE participant SET update_ = ? WHERE id =? ");
					$req->execute(array("1",$check->id));

					Fonctions::set_flash("Votre compte est validé",'success');
					$url="$link_menu/tableau-de-bord";
					echo "<script>window.location ='$url';</script>";

				}else{
					Fonctions::set_flash("Ce compte n'exitse pas",'danger');
					$redirect=$_SERVER['REQUEST_URI'];
					echo "<script>window.location ='$redirect';</script>";
				}
			}
		}

		// modifier profil
		public static function modifier_profil($nom,$prenom,$sexe,$departement,$commune,$telephone,$telephone2,$domaine,$organisation,$parti,$occupation,$email,$numero)
		{
			require './font-end/layout/config.php';
			// modifier le profil

			// valideer les choix
			if ($telephone=='Universitaire') {
				$telephone2=$telephone2;
				$domaine=$domaine;
			}else{
				$telephone2='';
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

			if (isset($telephone2)=='Universitaire') {
				// modifer email
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE participant SET telephone2=? WHERE id=?");
				$requette->execute(array($telephone2,$_SESSION['id_user']));

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
				                        	<img src='$org->site_web/$link_admin/dist/img/logo/$org->logo' width='100' height='100' style='display: block; border: 0px;' />
				                            <h4 style='font-size: 19px; font-weight: bold; margin: 2;'>Reinitialisation mot de passe!</h4>
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