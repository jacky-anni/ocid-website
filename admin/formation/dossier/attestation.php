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
    //     $url='';
    //     if (isset($_GET['url'])) {
    //         $url=explode('/', $_GET['url']);
    //     }

        $formation=Query::affiche('formation',$_GET['id'],'id');
        $participant=Query::affiche('participant',$_GET['participant'],'id');

        if($formation->id==18041){
        $this->image('../admin/dist/dossier/attestation.jpg',10,11,198);
        }else{
            $this->image('../admin/dist/dossier/attestation.png',10,11,198);
        }
        $this->SetTextColor(160,29,20);
        $this->SetFont('times', 'B', 20); 
        $this->Cell(0,143,''.utf8_decode(" ".$participant->prenom." ".$participant->nom),0,0,'C');
        
    }


    


}

$nom='biwww'.".pdf";

$pdf=new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter',0);
$pdf->SetFont('Arial','B',16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I',$nom);

?>
