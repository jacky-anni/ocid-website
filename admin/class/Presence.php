<?php
/**
 * 
 */
class Presence
{
	private $siyati;
	private $non;
	private $depatman;
	private $vil;
	private $prezans;
	private $si_wap_vini;
	private $siw_pap_vini;
	private $telefon;
	private $imel;

	
	function __construct($siyati,$non,$depatman,$vil,$prezans,$si_wap_vini,$siw_pap_vini,$telefon,$imel)
	{
		$siyati=htmlspecialchars($siyati);
		$non=htmlspecialchars($non);
		$depatman=htmlspecialchars($depatman);
		$vil=htmlspecialchars($vil);
		$prezans=htmlspecialchars($prezans);
		$si_wap_vini=htmlspecialchars($si_wap_vini);
		$siw_pap_vini=htmlspecialchars($siw_pap_vini);
		$telefon=htmlspecialchars($telefon);
		$imel=htmlspecialchars($imel);


		// initialisation
		$this->siyati=$siyati;
		$this->non=$non;
		$this->depatman=$depatman;
		$this->vil=$vil;
		$this->prezans=$prezans;
		$this->si_wap_vini=$si_wap_vini;
		$this->siw_pap_vini=$siw_pap_vini;
		$this->telefon=$telefon;
		$this->imel=$imel;
	}

	public function presence(){
		$email_test= Query::count_prepare('presence_atelier',$this->imel,'email');
		$telephone_test= Query::count_prepare('presence_atelier',$this->telefon,'telephone');

		if ($email_test!=1 AND $telephone_test!=1) {

			if($this->prezans=='Wi'){
				$this->siw_pap_vini='';
				if($this->prezans=='Wi' AND !empty($this->si_wap_vini)){

					// enregistrer
					$req=class_bdd::connexion_bdd()->prepare("INSERT INTO presence_atelier(nom,prenom,departement,ville,presence,zone_choisie,raison,telephone,email,date_post) VALUES(?,?,?,?,?,?,?,?,?,NOW())");
					$req->execute(array($this->siyati,$this->non,$this->depatman,$this->vil,$this->prezans,$this->si_wap_vini,$this->siw_pap_vini,$this->telefon,$this->imel));

					$url=$_SERVER['REQUEST_URI'];
					echo "<script>window.location ='$url/validate';</script>";



				}else{
					echo "<p class='alert alert-danger'><b>Ou dwe di nan ki vil wap vin patisipe nan atelye a</b></p>";
					
				}

			}


			if($this->prezans=='Non'){
				$this->si_wap_vini='';
				if($this->prezans=='Non' AND !empty($this->siw_pap_vini)){
					// enregistrer
					$req=class_bdd::connexion_bdd()->prepare("INSERT INTO presence_atelier(nom,prenom,departement,ville,presence,zone_choisie,raison,telephone,email,date_post) VALUES(?,?,?,?,?,?,?,?,?,NOW())");
					$req->execute(array($this->siyati,$this->non,$this->depatman,$this->vil,$this->prezans,$this->si_wap_vini,$this->siw_pap_vini,$this->telefon,$this->imel));
					
					$url=$_SERVER['REQUEST_URI'];
					echo "<script>window.location ='$url/validate';</script>";
					

				}else{
					echo "<p class='alert alert-danger'><b>Ou dwe di poukisa ou pap vini</b></p>";
					
				}

			}

			
		}else{
			echo "<p class='alert alert-danger'><b>Nimero telefon sa oubyen imel sa ekziste deja</b></p>";
		}
	}
}