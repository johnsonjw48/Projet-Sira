<?php

include "modele/MembreModele.php";

class MembreController{

  private $modele;

  public function __construct(){
    $this->modele = new MembreModele();
  }

  function inscription($data){
    $this->modele->inscription($data);
  }

  function listeMembre(){
    return $this->modele->liste();
  }

  function connexion($param){
    $this->modele->connexion($param);
    header("location: .");
  }

  function deleteMembre($id){
    $this->modele->delete($id);
    header("location: .?action=membre");
  }

  function infoMembre($identifiant){
    $membre = $this->modele->getMembre($identifiant);
    return $membre;
  }

  function update($m){
    $this->modele->update($m);
    header("location: .?action=membre");
  }

}
