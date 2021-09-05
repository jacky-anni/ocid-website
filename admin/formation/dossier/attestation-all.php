<?php
session_start();
ob_start();
require('../font-end/assets/plugins/fpdf/fpdf.php');
require '../admin/class/Module.php';
require '../admin/class/Formation.php';
require '../admin/class/Quiz.php';
require('../admin/class/bdd/bdd.php');
// ajouter les fonctions identiques
require '../admin/class/Fonctions.php';
// module des requettes 
require '../admin/class/Query.php';
$pdf = new FPDF();


$pdf->SetFont('times','B',20);  

$formation=$_GET['id'];

// verifie si cette formation existe
$formation= Query::affiche('formation',$formation,'id');
if(!$formation) {
    Fonctions::set_flash("Cettea formation n'existe pas ",'danger');
    echo "<script>window.location ='?page=formation';</script>";
};

// selectionne la requette selon la requette
if (isset($_GET['dep1']) AND isset($_GET['dep2']) AND !isset($_GET['dep3'])) {
  $dept = Module::user_module_pass_dept($formation->id,$_GET['dep1'],$_GET['dep2']);


}elseif (isset($_GET['dep1']) AND isset($_GET['dep2']) AND isset($_GET['dep3'])) {
  $dept = Module::user_module_pass_dept($formation->id,$_GET['dep1'],$_GET['dep2'],$_GET['dep3']);
}elseif(isset($_GET['all'])==1){
    $dept=Module::user_module_pass($_GET['id']);
}else{
  Fonctions::set_flash("Le département n'est pas precisé",'danger');
  echo "<script>window.location ='?page=les-participants&id=$formation->id';</script>";
}

//Module::user_module_pass($_GET['id'])



foreach ($dept as $key => $participant){
  $module_total = Module::count($formation->id);
   // kantite quiz ou pase
   $count_user= Quiz::pass_module($participant->id_participant,$formation->id);

   // $count_user=7;
    // si le participant existe
    if ($module_total!=$count_user) {
    $pdf->AddPage('P','Letter',0);
     $pdf->image('../admin/dist/dossier/attestation.jpg',10,11,192);
     $pdf->Cell(0,140,''.utf8_decode(" ".$participant->prenom." ".$participant->nom),0,0,'C');
   }
}



    


// }

// $nom='biwww'.".pdf";

// $pdf=new MyPdf();
// $pdf->AliasNbPages();
// $pdf->AddPage('P','Letter',0);
// $pdf->SetFont('Arial','B',16);
// ob_end_clean();
// $pdf->Output('I',$nom);

// $myarray = array(1,2,3);

// $pdf->SetFont('Arial','B',16);  
// foreach($myarray as $value){
//     $pdf->AddPage();
//     $pdf->Cell(40,10,$value);
// }
$nom='Attestation'.".pdf";
$pdf->Output('I',$nom);

?>




