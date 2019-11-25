
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> :
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>


    </p>
  	<?php include('vues/v_listeFraisForfait.php'); ?>
  	<?php include('vues/v_listeFraisHorsForfait.php'); ?>
  </div>
  </div>
