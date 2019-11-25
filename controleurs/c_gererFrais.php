<?php
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['id'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
switch($action){
	case 'saisirFrais':{
		if($pdo->estPremierFraisMois($idVisiteur,$mois)){
			$pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
		}
		break;
	}
	case 'validerMajFraisForfait':{
		$visiteur = $_REQUEST['visiteur'];
		$leMois = $_REQUEST['leMois'];
		$lesFrais = $_REQUEST['lesFrais'];
		if(lesQteFraisValides($lesFrais)){
                    echo "avant" ;
	  	 	$pdo->majFraisForfait($visiteur,$leMois,$lesFrais);
                        echo "après" ;
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
	  break;
	}
	case 'validerCreationFrais':{
		$visiteur = $_REQUEST['visiteur'];
		$dateFrais = $_REQUEST['dateFrais'];
		$libelle = $_REQUEST['libelle'];
		$montant = $_REQUEST['montant'];
		valideInfosFrais($dateFrais,$libelle,$montant);
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
		else{
			$pdo->creeNouveauFraisHorsForfait($visiteur,getMois($dateFrais),$libelle,$dateFrais,$montant);
		}
		break;
	}
	case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
	    $pdo->supprimerFraisHorsForfait($idFrais);
		break;
	}
	case 'reporterFrais': {
		$idFrais = $_REQUEST['idFrais'];
		$date = $_REQUEST['date'];
		$visiteur = $_REQUEST['visiteur'];
		$pdo->reporterFraisHorsForfait($idFrais, $date, $visiteur);
		break;
	}
	case 'actualiserFrais': {
		$total = $_REQUEST['total'];
		$leMois = $_REQUEST['leMois'];
		$visiteur = $_REQUEST['visiteur'];
		$pdo->actualiserFrais($leMois, $visiteur, $total);
		break;
	}
	case 'validerFrais': {
		$visiteur = $_REQUEST['visiteur'];
		$leMois = $_REQUEST['leMois'];
		$pdo->validerFrais($leMois, $visiteur);
		break;
	}
}
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
include("vues/v_listeFraisForfait.php");
include("vues/v_listeFraisHorsForfait.php");

?>
