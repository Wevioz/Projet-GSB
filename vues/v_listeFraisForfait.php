<div id="contenu">
      <h2>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>

      <form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">
      <div class="corpsForm">

          <fieldset>
            <legend>El�ments forfaitis�s
            </legend>
			<?php
				foreach ($lesFraisForfait as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
          $total = $total + $quantite; 
			?>
					<p>
						<label for="idFrais"><?php echo $libelle ?></label>
						<input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
            <input type="hidden" name="visiteur" value="<?= $visiteur ?>">
            <input type="hidden" name="leMois" value="<?= $leMois ?>">
            <?php echo $leMois; ?>
					</p>

			<?php
				}
			?>





          </fieldset>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p>
      </div>

      </form>
