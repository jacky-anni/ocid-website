<?php

/**
 * 
 */
class Sondage
{


	// formulaire pour le sondage numero 2

	public static function add($id_user,$sexe,$gwoup,$enterese,$kondisyon,$vote,$rezon_vote,$sitiyasyon,$rezon_sitiyasyon_vote){


		if ($kondisyon=='Wi') {
			$vote='';
			$rezon_vote='';
			$sitiyasyon='';
			$rezon_sitiyasyon_vote='';
		}

			//verifier si on a deja remplis ce form
			$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM sondage2 WHERE id_participant=?");
			$req->execute(array($id_user));
			$count=$req->rowCount();
			if ($count==0) {
				$requette=class_bdd::connexion_bdd()->prepare("INSERT INTO sondage2(id_participant,1_sexe,2_group_laj,4_enteresman,5_kondisyon,5_1_repons_vote,rezon_5_1,6_stiyasyon,rezon_6,date_post)VALUES (?,?,?,?,?,?,?,?,?,NOW())");
				$requette->execute(array($id_user,$sexe,$gwoup,$enterese,$kondisyon,$vote,$rezon_vote,$sitiyasyon,$rezon_sitiyasyon_vote));
				Fonctions::set_flash('Questionnaire validé avec succès','success');
				// $redirect=$_SERVER['REQUEST_URI'];
				// echo "<script>window.location ='$redirect';</script>";
			}else{
				echo "<p class='alert alert-danger'> Vous avez déjà rempli ce formulaire</p>";
			}
	}


	
	public static function repartition($question1,$question2,$identifiant1,$identifiant2)
	{

		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM sondage WHERE $question1=? AND $question2=?");
		$req->execute(array($identifiant1,$identifiant2));
		$count=$req->rowCount();
		return $count;
		
	}

	public static function total_repar($req1,$res1,$req2,$res2)
	{

		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant INNER JOIN sondage ON participant.id=sondage.id_participant WHERE $req1=? AND $req2=?");
		$req->execute(array($res1,$res2));
		$count=$req->rowCount();
		return $count;
	}

	public static function percent($req1,$res1)
	{

		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant INNER JOIN sondage ON participant.id=sondage.id_participant WHERE $req1=?");
		$req->execute(array($res1));
		$count=$req->rowCount();
		return $count;
	}



	public static function repartition_orther($question1,$identifiant1,$question2,$identifiant2,$question3,$identifiant3)
	{

		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant INNER JOIN sondage ON participant.id=sondage.id_participant WHERE $question1=? AND $question2=? AND $question3=?");
		$req->execute(array($identifiant1,$identifiant2,$identifiant3));
		$count=$req->rowCount();
		return $count;
	}

	public static function repartition_orther2($question1,$identifiant1,$question2,$identifiant2,$question3,$identifiant3,$question4,$identifiant4)
	{

		$req=class_bdd::connexion_bdd()->prepare("SELECT * FROM participant INNER JOIN sondage ON participant.id=sondage.id_participant WHERE $question1=? AND $question2=? AND $question3=? AND $question4=?");
		$req->execute(array($identifiant1,$identifiant2,$identifiant3,$identifiant4));
		$count=$req->rowCount();
		return $count;
	}
}