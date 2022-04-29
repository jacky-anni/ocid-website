<?php
session_start();
ob_start();
require('font-end/assets/plugins/fpdf/fpdf.php');
require('font-end/layout/config.php');
require 'admin/class/Module.php';
require 'admin/class/Formation.php';
require 'admin/class/Quiz.php';
require('admin/class/bdd/bdd.php');
// ajouter les fonctions identiques
require 'admin/class/Fonctions.php';
// module des requettes 
require 'admin/class/Query.php';

class MyPdf extends FPDF
{

    function header()
    {
        $url='';
        if (isset($_GET['url'])) {
            $url=explode('/', $_GET['url']);
        }


        // rechercher la formation
        $formation=Query::affiche('formation',$url[1],'id');
        // selsctionner le participant
        $participant=Query::affiche('participant',$url[2],'id');

        if (!$participant) {
            $this->SetFont('times', 'B', 20); 
            $this->Cell(0,151,''.utf8_decode("Cet étudiant n'existe pas "),0,0,'C');
            $this->Ln(10); 
        }else{

            if($formation->id==18041){
                $this->image('font-end/assets/base/img/dossier/attestation.jpg',10,11,198);
            }else{
                $this->image('font-end/assets/base/img/dossier/attestation.png',10,11,198);
            }


             $this->SetTextColor(249,96,52);
             $this->SetFont('times', 'B', 20); 
             $this->Cell(0,143,''.utf8_decode(" ".$participant->prenom." ".$participant->nom),0,0,'C');
        } 
    }
        

}

$url='';
if (isset($_GET['url'])) {
    $url=explode('/', $_GET['url']);
}

 // $participant=Query::affiche('participant',$url[2],'id');
 // $nom=$participant->prenom." ".$participant->nom.".pdf";

$pdf=new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter',0);
$pdf->SetFont('Arial','B',16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I',"Attestation");

?>
