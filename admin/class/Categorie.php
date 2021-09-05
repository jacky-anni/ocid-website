<?php
	
	/**
	 * 
	 */
	class Categorie
	{
		private $nom;
		private $description;
		private $posteur;
		private $lien;
		
		function __construct($nom,$description)
		{
			$nom=ucfirst(htmlspecialchars($nom));
			$description=htmlspecialchars($description);

			// initialisation
			$this->nom=$nom;
			$this->description=$description;

			// initialisation de la base de donnée
			$this->bdd=class_bdd::connexion_bdd();

		}

		public function ajouter()
		{
			if(strlen($this->nom<242 OR $this->description<242)){
				$count= Query::count_query('categorie');
				 $id=rand(1000,1999).$count;

	

				if(Query::count_prepare('categorie',Fonctions::slug($this->nom),'slug')==0){
					
					$requette=$this->bdd->prepare("INSERT INTO categorie(nom_categorie,description_categorie,slug,posteur,date_post)VALUES (?,?,?,?,NOW())");
					$requette->execute(array($this->nom,$this->description,Fonctions::slug($this->nom),$_SESSION['id']));
					Fonctions::set_flash('Catégorie enregistrée','success');
					header("Location:?page=categories");
				}else{
					Fonctions::set_flash('Cette catégorie a déjá existée','danger');
					header("Location:?page=categories");
					// echo "<p class='alert alert-danger'>Cette catégorie a déjá existée.</p>";
				}
			}else{
				echo "<p class='alert alert-danger'>Le titre et le description ne doivent pas depasser 240 caractère.</p>";
			}
		}

		public function modifier($id)
		{

			if (isset($this->nom)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE categorie SET nom_categorie=? WHERE id=?");
				$requette->execute(array($this->nom,$id));

				$requette=class_bdd::connexion_bdd()->prepare("UPDATE categorie SET slug=? WHERE id=?");
				$requette->execute(array(Fonctions::slug($this->nom),$id));

				Fonctions::set_flash('categorie modifiée avec succès','success');
				
			}

			if (isset($this->description)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE categorie SET description_categorie=? WHERE id=?");
				$requette->execute(array($this->description,$id));
				Fonctions::set_flash('Catégorie modifiée avec succès','success');
			}
			header("Location:?page=categories");
			
		}

	}

?>