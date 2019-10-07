Programme d'actualisation des lignes des tables,  
 cette mise � jour peut prendre plusieurs minutes...
<?php
include("include/fct.inc.php");

/* Modification des paramètres de connexion */

$serveur='mysql:host=localhost';
$bdd='dbname=gsb_frais';   		
$user='root' ;    		
$mdp='' ;	

/* fin paramètres*/

$pdo = new PDO($serveur.';'.$bdd, $user, $mdp);
$pdo->query("SET CHARACTER SET utf8"); 

set_time_limit(0);

creationFichesFrais($pdo);

creationFraisForfait($pdo);

creationFraisHorsForfait($pdo);

majFicheFrais($pdo);


?>