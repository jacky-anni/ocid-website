<?php
session_start();
ob_start();
require 'font-end/assets/plugins/fpdf/fpdf.php';
require 'font-end/layout/config.php';
require 'admin/class/Module.php';
require 'admin/class/Formation.php';
require 'admin/class/Quiz.php';
require 'admin/class/bdd/bdd.php';
// ajouter les fonctions identiques
require 'admin/class/Fonctions.php';
// module des requettes 
require 'admin/class/Query.php';
ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyPdf extends FPDF
{


    function header()
    {
        $url = '';
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
        }

        // rechercher la formation
        $formation = Query::affiche('formation', $url[1], 'id');
        // selsctionner le participant
        $participant = Query::affiche('participant', $url[2], 'id');

        if (!$participant) {
            $this->SetFont('times', 'B', 20); 
             // $this->Cell(0,151,''.utf8_decode('kf'." ".kfk),0,0,'C');

            $this->Cell(0, 151, '' . utf8_decode("Cet étudiant n'existe pas "), 0, 0, 'C');
            $this->Ln(10);
        }

        // veridier si on passe tous les modules
        $module_total = Query::count_prepare('module_formation', $formation->id, 'id_formation');

        // verifier la quantite de quiz passe
        $module_total = Module::count($formation->id);
        $module_passe = Quiz::pass_module($url[2], $formation->id);

        if ($module_total == $module_passe) {

            if ($formation->id == 18041) {
                $this->image('font-end/assets/base/img/dossier/certificat.jpg', 5, 4, 270);
            } elseif($formation->id == 12723) {
                $this->image('admin/dist/dossier/certificat_3.jpg', 5, 4, 270);
            }else{
                 $this->image('font-end/assets/base/img/dossier/certificat.png', 5, 4, 270);
                foreach (Query::liste('groupe') as $groupe) {
                    if (trim($groupe->email) == trim($participant->email)) {
                        $this->image('font-end/assets/base/img/dossier/mention.png', 30, 95, 7);
                    }
                }

            }

            $this->SetTextColor(249, 96, 52);
            $this->SetFont('times', 'B', 20); 
             // $this->Cell(0,151,''.utf8_decode('kf'." ".kfk),0,0,'C');

            $this->Cell(0, 145, '' . utf8_decode(" " . $participant->prenom . " " . $participant->nom), 0, 0, 'C');
            $this->Ln(10);
        } else {
            // $this->SetTextColor(249,96,52);
            $this->SetFont('times', 'B', 12);
            $this->Cell(0, 151, '' . utf8_decode(" Pas de certificat"), 0, 0, 'C');
        }
    }

}

$url = '';
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

 // $participant=Query::affiche('participant',$url[2],'id');
 // $nom=$participant->prenom." ".$participant->nom.".pdf";

$pdf = new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'Letter', 0);
$pdf->SetFont('Arial', 'B', 16);
// $pdf->White();
// $pdf->viewTable();
$pdf->Output('I');

?>
