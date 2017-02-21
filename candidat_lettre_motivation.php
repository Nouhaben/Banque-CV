<?php

	$lettre1 = isset($_POST["lettre1"]) ? utf8_decode(filter_input(INPUT_POST,'lettre1',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$lettre2 = isset($_POST["lettre2"]) ? utf8_decode(filter_input(INPUT_POST,'lettre2',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
if(isset($_POST["lettre1"]) && !empty($_POST["lettre1"])){
	$req = $bdd->prepare('UPDATE membres SET lettre1 = :lettre1 WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array("lettre1" => $lettre1, "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
}

if(isset($_POST["lettre2"]) && !empty($_POST["lettre2"])){
	$req = $bdd->prepare('UPDATE membres SET lettre2 = :lettre2 WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array("lettre2" => $lettre2, "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
}

?><h2 style="color:#E57400;">Ajouter des lettres de motivation</h2>

<h4 style="color:#739EE7;">1ère lettre</h4>
<form method="post">
<textarea style="width:99%;min-height: 250px;" placeholder="Madame, monsieur," name="lettre1"><?php 
		if (isset($_SESSION['lettre1']) && !empty($_SESSION['lettre1'])) {
			echo utf8_encode($_SESSION['lettre1']);
		}

?></textarea>
<input type="submit" value="Enregistrer">
</form>
<br>
<h4 style="color:#739EE7;">2eme lettre</h4>
<form method="post">
<textarea style="width:99%;min-height: 250px;" placeholder="Madame, monsieur," name="lettre2"><?php 
		if (isset($_SESSION['lettre2']) && !empty($_SESSION['lettre2'])) {
			echo utf8_encode($_SESSION['lettre2']);
		}

?></textarea>
<input type="submit" value="Enregistrer">
</form>