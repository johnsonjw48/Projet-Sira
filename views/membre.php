<!-- <?php !isset($_SESSION['membre']) && $_SESSION['membre']['statut'] ? header("location: .") : '' ?> -->

  <h2 class="text-center">Gestion des membres</h2>

  <table class="table table-bordered table-striped">
    <tr class="thead-dark">
      <th>Pseudo </th>
      <th>Civilité </th>
      <th>Prénom </th>
      <th>Nom </th>
      <th>Email </th>
      <th>Statut </th>
      <th>Date enrégistrement </th>
      <th>Action</th>
    </tr>
    <?php foreach($listeMembre as $key => $value): ?>
      <tr>
        <td> <?= $value->getPseudo(); ?> </td>
        <td> <?= $value->getCivilite(); ?></td>
        <td> <?= htmlentities($value->getPrenom()); ?> </td>
        <td> <?= $value->getNom(); ?> </td>
        <td> <?= $value->getEmail() ?> </td>
        <td> <?= $value->getStatut() ?> </td>
        <td> <?= $value->getDateEnregistrement() ?> </td>
        <td>
          <a href="index.php?action=update&id=<?= $value->getPseudo(); ?>"><i class="fas fa-pen"></i> </a> -
          <a href="index.php?action=delete&id=<?= $value->getPseudo(); ?>"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <h4>Ajout/modif membre</h4>
  <form action="index.php" method="post" class="row">
    <input type="hidden" name="id" value="<?= isset($membre) ? $membre->getId() : 0 ?>">
      <div class="form-group col-6">
        <label for="">Prénom</label>
        <input type="text" name="prenom" placeholder="Votre prénom" class="form-control" value="<?= isset($membre) ? $membre->getPrenom() : '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Nom</label>
        <input type="text" name="nom" placeholder="Votre nom" class="form-control" value="<?= isset($membre) ? $membre->getNom() : '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Login</label>
        <input type="text" name="pseudo" placeholder="Votre login" class="form-control"  value="<?= isset($membre) ? $membre->getPseudo() : '' ?>">
      </div>
      <div class="form-group col-6">
        <label for="">Mot de passe</label>
        <input type="password" name="mdp" placeholder="Votre password" class="form-control">
      </div>
      <div class="form-group col-4">
        <label for="">Mail</label>
        <input type="text" name="email" placeholder="Votre mail" class="form-control"  value="<?= isset($membre) ? $membre->getEmail() : '' ?>">
      </div>
      <div class="form-group col-4">
        <label for="">Civilité</label>
        <select name="civilite" id="" class="form-control">
          <option value="m" <?= isset($membre) && $membre->getCivilite() == 'm' ? 'selected' : '' ?>>
            Homme
          </option>
          <option value="f" <?= isset($membre) && $membre->getCivilite() == 'f'? 'selected' : '' ?>>
            Femme
          </option>
        </select>
      </div>
      <div class="form-group col-4">
        <label for="">Statut</label>
        <select name="statut" id="" class="form-control">
          <option value="1" <?= isset($membre) && $membre->getStatut() == 1 ? 'selected' : '' ?>>Admin</option>
          <option value="0" <?= isset($membre) && $membre->getStatut() == 0 ? 'selected' : '' ?>>user</option>
        </select>
      </div>
      <button class="btn btn-primary offset-10 col-1" name="<?= isset($membre) ? 'update' : 'inscription' ?>" type="submit"><?= isset($membre) ? 'Update' : 'Ajouter' ?></button>
    </form>
