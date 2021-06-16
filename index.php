<?php
session_start();

include "views/header.php";
include "classes/Membre.class.php";
include "controller/MembreController.php";

$membreController = new MembreController();
$listeMembre = $membreController->listeMembre();


if( isset($_GET['action']) ){
  $action = $_GET['action'];

  switch ( $action ) {
    case 'inscription':
      include "views/inscription.php";
      break;
    case 'connexion':
      include "views/connexion.php";
      break;
    case 'membre':
      include "views/membre.php";
      break;
    case 'delete':
      $membreController->deleteMembre($_GET['id']);
      break;
    case 'update':
      $membre = $membreController->infoMembre($_GET['id']);
      include "views/membre.php";
      break;
    case 'deconnexion' :
      session_destroy();
      header("location: .");
      break;
    default:
      echo "page 404";
      break;
  }
}else{
  include "views/accueil.php";
}

if( !empty($_POST["prenom"]) && isset($_POST['inscription']) ){
  $m = new Membre($_POST);
  $membreController->inscription($m);
}
if( !empty($_POST["prenom"]) && isset($_POST['update']) ){
  $m = new Membre($_POST);
  $membreController->update($m);
}
if( !empty($_POST['pseudo']) && isset($_POST['connexion']) ){
  $membreController->connexion($_POST);
}

include "views/footer.php";
