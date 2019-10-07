<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$erreur = false;
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$type = $_REQUEST['type'];
		if($type == "visiteur") {
			$visiteur = $pdo->getInfosVisiteur($login,$mdp);
			if(!is_array($visiteur)) $erreur = true;
			else {
				$id = $visiteur['id'];
				$nom =  $visiteur['nom'];
				$prenom = $visiteur['prenom'];
			}
		} elseif($type == "comptable") {
			$comptable = $pdo->getInfosComptable($login,$mdp);
			if(!is_array($comptable)) $erreur = true;
			else {
				$id = $comptable['id'];
				$nom =  $comptable['nom'];
				$prenom = $comptable['prenom'];
			}
		}

		if($erreur) {
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
			return;
		}

		connecter($id,$nom,$prenom,$type);
		include("vues/v_sommaire.php");
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>
