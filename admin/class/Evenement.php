<?php
	/**
	 * 
	 */
	class Evenement
	{
		private $titre;
		private $description;
		private $date;
		private $heure;
		private $lieu;
		
		public function __construct($titre,$description,$date,$heure,$lieu)
		{
			$titre=htmlspecialchars($titre);
			$description=htmlspecialchars($description);
			$date=htmlspecialchars($date);
			$heure=htmlspecialchars($heure);
			$lieu=htmlspecialchars($lieu);

			$this->titre=$titre;
			$this->description=$description;
			$this->date=$date;
			$this->heure=$heure;
			$this->lieu=$lieu;
			// initialisation de la base de donnée
			$this->bdd=class_bdd::connexion_bdd();
		}

		public function ajouter(){
			$requette=$this->bdd->prepare('INSERT INTO evenement(posteur,titre,description,date_event,heure,lieu,date_post)VALUES(?,?,?,?,?,?,NOW())');
			$requette->execute(array($_SESSION['id'],$this->titre,$this->description,$this->date,$this->heure,$this->lieu));
			Fonctions::set_flash('Evènement enregistré','success');
			if(!isset($_GET['section'])){
				header("Location:?page=evènements");
			}else{
				header("Location:?page=evènements&section=all");
			}
		}

		

		public static function liste ($date_debut='', $date_fin='')
		{

			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM evenement WHERE date_event BETWEEN ? AND ? ORDER BY date_event ASC");
			$req->execute(array($date_debut,$date_fin));
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public static function mois ($mois)
		{
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM evenement WHERE MONTH(date_event)=?");
			$req->execute(array($mois));
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public static function count_mois ($mois)
		{
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM evenement WHERE MONTH(date_event)=?");
			$req->execute(array($mois));
			$data=$req->rowCount();
			return $data;
		}

		public static function interesser($evenement)
		{
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM abonnee INNER JOIN abonnement ON abonnee.id=abonnement.id_abonnee WHERE reference =?");
			$req->execute(array($evenement));
			$data=$req->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function modifier($id){
			if (!empty($this->titre) AND !empty($this->date) AND !empty($this->heure) AND !empty($this->lieu) AND !empty($id)) {
		        
		        if (isset($this->titre)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE evenement SET titre=? WHERE id=?");
					$requette->execute(array($this->titre,$id));
				}

				if (isset($this->titre)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE evenement SET description=? WHERE id=?");
					$requette->execute(array($this->description,$id));
				}

				 if (isset($this->date)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE evenement SET date_event=? WHERE id=?");
					$requette->execute(array($this->date,$id));
				}

				 if (isset($this->heure)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE evenement SET heure=? WHERE id=?");
					$requette->execute(array($this->heure,$id));
				}

				 if (isset($this->lieu)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE evenement SET lieu=? WHERE id=?");
					$requette->execute(array($this->lieu,$id));
				}
				Fonctions::set_flash('1 evènement modifié','success');
				if(!isset($_GET['section'])){
					header("Location:?page=evènements");
				}else{
					header("Location:?page=evènements&section=all");
				}


				
		      }else{
		      	echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
		      }

			
		}

	}
?>