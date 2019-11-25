<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['id'];
switch($action){
	case 'suivieFicheFrais':{
    if(isset($_POST['rembourser']) and isset($_POST['checkbox'])) {
      foreach($_POST['checkbox'] as $infos) {
        $numMois = substr($infos,0,6);
        $id = substr($infos, 8, 4);
        $pdo->majEtatFicheFrais($id, $numMois, "RB");
      }
    } elseif(isset($_POST['mettre_en_paiement']) and isset ($_POST['checkbox'])) {
      foreach($_POST['checkbox'] as $infos) {
        $numMois = substr($infos,0,6);
        $id = substr($infos, 8,4);
        $idEtat=substr($infos, 6,2);

        if(strcmp($idEtat,'RB') == 0) {
          $pdo->majEtatFicheFrais($id, $numMois, 'VA');
        }
      }
    }

    $lstVisiteur =$pdo->getLesVisiteursDuComptableVa($idComptable);
    include("vues/v_suivreFrais.php");
    break;
	}
  case 'voirDetailFiche': {
    ob_end_clean();
    $visiteur = $_REQUEST["visiteur"];
    $mois = $_REQUEST["mois"];
    $fraisforfait = $pdo->getLesFraisForfait($visiteur, $mois);
    $fraishorsforfait = $pdo->getLesFraisHorsForfait($visiteur, $mois);
    $infovisiteur = $pdo->getInfosVisiteur2($visiteur);
    include("vues/v_detailFiche.php");
    break;
  }
}
?>
