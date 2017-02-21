<?php

include_once "basededonnee.php";

$req = $bdd->prepare('SELECT * FROM ville'); 
$req->execute();
while($donnees = $req->fetch()){
	echo '"'.$donnees["ville"].'",';
	}
?>