<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <title>Document</title>
</head>
<body>
  <header class="text-center">
    <h1 class="text-white text-center"><a href="./">Bienvenue à bord</a></h1>
    <nav class="">
      <?php if( isset($_SESSION['membre']) && $_SESSION['membre']['statut']): ?>
        <a href="" class="btn btn-success">Agence </a>
        <a href="" class="btn btn-success">Véhicule </a>
        <a href="index.php?action=membre" class="btn btn-success">Membre </a>
      <?php endif; ?>
      <?php if( isset($_SESSION['membre']) ): ?>
        <a href="" class="btn btn-success">Commande </a>
        <a href="index.php?action=deconnexion" class="btn btn-warning">Déconnexion</a>
         <div> <?= $_SESSION['membre']['prenom'] ?> </div>
        <?php else: ?>
          <a href="index.php?action=inscription" class="btn btn-success">Inscription</a>
        <a href="index.php?action=connexion" class="btn btn-success">Connexion</a>
      <?php endif; ?>

    </nav>
  </header>
  <main class="container-fluid">
