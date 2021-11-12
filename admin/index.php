<?php
  if (isset($_GET['page'])) {
  $page=$_GET['page'];
  }else
  {
    $page='login';
  }

  switch ($page) 
{
  case $page==='login':
    require 'login/index.php';
  break;
  // acceuil
  case $page==='home':
    require 'home/index.php';
  break;

//================================================
    // utilisateurs
  case $page==='utilisateurs':
     require 'user/index.php';
  break;

  // ajouter utilisateur
  case $page==='Ajouter-utilisateur':
     require 'user/create.php';
  break;

     // modifier utilisateur
  case $page==='Modifer-utilisateur':
     require 'user/edit.php';
  break;
  //==================================================


    // ajouter utilisateur
  case $page==='ajouter-formation':
     require 'formation/create.php';
  break;

  case $page==='formations':
     require 'formation/index.php';
  break;

    case $page==='modification-de-formation':
     require 'formation/edit.php';
  break;

  case $page==='formation':
     require 'formation/show.php';
  break;


  case $page==='profile':
      require 'user/profile.php';
  break;

  //==========================================================================

  // liste des modules 
   case $page==='modules':
       require 'formation/modules/index.php';
    break;

    // afficher un module 
     case $page==='module':
       require 'formation/modules/show.php';
    break;

  //============================================================================



case $page==='information-de-base':
     require 'organisation/informations.php';
break;


  //============================================================================

// participant 
case $page==='participants':
     require 'formation/participant/participation_inscrits.php';
break;

// participant 
case $page==='participants_':
     require 'formation/participant/participants.php';
break;


// statistique sur les participants 
case $page==='statistique-formation':
     require 'formation/participant/statistique.php';
break;

  //============================================================================
// liste des intervenants
  case $page==='intervenants':
     require 'formation/intervenant/index.php';
  break;

  //============================================================================

    case $page==='documents':
      require 'document/index.php';
    break;

  //============================================================================
// liste des Quiz
case $page==='quiz':
     require 'formation/quiz/question/create.php';
break;


// liste des question d'un quiz 
case $page==='questions':
     require 'formation/quiz/question/index.php';
break;

// modifier une question
case $page==='modifier-cette-question':
     require 'formation/quiz/question/edit.php';
break;

  //============================================================================
// une attestation imprimer
case $page==='attestation':
     require 'formation/dossier/attestation.php';
break;

// liste des attestation par depatement imprimer
case $page==='attestation-all':
     require 'formation/dossier/attestation-all.php';
break;

// Liste de tous les certificats
case $page==='participants-certifiés.':
     require 'formation/dossier/participant-certifiies.php';
break;

// Liste de tous les attestations
case $page==='participants-attestes.':
     require 'formation/dossier/participant-attestes.php';
break;

// liste des certificat par depatman imprimer
case $page==='certificat-all':
     require 'formation/dossier/certificat-all.php';
break;


// un certificat imprimer
case $page==='certificat':
     require 'formation/dossier/certificat.php';
break;

// liste des participants ayant passer au moins un quiz
case $page==='les-participants':
     require 'formation/certifie-atteste/index.php';
break;

// listes des partiticipants qui obtienne leurs ertificats
case $page==='certificats':
     require 'formation/certifie-atteste/certificate-all_depatement.php';
break;

// listes des partiticipants qui obtienne leurs ertificats
case $page==='participants-certifiés':
     require 'formation/certifie-atteste/certificate-all.php';
break;

// listes des partiticipants qui obtienne leurs attestation
case $page==='participants-attestés':
     require 'formation/certifie-atteste/attestation-all.php';
break;

// liste des participants qui obtiennent leurs attestations 
case $page==='attestations':
     require 'formation/certifie-atteste/attestation-all_depatement.php';
break;
  //============================================================================

    //  creer article
  case $page==='Créer-un-article':
     require 'article/create.php';
  break;
  // lister article
  case $page==='Liste-des-articles':
     require 'article/index.php';
  break;
  // ajouter photo a un article
  case $page==='Ajouter-une-photo':
     require 'article/add-photo.php';
  break;
  // afficher article
  case $page==='Article':
      require 'article/show.php';
  break;
  // modifier article
  case $page==='Modifier-article':
      require 'article/edit.php';
  break;
// ajouter des photos pour chaque article
  case $page==='photos-activités':
     require 'photos/create.php';
 break;

 // liste des photos d'une activité
 case $page==='photo-activités':
     require 'article/photo.php';
break;

  //a jouter evenement
  case $page==='evènements':
     require 'evenement/index.php';
   break;
  // ajouter photo pour un projet
  case $page==='ajouter-une-photo':
     require 'projet/add-photo.php';
   break;
 
   // modifer un projet
     // ajouter photo pour un projet
   case $page==='modifier-un-projet':
     require 'projet/edit.php';
   break;
 
     // afficher un projet
   case $page==='Projet':
     require 'projet/show.php';
   break;
   // ajouter un projet
  case $page==='ajouter-un-projet':
     require 'projet/create.php';
 break;

 case $page==='photos-activités':
     require 'photos/create.php';
 break;

 case $page==='photo-activités':
   require 'article/photo.php';
 break;

 case $page==='video-activités':
     require 'article/video.php';
 break;

// liste des projets
case $page==='projets':
  require 'projet/index.php';
break;

// liste videos
case $page==='categories':
  require 'categorie/index.php';
break;

// liste des publications 
case $page==='publications':
  require 'publication/index.php';
break;

// creeer une publication 
case $page==='créer-une-publication':
  require 'publication/create.php';
break;

// modifier publication
case $page==='modifier-publication':
  require 'publication/edit.php';
break;

// voir la publication
case $page==='publication':
  require 'publication/show.php';
break;

// creer un offre d'enploi
case $page==='créer-une-offre':
     require 'offres/create.php';
break;

// abonnee
case $page==='offres':
     require 'offres/index.php';
break;

// show offres
case $page==="offre-emploi":
     require 'offres/show.php';
break;

// modifier offres
case $page==="modifier-cet-offre":
     require 'offres/edit.php';
break;
  // erreur 404
  default:
    require 'error/404.php';
  break;
}


?>