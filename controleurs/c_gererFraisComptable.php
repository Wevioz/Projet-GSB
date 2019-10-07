<?php
/**
 * Affiche les mois et les années
 */
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
switch($action){
	case 'validerFrais':{
    $lesMois = $pdo->getLesMois();
		include("vues/v_validerFrais.php");
		break;
	}
}
?>
