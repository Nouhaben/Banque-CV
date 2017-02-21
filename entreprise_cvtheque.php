<form method="post">
	<input type="text" placeholder="rechercher" name="rechercher" style="margin:10px 0;height:30px;line-height:30px;font-size:18px;width:75%;border:2px solide #86557C;padding:3px;">
	<input type="submit" value="Recherche" style="padding:5px;">
</form>
<div id="cvtheque">
	<?php


	if(isset($_POST['rechercher']) && !empty($_POST['rechercher'])){

		$req = $bdd->prepare("SELECT * FROM membres WHERE nom LIKE :recherche OR prenom LIKE :recherche OR ville LIKE :recherche OR competence_titre LIKE :recherche OR competence_details LIKE :recherche OR vie_associative_details LIKE :recherche OR vie_associative_titre LIKE :recherche OR centre_interet_titre LIKE :recherche OR centre_interet_details LIKE :recherche OR formation_concentration LIKE :recherche OR formation_cursus LIKE :recherche OR formation_ecole LIKE :recherche OR formation_details LIKE :recherche OR experience_societe LIKE :recherche OR experience_details LIKE :recherche OR stage_societe LIKE :recherche") or die(mysql_error());
		$req->execute(array("recherche" => "%".$_POST['rechercher']."%"));
	}else{
		$start = 0;
		$combien = 100;
		$req = $bdd->query("SELECT * FROM membres LIMIT $start,$combien") or die(mysql_error());
	}
	while($entree = $req->fetch()){
		$email_utilisateur = strstr($entree["email"], '@', true);
?>


<a href="cvtheque-<?php echo $entree['id']; ?>"><div class="candidat_cv">
	<img src="img_candidats/<?php echo $email_utilisateur; ?>.png" width="70" height="90" style="border:2px solid;float:left;">
	<div class="candidat_cv_infos">
		<span style="font-size: 22px;"><?php echo $entree['nom']." ".$entree["prenom"]; ?></span> 

		<br><span style="color:#7EA5EE"><?php 
		switch($entree["formation_concentration"]){
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

		if (empty($formation_concentration) || !isset($formation_concentration)){
				$formation_concentration = "Non définie";
			}
		echo "Formation : ".$formation_concentration." | BAC+".$entree['formation_niveau'];

		?></span>
		<br><br>
		<div style="color:#E57400;">Etablissement :<?php 
	$formation_ecole_separateur = explode("<[separateur]>",utf8_encode($entree["formation_ecole"]));

		echo end($formation_ecole_separateur); ?></div>

		<div style="color:#35363E;">Habite à : <?php echo $entree['ville']; ?></div>
	</div>

</div></a>
<?php
	}
?>

</div>