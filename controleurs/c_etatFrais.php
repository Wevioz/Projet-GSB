<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['id'];
switch($action){
	case 'selectionnerVisiteur':{
		$lesVisiteurs=$pdo->getLesVisiteursByComptable($idComptable);
		include("vues/v_listeVisiteurs.php");
		break;
	}
	case 'selectionnerMois':{
		$visiteur = $_REQUEST['visiteur'];
		$lesMois=$pdo->getLesMoisDisponibles($visiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMois.php");
		break;
	}
	case 'voirEtatFrais':{
		$visiteur = $_REQUEST['visiteur'];
		$leMois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($visiteur);
		$moisASelectionner = $leMois;
		include("vues/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($visiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($visiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		$total = 0;
		include("vues/v_etatFrais.php");
	}
}
?>
