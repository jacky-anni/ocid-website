<?php

class Projet
{
	private $titre;
	private $date_debut;
	private $public;
	private $zone;
	private $date_fin;
	private $presentation;
	private $objectif;
	private $resultat;
	private $activite;
	

	
	public function __construct($titre,$public,$zone,$date_debut,$date_fin,$presentation,$objectif,$resultat,$activite)
	{
		$titre=htmlspecialchars($titre);
		$public=htmlspecialchars($public);
		$zone=htmlspecialchars($zone);
		$date_debut=htmlspecialchars($date_debut);
		$date_fin=htmlspecialchars($date_fin);
		
		$this->titre=$titre;
		$this->date_debut=$date_debut;
		$this->public=$public;
		$this->zone=$zone;
		$this->date_fin=$date_fin;
		$this->presentation=$presentation;
		$this->objectif=$objectif;
		$this->resultat=$resultat;
		$this->activite=$activite;
		

	}

	public function ajouter()
	{
		// verifier si les cha,ps sont vides.
		if (!empty($this->titre) AND !empty($this->public) AND !empty($this->zone) AND !empty($this->date_debut) AND !empty($this->date_fin) AND !empty($this->presentation) AND !empty($this->objectif)) {
	
				// verifie si le projet exist
			$projet_exist = Query::count_prepare('projet',$this->titre,'titre');

			if (!$projet_exist) {
				// verifier si la date de debut est inferieur a la date de fin 
				if($this->date_debut<$this->date_fin)
				{
					// rechercher le nombre de projet
					$count= Query::count_query('projet');
					 $id1=$count+1;
					 // creation de l'ID
					 $id=rand(1000,1999).$id1;
					// s'il n'existe pas enregistre le
					$req=class_bdd::connexion_bdd()->prepare('INSERT INTO projet(id,titre,public_cible,zone,presentation,objectif,activite,resultat,photo,date_debut,date_fin,slug,posteur,etat,date_post) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())');
					$req->execute(array($id,$this->titre,$this->public,$this->zone,$this->presentation,$this->objectif,$this->activite,$this->resultat,'',$this->date_debut,$this->date_fin,Fonctions::slug($this->titre),$_SESSION['id'],'Hors ligne'));
					// suceess
					Fonctions::set_flash('Projet enregistré','success');
					header("Location:?page=ajouter-une-photo&projet=$id");
				}else{
					echo "<p class='alert alert-danger'>La date de début doit etre inférieur à la date de fin</p>";
				}
				
			}else{
				echo "<p class='alert alert-danger'>Ce projet a déjà existé.</p>";
			}
		}else{
			echo "<p class='alert alert-danger'>Titre, public cible, zone d'intervention, date de but, date de fin,  résumé et objectif doivent etre remplis.</p>";
		}
	}

	public function modifier(){
		// verifier si les cha,ps sont vides.
		if (!empty($this->titre) AND !empty($this->public) AND !empty($this->zone) AND !empty($this->date_debut) AND !empty($this->date_fin) AND !empty($this->presentation) AND !empty($this->objectif)) {
			// verifier si la date debut est inferieur a la date de fin
			if($this->date_debut<$this->date_fin){
				// generer l'id
				$projet=$_GET['projet'];
				// modifier tire
				if (isset($this->titre)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET titre=? WHERE id=?");
					$requette->execute(array($this->titre,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}

				// modifier public
				if (isset($this->public)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET public_cible=? WHERE id=?");
					$requette->execute(array($this->public,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}

				// modifier zone
				if (isset($this->zone)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET zone=? WHERE id=?");
					$requette->execute(array($this->zone,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier date de debut
				if (isset($this->date_debut)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET date_debut=? WHERE id=?");
					$requette->execute(array($this->date_debut,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier date fin
				if (isset($this->date_fin)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET date_fin=? WHERE id=?");
					$requette->execute(array($this->date_fin,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier presentation
				if (isset($this->presentation)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET presentation=? WHERE id=?");
					$requette->execute(array($this->presentation,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier objectif
				if (isset($this->objectif)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET objectif=? WHERE id=?");
					$requette->execute(array($this->objectif,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier resultat
				if (isset($this->resultat)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET resultat=? WHERE id=?");
					$requette->execute(array($this->resultat,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}
				// modifier activite
				if (isset($this->activite)) {
					$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET activite=? WHERE id=?");
					$requette->execute(array($this->activite,$_GET['projet']));

					Fonctions::set_flash('Projet modifié avec succès','success');
					header("Location:?page=Projet&projet=$projet");
				}

			}else{
				echo "<p class='alert alert-danger'>La date de début doit etre inférieur à la date de fin</p>";
			}

		}else
		{
			echo "<p class='alert alert-danger'>Titre, public cible, zone d'intervention, date de but, date de fin, résumé et objectif doivent etre remplis.</p>";
		}
	}

	public static function upload($photo,$id)
	{
		$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET photo=? WHERE id=?");
		$requette->execute(array($photo,$id));
		// Fonctions::set_flash('Enregistrement effectué avec succès','success');
		header("Location:?Projet&projet=$id");
	}

	public static function statut()
	{

		$requette=class_bdd::connexion_bdd()->prepare("UPDATE projet SET etat=? WHERE id=?");
		$requette->execute(array($_GET['statut'],$_GET['projet']));
		Fonctions::set_flash('Changement de statut effectué avec succès','success');
		$projet=$_GET['projet'];

		//rechercher projet
		$projet=Query::affiche('projet',$projet,'id');

		header("Location:?page=Projet&projet=$projet->id");
	}

	public static function jours_restant($date_debut,$date_fin){
		$date1 = new DateTime($date_debut);
		$date2 = new DateTime($date_fin);
		$interval = $date1->diff($date2);

		if($interval->y>1){echo $interval->y."  ans,  ";}elseif ($interval->y==1) {echo $interval->y."  an,  ";}

		if($interval->m>1){echo $interval->m."  mois,  ";}elseif ($interval->m==1) {echo $interval->m."  mois,  ";}

		if($interval->d>1){echo $interval->d."  jours  ";}elseif ($interval->d==1) {echo $interval->d."  jour  ";} 
	}

	public static function duree($date_debut,$date_fin){
		$date1 = new DateTime($date_debut);
		$date2 = new DateTime($date_fin);
		$interval = $date1->diff($date2);

		if($interval->y>1){echo $interval->y."  ans,  ";}elseif ($interval->y==1) {echo $interval->y."  an,  ";}

		if($interval->m>1){echo $interval->m."  mois,  ";}elseif ($interval->m==1) {echo $interval->m."  mois,  ";}

		if($interval->d>1){echo $interval->d."  jours  ";}elseif ($interval->d==1) {echo $interval->d."  jour  ";} 
	}

	
}