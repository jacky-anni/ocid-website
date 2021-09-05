<?php
	
	/**
	 * 
	 */
	class Audio
	{
		private $nom;
		private $reference;
		private $posteur;
		private $lien;
		
		function __construct($nom,$reference,$posteur,$lien)
		{
			$nom=ucfirst(htmlspecialchars($nom));
			$reference=htmlspecialchars($reference);
			$posteur=htmlspecialchars($posteur);

			// initialisation
			$this->nom=$nom;
			$this->reference=$reference;
			$this->posteur=$posteur;
			$this->lien=$lien;

			// initialisation de la base de donnée
			$this->bdd=class_bdd::connexion_bdd();

		}

		public function ajouter()
		{
			if(strlen($this->titre<255)){
				$count= Query::count_query('audio');
				 $id=rand(1000,1999).$count;
				$requette=$this->bdd->prepare("INSERT INTO audio(nom,reference,posteur,lien,date_post)VALUES (?,?,?,?,NOW())");
				$requette->execute(array($this->nom,$this->reference,$this->posteur,$this->lien));
			}else{
				echo "<p class='alert alert-danger'>Le champ (Titre) ne doit pas depasser 254 caractère.</p>";
			}

			
			
		}

		public function modifier($id)
		{

			if (isset($this->nom)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE audio SET nom=? WHERE id=?");
				$requette->execute(array($this->nom,$id));

				Fonctions::set_flash('Video modifiée avec succès','success');
			}

			if (isset($this->reference)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE audio SET reference=? WHERE id=?");
				$requette->execute(array($this->reference,$id));

				Fonctions::set_flash('Video modifiée avec succès','success');
			}

			if (isset($this->lien)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE audio SET lien=? WHERE id=?");
				$requette->execute(array($this->lien,$id));

				Fonctions::set_flash('Video modifiée avec succès','success');
			}
			
		}

	}

?>