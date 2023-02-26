<?php

/**
 * 
 */
class Publication
{
	private $titre;
	private $categorie;
	private $contenue;

	function __construct($titre, $categorie, $contenue)
	{
		$titre = htmlspecialchars($titre);
		$categorie = htmlspecialchars($categorie);

		$this->titre = $titre;
		$this->categorie = $categorie;
		$this->contenue = $contenue;
	}


	public function ajouter()
	{
		if (!empty($this->titre) and !empty($this->categorie) and !empty($this->contenue)) {
			if ($this->categorie == 'Aucun') {
				$this->categorie = 0;
			}
				// verifier les caractere

			$count = Query::count_query('categorie');
			$id1 = $count + 1;
			$id = rand(1000, 1999) . $id1;
			if (Query::count_prepare('categorie', Fonctions::slug($this->titre), 'slug') != 1) {
				$req = class_bdd::connexion_bdd()->prepare('INSERT INTO publication(id,id_categorie,titre,contenue,posteur,slug,etat,date_post) VALUES(?,?,?,?,?,?,?,NOW())');
				$req->execute(array($id, $this->categorie, $this->titre, $this->contenue, $_SESSION['id'], Fonctions::slug($this->titre), 'Hors ligne'));

				Fonctions::set_flash('Publication enregistrée', 'success');
				$url = $_SERVER['REQUEST_URI'];
				echo "<script>window.location ='$url '</script>";
						// header("Location:?page=Ajouter-une-photo&categorie=$id");
			} else {
				$url = $_SERVER['REQUEST_URI'];
				Fonctions::set_flash('Cette activité a déjá existée.', 'danger');
				echo "<script>window.location ='$url '</script>";

			}


		} else {
			echo "<p class='alert alert-danger'>Tous les champs doivent être remplis.</p>";
		}

	}

	public static function statut()
	{
		$publication = $_GET['publication'];

		$requette = class_bdd::connexion_bdd()->prepare("UPDATE publication SET etat=? WHERE slug=?");
		$requette->execute(array($_GET['statut'], $_GET['publication']));
		Fonctions::set_flash('Changement de statut effectué avec succès', 'success');
		$publication = $_GET['publication'];

			//rechercher categorie
		$publication = Query::affiche('publication', $publication, 'slug');

		header("Location:?page=publication&publication=$publication->slug");
	}


	public function modifier()
	{
		$publication = $_GET['publication'];

		if (isset($this->titre)) {

			$requette = class_bdd::connexion_bdd()->prepare("UPDATE publication SET titre=? WHERE id=?");
			$requette->execute(array($this->titre, $_GET['publication']));
		}


		if (isset($this->contenue)) {
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE publication SET contenue=? WHERE id=?");
			$requette->execute(array($this->contenue, $_GET['publication']));
		}

		if (isset($this->id_categorie)) {
			$requette = class_bdd::connexion_bdd()->prepare("UPDATE publication SET id_categorie=? WHERE id=?");
			$requette->execute(array($this->categorie, $_GET['publication']));
		}

		Fonctions::set_flash('publication  modifiée avec succès', 'success');
		header("Location:?page=publication&publication=$publication");

	}



}
?>