<?php
	$competence_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["competence_titre"]));
	$competence_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["competence_details"]));
	$vie_associative_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["vie_associative_titre"]));
	$vie_associative_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["vie_associative_details"]));
	$centre_interet_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["centre_interet_titre"]));
	$centre_interet_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["centre_interet_details"]));
	$formation_date_separateur = explode("<[separateur]>",utf8_encode($_SESSION["formation_date"]));
	$formation_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["formation_titre"]));
	$formation_ecole_separateur = explode("<[separateur]>",utf8_encode($_SESSION["formation_ecole"]));
	$formation_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["formation_details"]));
	$experience_date_separateur = explode("<[separateur]>",utf8_encode($_SESSION["experience_date"]));
	$experience_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["experience_titre"]));
	$experience_societe_separateur = explode("<[separateur]>",utf8_encode($_SESSION["experience_societe"]));
	$experience_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["experience_details"]));
	$stage_date_separateur = explode("<[separateur]>",utf8_encode($_SESSION["stage_date"]));
	$stage_titre_separateur = explode("<[separateur]>",utf8_encode($_SESSION["stage_titre"]));
	$stage_societe_separateur = explode("<[separateur]>",utf8_encode($_SESSION["stage_societe"]));
	$stage_details_separateur = explode("<[separateur]>",utf8_encode($_SESSION["stage_details"]));

	$email_utilisateur = strstr($_SESSION["email"], '@', true);

		switch($_SESSION["formation_concentration"]){
			case 1: $formation_concentration =  "Non définie"; break;
			case 2: $formation_concentration =  "Informatique/ Réseaux/ Télécoms"; break;
			case 3: $formation_concentration =  "Import/ Export/ Commerce"; break;
			case 4: $formation_concentration =  "Direction générale"; break;
			case 5: $formation_concentration =  "Distribution/ Logistique/ Transport"; break;
			case 6: $formation_concentration =  "Commercial/ Vente"; break;
			case 7: $formation_concentration =  "Comptabilité/ Finance/ Audit"; break;
			case 8: $formation_concentration =  "Administration/ Secrétariat"; break;
			case 9: $formation_concentration =  "Internet/ E-commerce/ E-reputation"; break;
			case 10: $formation_concentration =  "Juridique/ Droit"; break;
			case 11: $formation_concentration =  "Marketing/ Communication/ Publicité"; break;
			case 12: $formation_concentration =  "Organisation/ Gestion/ Stratégie"; break;
			case 13: $formation_concentration =  "Recherche &amp; Développement"; break;
			case 14: $formation_concentration =  "Système d&#039;information"; break;
			case 15: $formation_concentration =  "Qualité/ Production"; break;
			case 16: $formation_concentration =  "Ressources Humaines"; break;
			case 17: $formation_concentration =  "Services Généraux"; break;
			case 18: $formation_concentration =  "Tourisme/ Hôtellerie/ Restauration"; break;
			case 19: $formation_concentration =  "Maintenance/ Réparation"; break;
			case 20: $formation_concentration =  "Enseignement /Formation /Education"; break;
			case 21: $formation_concentration =  "Évenementiel"; break;
			default: "Non définie"; break;
		}

?><div id="visionnercv">

	<img src="img_candidats/<?php echo $email_utilisateur; ?>.png" style="float:right;margin-top: 5px;" width="170" height="190" border="2">
