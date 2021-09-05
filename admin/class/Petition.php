<?php
	/**
	 * 
	 */
	class Petition
	{
		private $titre;
		private $decideur;
		private $contenue;

		function __construct($titre,$decideur,$contenue)
		{
			$titre=htmlspecialchars($titre);
			$decideur=htmlspecialchars($decideur);


			$this->titre=$titre;
			$this->decideur=$decideur;
			$this->contenue=$contenue;

			// initialisation de la baSse de donnée
			// $this->bdd=class_bdd::connexion_bdd();
		}


		public function ajouter()
		{


			//virifier si il sont vide
			if (!empty($this->titre) AND !empty($this->decideur)  AND !empty($this->contenue)) {
				// verifier les caractere
				if(strlen($this->Titre<201) AND strlen($this->decideur <201)){
					// ajouter
					// creation de l'ID
					$count= Query::count_query('petition');
					 $id1=$count+1;
					 $id=rand(1000,1999).$id1;

					 // ajouter la petition sintout est ok
					$req=class_bdd::connexion_bdd()->prepare('INSERT INTO petition(id,titre,decideur,contenue,photo,posteur,etat,date_post) VALUES(?,?,?,?,?,?,?,NOW())');
					$req->execute(array($id,$this->titre,$this->decideur,$this->contenue,'',$_SESSION['id'],'Hors ligne'));

					Fonctions::set_flash('Pétition enregistrée avec succès','success');
					header("Location:?page=ajouter-une-photo-de-couverture&petition=$id");
				}else{
					echo "<p class='alert alert-danger'>Les champs (Titre et decideur) ne doivent pas depasser 200 caractère.</p>";
				}
				
			} else{
				echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
			}
		}

		public static function signer($id,$nom,$prenom,$email,$sexe,$departement,$ville,$secteur){
			$signataire= Query::count_prepare('signataire',$email,'email');
			if ($signataire==1) {
				// selectionner l'utilisateur
				$user=class_bdd::connexion_bdd()->prepare("SELECT * FROM signataire WHERE email=?");
				$user->execute(array($email));
				$user=$user->fetch(PDO::FETCH_OBJ);
				
				//signer la petition
				$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM signature WHERE id_signataire=? AND id_petition=?");
				$req->execute(array($user->id,$id));
				$chek=$req->rowCount();
				if ($chek!=1) {
					// signer
					$req=class_bdd::connexion_bdd()->prepare("INSERT INTO signature(id_signataire,id_petition,date_post) VALUES(?,?,NOW())");
					$req->execute(array($user->id,$id));
					echo "<p class='alert alert-success'>Signature effectuée</p>";

					echo "<script>

					$(document).ready(function () {
			            setTimeout(function () {
			              location.reload();
			            }, 400);
			          });

					</script>";	
				}else{
					echo "<p class='alert alert-danger'>Vous avez déjà signé cette pétition</p>";
				}

			}else{
				// enregistrer signataire
				$create_id= Query::count_query('signataire');
				$id_user=rand(1000,1999).$create_id;
				$req=class_bdd::connexion_bdd()->prepare("INSERT INTO signataire(id,nom,prenom,email,sexe,departement,ville,secteur,date_signature) VALUES (?,?,?,?,?,?,?,?,NOW())");
				$req->execute(array($id_user,$nom,$prenom,$email,$sexe,$departement,$ville,$secteur));

				// signer
				$req1=class_bdd::connexion_bdd()->prepare("INSERT INTO signature(id_signataire,id_petition,date_post) VALUES(?,?,Now())");
				$req1->execute(array($id_user,$id));

				echo "<script>

				$(document).ready(function () {
		            setTimeout(function () {
		              location.reload();
		            }, 400);
		          });

				</script>";
				echo "<p class='alert alert-success'>Signature effectuée</p>";
			}

		}

		// modifier photo
		public static function upload($photo,$id)
		{
			$requette=class_bdd::connexion_bdd()->prepare("UPDATE petition SET photo=? WHERE id=?");
			$requette->execute(array($photo,$id));
			Fonctions::set_flash('Photo ajoutée','success');
		}


		public static function signataire_repartition($identifiant,$key,$petition)
		{
			
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM signataire INNER JOIN signature ON signataire.id=signature.id_signataire WHERE id_petition =? AND $identifiant=?");
			$req->execute(array($petition,$key));
			$count=$req->rowCount();
			return $count;
		}



		public static function statut()
		{
			$date_post=date('d-M-Y  h:i:a');

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE petition SET etat=? WHERE id=?");
			$requette->execute(array($_GET['statut'],$_GET['petition']));
			Fonctions::set_flash('Changement de statut effectué avec succès','success');
			$petition=$_GET['petition'];

			//rechercher petition
			$petition=Query::affiche('petition',$petition,'id');

			header("Location:?page=pétition&petition=$petition->id");
		}


		public function modifier()
		{
			$petition=$_GET['petition'];
			$date_post=date('d-M-Y  h:i:a');

			if (isset($this->titre)) {
				
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE petition SET titre=? WHERE id=?");
				$requette->execute(array($this->titre,$_GET['petition']));

				Fonctions::set_flash('pétition modifiée avec succès','success');
				header("Location:?page=pétition&petition=$petition");
			}


			if (isset($this->contenue)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE petition SET contenue=? WHERE id=?");
				$requette->execute(array($this->contenue,$_GET['petition']));

				Fonctions::set_flash('pétition modifiée avec succès','success');
				header("Location:?page=pétition&petition=$petition");
			}

			if (isset($this->decideur)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE petition SET decideur=? WHERE id=?");
				$requette->execute(array($this->decideur,$_GET['petition']));

				Fonctions::set_flash('pétition modifiée avec succès','success');
				header("Location:?page=pétition&petition=$petition");
			}
			
		}



	}
?>