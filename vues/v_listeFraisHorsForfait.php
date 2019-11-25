
<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
				        <th class="libelle">Libellé</th>
                <th class="montant">Montant</th>
                <th class="action">&nbsp;</th>
             </tr>

    <?php
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait)
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date =$unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
      $total = $total + $montant;
	?>
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php if($unFraisHorsForfait['etat'] == 1) echo "[SUPPRIMÉ] "; ?><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
                <td><a href="index.php?uc=gererFrais&action=reporterFrais&idFrais=<?php echo $id ?>&date=<?php echo $date; ?>&visiteur=<?php echo $visiteur; ?>" onclick="return confirm('Voulez-vous vraiment reporter ce frais?');">Reporter ce frais</a></td>
             </tr>
	<?php

          }
	?>






        </fieldset>
    </div>
    </table>
    <form method="POST"  action="index.php?uc=gererFrais&action=actualiserFrais">
          <input type="hidden" name="total" value="<?= $total ?>">
          <input type="hidden" name="visiteur" value="<?= $visiteur ?>">
          <input type="hidden" name="leMois" value="<?= $leMois ?>">
          <input type="submit" value="Actualiser">
    </form>
    <form method="POST"  action="index.php?uc=gererFrais&action=validerFrais">
          <input type="hidden" name="visiteur" value="<?= $visiteur ?>">
          <input type="hidden" name="leMois" value="<?= $leMois ?>">
          <input type="submit" value="Valider">
    </form>
  </div>
