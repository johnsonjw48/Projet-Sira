
  <div>
    <h2>Inscription</h2>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="">Prénom</label>
        <input type="text" name="prenom" placeholder="Votre prénom" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" placeholder="Votre nom" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Login</label>
        <input type="text" name="pseudo" placeholder="Votre login" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Mot de passe</label>
        <input type="password" name="mdp" placeholder="Votre password" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Mail</label>
        <input type="text" name="email" placeholder="Votre mail" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Civilité</label>
        <select name="civilite" id="" class="form-control">
          <option value="m">Homme</option>
          <option value="f">Femme</option>
        </select>
      </div>
      <button class="btn btn-primary" type="submit" name="inscription">S'inscrire</button>
      <button class="btn btn-secondary" type="reset">Annuler</button>
    </form>
  </div>
