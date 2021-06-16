<?php

require 'DB.php';

class MembreModele extends DB{

  function inscription($donnees){
    $sql = "INSERT INTO membre VALUES(NULL, :log,:mdp, :nom, :prenom, :mail, :cv, :user, now())";

    $insert = $this->executerRequete($sql, [
      "log"    => $donnees->getPseudo(),
      "mdp"    => password_hash($donnees->getMdp(), PASSWORD_DEFAULT),
      "nom"    => $donnees->getNom(),
      "prenom" => $donnees->getPrenom(),
      "mail"   => $donnees->getEmail(),
      "cv"     => $donnees->getCivilite(),
      "user"   => $donnees->getStatut() ? 1 : 0
    ] );

  }

  function connexion($data){
    $query = $this->executerRequete("SELECT * FROM membre WHERE pseudo = ?", [$data["pseudo"]]);

    if($query->rowCount() != 0){
      $membre = $query->fetch();
      if( password_verify($data['mdp'], $membre['mdp']) ){
        $_SESSION['membre'] = $membre;
      }

    }
  }

  function liste(){

    $liste = $this->executerRequete("SELECT * FROM membre");

    $tabMembre = [];

    while ($membre = $liste->fetch()) {
      $tabMembre[] = new Membre($membre);
    }
    return $tabMembre;
  }

  function delete($idMembre){
    $this->executerRequete("DELETE FROM membre WHERE pseudo = ?", array(
      $idMembre
    ));
  }

  function getMembre($idMembre){
    $info = $this->executerRequete("SELECT * FROM membre WHERE pseudo = ?", [
      $idMembre
    ]);
    return new Membre($info->fetch());
  }

  function update($membre){
    $res = $this->executerRequete("UPDATE membre SET
      pseudo   = :pseudo,
      prenom   = :prenom,
      nom      = :nom,
      mdp      = :mdp,
      civilite = :civilite,
      email    = :mail,
      statut   = :statut
      WHERE id = :id",
      [
        "pseudo"    => $membre->getPseudo(),
        "prenom"    => $membre->getPrenom(),
        "nom"       => $membre->getNom(),
        "mdp"       => $membre->getMdp(),
        "civilite"  => $membre->getCivilite(),
        "mail"      => $membre->getEmail(),
        "statut"    => $membre->getStatut(),
        "id"        => $membre->getId()
      ]);

  }

  function executerRequete($requete, $params = array()){
    $result = $this->connect()->prepare($requete);

    if( !empty($params) ){
      foreach ($params as $key => $value) {
        $params[$key] = htmlspecialchars($value);
      }
    }

    $result->execute($params);

    return $result;
  }

}

/*
 $tabMembre = [];
    $tabMembre[] = new Membre([
      "pseudo" => "ilci",
      "civilite" => "Femme",
      "prenom" => "toto",
      "nom" => "Tata",
      "email" => "rrr@fgfg.fr",
      "statut" => "admin",
      "dateEnregistrement" => "2020/12/08",
    ]);
    $tabMembre[] = new Membre([
      "pseudo" => "autre",
      "civilite" => "Homme",
      "prenom" => "Jacques",
      "nom" => "Tata",
      "email" => "rrr@fgfg.fr",
      "statut" => "admin",
      "dateEnregistrement" => "2020/12/08",
    ]);
    return $tabMembre;
*/
