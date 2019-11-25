<div id="contenu">
      <h2>Mes fiches de frais</h2>
      <h3>Visiteur à selectionner : </h3>
      <form action="index.php?uc=etatFrais&action=selectionnerMois" method="post">
      <div class="corpsForm">

      <p>

        <label for="lstVisiteur" accesskey="n">Visiteur : </label>
        <select id="lstVisiteur" name="visiteur">
        <?php foreach ($lesVisiteurs as $visiteur) { ?>
  				<option value="<?php echo $visiteur['id']; ?>"><?php echo $visiteur['nom'] . ' ' . $visiteur['prenom']; ?></option>
        <?php } ?>
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p>
      </div>

      </form>
