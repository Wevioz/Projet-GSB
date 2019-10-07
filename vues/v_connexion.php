<div id="contenu">
  <h2>Identification utilisateur</h2>


  <form method="POST" action="index.php?uc=connexion&action=valideConnexion">

    <div>
      <label for="nom">Login*</label>
      <input id="login" type="text" name="login"  size="30" maxlength="45">
    </div>

  	<div>
  		<label for="mdp">Mot de passe*</label>
  			<input id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
    </div>

    <div>
      <input type="radio" id="visiteur" name="type" value="visiteur" checked>
      <label for="visiteur">Visiteur</label>
    </div>

    <div>
      <input type="radio" id="comptable" name="type" value="comptable">
      <label for="comptable">Comptable</label>
    </div>

    <input type="submit" value="Valider" name="valider">
    <input type="reset" value="Annuler" name="annuler">

  </form>

</div>