<br>
	<span style="font-size: 24px; "><?php echo ucfirst($_SESSION["nom"]); //ucfirst : met la première lettre en majescule 
			echo " ".strtoupper($_SESSION["prenom"]); //strtoupper : met toutes les lettres en maj
			if (empty($formation_concentration) || !isset($formation_concentration)){
				$formation_concentration = "Non définie";
			}
	?></span> <span style="font-size: 12px"><?php echo $formation_concentration." | BAC+".$_SESSION['formation_niveau']; ?></span><br><br>
	<span style="color:#E57400;">Né le :</span><?php echo $_SESSION["date_naissance"][2]."/".$_SESSION["date_naissance"][1]."/".$_SESSION["date_naissance"][0]; ?><br>
	<span style="color:#E57400;">Adresse :</span><?php echo $_SESSION["adresse"]; ?><br>
	<span style="color:#E57400;">Ville :</span><?php echo $_SESSION["ville"]; ?><br>
	<span style="color:#E57400;">Téléphone :</span><?php echo $_SESSION["telephone"]; ?><br>
	<span style="color:#E57400;">Statut :</span><?php if($_SESSION["statut"] == "celib"){ echo "Célibataire"; }elseif($_SESSION["statut"] == "marie") { echo "Marié"; }else{ echo "Non définie"; } ?><br>
	<span style="color:#E57400;">E-mail :</span><?php echo $_SESSION["email"]; ?><br>
	
<div style="clear:both"></div>
	<div id="colonne_gauche">
		<h3>Compétences</h3>
		<ul>
		<?php foreach ($competence_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
		?>
			<li><?php echo "<b>".$value."</b> : ".$competence_details_separateur[$key]; ?></li>

		<?php } ?>
		</ul>

		<h3>Langues</h3>
		<ul>
		<?php foreach ($_SESSION["langue_titre"] as $key => $value) {
			if(empty($value)){ continue; }
		?>
			<li><?php echo "<b>".$value."</b> : ".$_SESSION["langue_details"][$key]; ?></li>

		<?php } ?>
		</ul>

		<h3>Vie associative</h3>
		<ul>
		<?php foreach ($vie_associative_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
		?>
			<li><?php echo "<b>".$value."</b> : ".$vie_associative_details_separateur[$key]; ?></li>

		<?php } ?>
		</ul>

		<h3>Centre d'intérêt</h3>
		<ul>
		<?php foreach ($centre_interet_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
		?>
			<li><?php echo "<b>".$value."</b> : ".$centre_interet_details_separateur[$key]; ?></li>

		<?php } ?>
		</ul>
	</div>

	<div id="colonne_droite">
		<h3>Formation</h3>
		<ul>
		<?php foreach ($formation_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
			$date = explode("--", $formation_date_separateur[$key]);
		?>
			<li><?php echo "<b>".$date[0]." - ".$date[1]."</b> : ".$formation_titre_separateur[$key]." à ".$formation_ecole_separateur[$key]; ?></li>
			<p style="color:#aaa;margin:3px 0;"><?php echo $formation_details_separateur[$key]; ?></p>

		<?php } ?>
		</ul>

		<h3>Experience professionnelle</h3>
		<ul>
		<?php foreach ($experience_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
			$date = explode("--", $experience_date_separateur[$key]);
		?>
			<li><?php echo "<b>".$date[0]." - ".$date[1]."</b> : ".$experience_titre_separateur[$key]." à ".$experience_societe_separateur[$key]; ?></li>
			<p style="color:#aaa;margin:3px 0;"><?php echo $experience_details_separateur[$key]; ?></p>

		<?php } ?>
		</ul>

		<h3>Stages et volontariat</h3>
		<ul>
		<?php foreach ($stage_titre_separateur as $key => $value) {
			if(empty($value)){ continue; }
			$date = explode("--", $stage_date_separateur[$key]);
		?>
			<li><?php echo "<b>".$date[0]." - ".$date[1]."</b> : ".$stage_titre_separateur[$key]." à ".$stage_societe_separateur[$key]; ?></li>
			<p style="color:#aaa;margin:3px 0;"><?php echo $stage_details_separateur[$key]; ?></p>

		<?php } ?>
		</ul>
	</div>
</div><br><br>
<div style="clear:both"></div>

<div style="text-align: center;"><a href="candidat"><img src="img/btnModifiercv.png" border="0px"></a></div>