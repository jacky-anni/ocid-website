<?php
require('../font-end/assets/plugins/fpdf/fpdf.php');
require '../admin/class/Module.php';
require '../admin/class/Formation.php';
require '../admin/class/Quiz.php';
require('../admin/class/bdd/bdd.php');
// ajouter les fonctions identiques
require '../admin/class/Fonctions.php';
// module des requettes 
require '../admin/class/Query.php';

class MyPdf extends FPDF
{

    function header()
    {


        $formation=Query::affiche('formation',$_GET['id'],'id');
        $participant=Query::affiche('participant',$_GET['participant'],'id');

       
        $this->image('../admin/dist/dossier/certificat.jpg',5,4,270);
        $this->SetTextColor(249,96,52);
        $this->SetFont('times', 'B', 20); 
         // $this->Cell(0,151,''.utf8_decode('kf'." ".kfk),0,0,'C');

        $this->Cell(0,151,''.utf8_decode(" ".$participant->prenom." ".$participant->nom),0,0,'C');
        $this->Ln(10);  
    }

}

 $participant=Query::affiche('participant',$_GET['participant'],'id');
$nom=$participant->prenom." ".$participant->nom.".pdf";

$pdf=new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L','Letter',0);
$pdf->SetFont('Arial','B',16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I',$nom);

?>
