    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">

        <h2>

</h2>

      </div>
        <ul id="menuList">
			<li >
				  <?= $_SESSION['type']; ?> :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']; ?>
			</li>
            <li class="smenu">
               <a href="index.php?uc=suivreFiche&action=suivieFicheFrais" title="Consultation de mes fiches de frais">Suivre fiche</a>
            </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerVisiteur" title="Consultation de mes fiches de frais">Valider fiche de frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>

    </div>
