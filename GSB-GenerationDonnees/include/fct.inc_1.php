<?php


function getLesFichesFrais($pdo)
{
		$req = "select * from ficheFrais";
		$res = $pdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
}

function getDesFraisHorsForfait()
{
	$tab = array(
				1 => array(
				      "lib" => "repas avec praticien",
					  "min" => 30,
					  "max" => 50 ),
				2 => array(
				      "lib" => "achat de materiel de papeterie",
					  "min" => 10,
					  "max" => 50 ),
				3	=> array(
				      "lib" => "taxi",
					  "min" => 20,
					  "max" => 80 ),
				4 => array(
				      "lib" => "achat d'espace publicitaire",
					  "min" => 20,
					  "max" => 150 ),
				5 => array(
				      "lib" => "location salle conference",
					  "min" => 120,
					  "max" => 650 ),
				6 => array(
				      "lib" => "Voyage SNCF",
					  "min" => 30,
					  "max" => 150 ),
				7 => array(
					  "lib" => "traiteur, alimentation, boisson",
					  "min" => 25,
					  "max" => 450 ),
				8 => array(
					  "lib" => "remuneration intervenant/specialiste",
					  "min" => 250,
					  "max" => 1200 ),
				9 => array(
					  "lib" => "location equipement video/sonore",
					  "min" => 100,
					  "max" => 850 ),
				10 => array(
					  "lib" => "location vehicule",
					  "min" => 25,
					  "max" => 450 ),
				11 => array(
					  "lib" => "frais vestimentaire/representation",
					  "min" => 25,
					  "max" => 450 ) 
		);
	return $tab;
}

function creationFraisHorsForfait($pdo)
{
	$desFrais = getDesFraisHorsForfait();
	$lesFichesFrais= getLesFichesFrais($pdo);
	
	foreach($lesFichesFrais as $uneFicheFrais)
	{
		$idVisiteur = $uneFicheFrais['idVisiteur'];
		$mois =  $uneFicheFrais['mois'];
		$nbFrais = rand(0,5);
		for($i=0;$i<=$nbFrais;$i++)
		{
			$hasardNumfrais = rand(1,count($desFrais)); 
			$frais = $desFrais[$hasardNumfrais];
			$lib = $frais['lib'];
			$min= $frais['min'];
			$max = $frais['max'];
			$hasardMontant = rand($min,$max);
			$numAnnee =substr( $mois,0,4);
			$numMois =substr( $mois,4,2);
			$hasardJour = rand(1,28);
			if(strlen($hasardJour)==1)
			{
				$hasardJour="0".$hasardJour;
			}
			$hasardMois = $numAnnee."-".$numMois."-".$hasardJour;
			$req = "insert into lignefraishorsforfait(idVisiteur,mois,libelle,date,montant)
			values('$idVisiteur','$mois','$lib','$hasardMois',$hasardMontant);";
			$pdo->exec($req);
		}
	}
}

function majFicheFrais($pdo)
{
	
	$lesFichesFrais= getLesFichesFrais($pdo);
	foreach($lesFichesFrais as $uneFicheFrais)
	{
		$idVisiteur = $uneFicheFrais['idVisiteur'];
		$mois =  $uneFicheFrais['mois'];
		$dernierMois = getDernierMois($pdo, $idVisiteur);
		$req = "select sum(montant) as cumul from ligneFraisHorsForfait where ligneFraisHorsForfait.idVisiteur = '$idVisiteur' 
				and ligneFraisHorsForfait.mois = '$mois' ";
		$res = $pdo->query($req);
		$ligne = $res->fetch();
		$cumulMontantHorsForfait = $ligne['cumul'];
		$req = "select sum(ligneFraisForfait.quantite * fraisForfait.montant) as cumul from ligneFraisForfait, FraisForfait where
		ligneFraisForfait.idFraisForfait = fraisForfait.id   and   ligneFraisForfait.idVisiteur = '$idVisiteur' 
				and ligneFraisForfait.mois = '$mois' ";
		$res = $pdo->query($req);
		$ligne = $res->fetch();
		$cumulMontantForfait = $ligne['cumul'];
		$montantEngage = $cumulMontantHorsForfait + $cumulMontantForfait;
		$etat = $uneFicheFrais['idEtat'];
		if($etat == "CR" )
			$montantValide = 0;
		else
			$montantValide = $montantEngage*rand(80,100)/100;
		$req = "update fichefrais set montantValide =$montantValide where
		idVisiteur = '$idVisiteur' and mois='$mois'";
		$pdo->exec($req);
		
	}
}
?>




