<?php
	/**
	 * 
	 */
	class Offres
	{
		private $titre;
		private $domaine;
		private $pays;
		private $zone;
		private $date_limite;
		private $email;
		private $description;

		function __construct($titre,$domaine,$pays,$zone,$date_limite,$email,$description)
		{
			$titre=htmlspecialchars($titre);
			$domaine=htmlspecialchars($domaine);
			$pays=htmlspecialchars($pays);
			$zone=htmlspecialchars($zone);

			$date_limite=htmlspecialchars($date_limite);
			$email=htmlspecialchars($email);
			
			// initialisation
			$this->titre=$titre;
			$this->domaine=$domaine;
			$this->pays=$pays;
			$this->zone=$zone;
			$this->date_limite=$date_limite;
			$this->email=$email;
			$this->description=$description;
		}


		public function ajouter()
		{
			if (!empty($this->titre) AND !empty($this->domaine) AND !empty($this->pays) AND !empty($this->zone)  AND !empty($this->date_limite) AND !empty($this->description)) {

				$offres_exist = Query::count_prepare('offres',Fonctions::slug($this->titre),'slug');
				if (!$offres_exist) {
					// verifier les caractere
					$req=class_bdd::connexion_bdd()->prepare('INSERT INTO offres(titre,domaine,pays,zone,date_limite,email,description,slug,etat,posteur,date_post) VALUES(?,?,?,?,?,?,?,?,?,?,NOW())');
					$req->execute(array($this->titre,$this->domaine,$this->pays,$this->zone,$this->date_limite,$this->email,$this->description,Fonctions::slug($this->titre),'Hors ligne',$_SESSION['id']));

					Fonctions::set_flash("Offres d'emplois enregistrés",'success');
					header("Location:?page=offres");
				}else{
					echo "<p class='alert alert-danger'>Cet offre d'emploie à déjà existé.</p>";
				}

			}else{
				echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
			}
		}



		public static function statut()
		{

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET etat=? WHERE id=?");
			$requette->execute(array($_GET['statut'],$_GET['offre']));
			Fonctions::set_flash('Changement de statut effectué avec succès','success');

			//rechercher offres
			$offres=Query::affiche('offres',$_GET['offre'],'id');

			header("Location:?page=offre-emploi&offre=$offres->id");
		}


		public function modifier()
		{
			// si les champs ne sont pas vide
			if (!empty($this->titre) AND !empty($this->domaine) AND !empty($this->pays) AND !empty($this->zone)  AND !empty($this->date_limite) AND !empty($this->description)) {


					$offres=$_GET['offre'];
					// si le titre existe
					if (isset($this->titre)) {
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET titre=? WHERE id=?");
						$requette->execute(array($this->titre,$offres));

						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET slug=? WHERE id=?");
						$requette->execute(array(Fonctions::slug($this->titre),$offres));
					}

					if (isset($this->domaine)) {
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET domaine=? WHERE id=?");
						$requette->execute(array($this->domaine,$offres));

					}

					if (isset($this->pays)) {
						
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET pays=? WHERE id=?");
						$requette->execute(array($this->pays,$offres));
					}

					if (isset($this->zone)) {
						
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET zone=? WHERE id=?");
						$requette->execute(array($this->zone,$offres));

					}

					if (isset($this->date_limite)) {
						
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET date_limite=? WHERE id=?");
						$requette->execute(array($this->date_limite,$offres));
					}

					if (isset($this->email)) {
						
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET email=? WHERE id=?");
						$requette->execute(array($this->email,$offres));
					}

					if (isset($this->description)) {
						
						$requette=class_bdd::connexion_bdd()->prepare("UPDATE offres SET description=? WHERE id=?");
						$requette->execute(array($this->description,$offres));
					}
					// redirection vers la page d'emploi
						Fonctions::set_flash('offres modifié avec succès','success');
						header("Location:?page=offre-emploi&offre=$offres");
				}else{
					echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
				}
			
		}



	}
?>