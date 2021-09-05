<?php
	/**
	 * 
	 */
	class Article
	{
		private $titre;
		private $projet;
		private $contenue;

		function __construct($titre,$projet,$contenue)
		{
			$titre=htmlspecialchars($titre);
			$projet=htmlspecialchars($projet);

			$this->titre=$titre;
			$this->projet=$projet;
			$this->contenue=$contenue;
		}


		public function ajouter()
		{
			if (!empty($this->titre) AND !empty($this->projet) AND !empty($this->contenue)) {
				// verifier les caractere
				if(strlen($this->titre<201)){
					 $count= Query::count_query('article');
					 $id1=$count+1;
					 $id=rand(1000,1999).$id1;
					 if(Query::count_prepare('article',Fonctions::slug($this->titre),'slug')!=1){
						 $req=class_bdd::connexion_bdd()->prepare('INSERT INTO article(id,titre,contenue,photo,reference,posteur,slug,etat,date_post) VALUES(?,?,?,?,?,?,?,?,NOW())');
						$req->execute(array($id,$this->titre,$this->contenue,'',$this->projet,$_SESSION['id'],Fonctions::slug($this->titre),'Hors ligne'));
						
						Fonctions::set_flash('Activité enregistrée','success');
						header("Location:?page=Ajouter-une-photo&article=$id");
					 }else{
						echo "<p class='alert alert-danger'>Cette activité a déjá existée.</p>";
					 }

				}else{
					echo "<p class='alert alert-danger'>Les champs (Titre et contenue) ne doivent pas depasser 200 caractère.</p>";
				}
			}else{
				echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
			}


			
			 
		}

		// modifier photo
		public static function upload($photo,$id)
		{

			//selectionner l'article en cours 
			$article=Query::affiche('article',$id,'id');
			// supprmer l'ancienne photo
			Query::supprimer_fichier_one('../../dist/img/article/'.$article->photo);

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET photo=? WHERE id=?");
			$requette->execute(array($photo,$id));
			// Fonctions::set_flash('Enregistrement effectué avec succès','success');
			header("Location:?Article&article=$id");
		}



		public static function statut()
		{
			$date_post=date('d-M-Y  h:i:a');

			$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET etat=? WHERE id=?");
			$requette->execute(array($_GET['statut'],$_GET['article']));
			Fonctions::set_flash('Changement de statut effectué avec succès','success');
			$article=$_GET['article'];

			//rechercher article
			$article=Query::affiche('article',$article,'id');

			header("Location:?page=Article&article=$article->id");
		}


		public function modifier()
		{
			$article=$_GET['article'];
			$date_post=date('d-M-Y  h:i:a');

			if (isset($this->titre)) {
				
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET titre=? WHERE id=?");
				$requette->execute(array($this->titre,$_GET['article']));

				Fonctions::set_flash('Article modifié avec succès','success');
				header("Location:?page=Article&article=$article");
			}


			if (isset($this->contenue)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET contenue=? WHERE id=?");
				$requette->execute(array($this->contenue,$_GET['article']));

				Fonctions::set_flash('Article modifié avec succès','success');
				header("Location:?page=Article&article=$article");
			}

			if (isset($this->projet)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET reference=? WHERE id=?");
				$requette->execute(array($this->projet,$_GET['article']));

				Fonctions::set_flash('Article modifié avec succès','success');
				header("Location:?page=Article&article=$article");
			}

			if (isset($this->redacteur)) {
				$requette=class_bdd::connexion_bdd()->prepare("UPDATE article SET redacteur=? WHERE id=?");
				$requette->execute(array($this->redacteur,$_GET['article']));

				Fonctions::set_flash('Article modifié avec succès','success');
				header("Location:?page=Article&article=$article");
			}
			
		}



	}
?>