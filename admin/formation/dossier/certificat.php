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
ini_set('display_errors', 'on');
error_reporting(E_ALL);



class MyPdf extends FPDF
{

    function header()
    {
        $formation = Query::affiche('formation', $_GET['id'], 'id');
        $participant = Query::affiche('participant', $_GET['participant'], 'id');

        if ($formation->id == 18041) {
            $this->image('../admin/dist/dossier/certificat.jpg', 5, 4, 270);
        } elseif($formation->id == 12723) { 
            $this->image('../admin/dist/dossier/certificat_3.jpg', 5, 4, 270);
        }else{
            $this->image('../admin/dist/dossier/certificat.png', 5, 4, 270);
            foreach (Query::liste('groupe') as $groupe) {
                if (trim($groupe->email) == trim($participant->email)) {
                    $this->image('../admin/dist/dossier/mention.png', 30, 95, 7);
                }
            }
        }
        $this->SetTextColor(249, 96, 52);
        $this->SetFont('times', 'B', 20);


        $this->Cell(0, 145, '' . utf8_decode(" " . $participant->prenom . " " . $participant->nom), 0, 0, 'C');
        $this->Ln(10);



    }



}

$participant = Query::affiche('participant', $_GET['participant'], 'id');
$nom = $participant->prenom . " " . $participant->nom . ".pdf";

ob_start();
$pdf = new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'Letter', 0);
$pdf->SetFont('Arial', 'B', 16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I', $nom);
 ob_end_flush(); 

?>
