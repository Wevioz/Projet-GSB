<div id="contenu">
      <h2>Mes fiches de frais</h2>
      <h3>Mois à sélectionner : </h3>
      <form action="" method="post">
      <div class="corpsForm">
        <label for="lstMois">Mois : </label>
        <select id="lstMois" name="lstMois">
        <?php while($dataMois = $lesMois->fetch()) { ?>
          <option><?= $dataMois['mois'] ?></option>
		    <?php } ?>
        </select>
      </div>

      <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p>
      </div>
      </form>
