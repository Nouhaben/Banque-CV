<?php
	$formation_concentration = isset($_POST['formation_concentration'] ) ? filter_input(INPUT_POST,'formation_concentration',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_niveau = isset($_POST['formation_niveau'] ) ? filter_input(INPUT_POST,'formation_niveau',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_cursus = isset($_POST['formation_cursus']) ? filter_input(INPUT_POST,'formation_cursus',FILTER_SANITIZE_NUMBER_INT) : false ;
	$formation_nouvelle_datedebut_day = isset($_POST['formation_nouvelle_datedebut_day']) ? filter_input(INPUT_POST,'formation_nouvelle_datedebut_day',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_nouvelle_datedebut_month = isset($_POST['formation_nouvelle_datedebut_month']) ? filter_input(INPUT_POST,'formation_nouvelle_datedebut_month',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_nouvelle_datedebut_year = isset($_POST['formation_nouvelle_datedebut_year']) ? filter_input(INPUT_POST,'formation_nouvelle_datedebut_year',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_nouvelle_datefin_day = isset($_POST['formation_nouvelle_datefin_day']) ? filter_input(INPUT_POST,'formation_nouvelle_datefin_day',FILTER_SANITIZE_NUMBER_INT) : false;
	$formation_nouvelle_datefin_month = isset($_POST['formation_nouvelle_datefin_month']) ? filter_input(INPUT_POST,'formation_nouvelle_datefin_month',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$formation_nouvelle_datefin_year = isset($_POST['formation_nouvelle_datefin_year']) ? filter_input(INPUT_POST,'formation_nouvelle_datefin_year',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$formation_date = $formation_nouvelle_datedebut_day."/".$formation_nouvelle_datedebut_month."/".$formation_nouvelle_datedebut_year."--".$formation_nouvelle_datefin_day."/".$formation_nouvelle_datefin_month."/".$formation_nouvelle_datefin_year;
	$formation_titre = isset($_POST['formation_titre']) ? utf8_decode(filter_input(INPUT_POST,'formation_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$formation_ecole = isset($_POST['formation_ecole']) ? utf8_decode(filter_input(INPUT_POST,'formation_ecole',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$formation_details = isset($_POST['formation_details']) ? utf8_decode(filter_input(INPUT_POST,'formation_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$experience_datedebut_day = isset($_POST['experience_datedebut_day']) ? filter_input(INPUT_POST,'experience_datedebut_day',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_datedebut_month = isset($_POST['experience_datedebut_month']) ? filter_input(INPUT_POST,'experience_datedebut_month',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_datedebut_year = isset($_POST['experience_datedebut_year']) ? filter_input(INPUT_POST,'experience_datedebut_year',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_datefin_day = isset($_POST['experience_datefin_day']) ? filter_input(INPUT_POST,'experience_datefin_day',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_datefin_month = isset($_POST['experience_datefin_month']) ? filter_input(INPUT_POST,'experience_datefin_month',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_datefin_year = isset($_POST['experience_datefin_year']) ? filter_input(INPUT_POST,'experience_datefin_year',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$experience_date = $experience_datedebut_day."/".$experience_datedebut_month."/".$experience_datedebut_year."--".$experience_datefin_day."/".$experience_datefin_month."/".$experience_datefin_year;
	$experience_titre = isset($_POST['experience_titre']) ? utf8_decode(filter_input(INPUT_POST,'experience_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$experience_societe = isset($_POST['experience_societe']) ? utf8_decode(filter_input(INPUT_POST,'experience_societe',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$experience_details = isset($_POST['experience_details']) ? utf8_decode(filter_input(INPUT_POST,'experience_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$stage_datedebut_day = isset($_POST['stage_datedebut_day']) ? filter_input(INPUT_POST,'stage_datedebut_day',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_datedebut_month = isset($_POST['stage_datedebut_month']) ? filter_input(INPUT_POST,'stage_datedebut_month',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_datedebut_year = isset($_POST['stage_datedebut_year']) ? filter_input(INPUT_POST,'stage_datedebut_year',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_datefin_day = isset($_POST['stage_datefin_day']) ? filter_input(INPUT_POST,'stage_datefin_day',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_datefin_month = isset($_POST['stage_datefin_month']) ? filter_input(INPUT_POST,'stage_datefin_month',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_datefin_year = isset($_POST['stage_datefin_year']) ? filter_input(INPUT_POST,'stage_datefin_year',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$stage_date = $stage_datedebut_day."/".$stage_datedebut_month."/".$stage_datedebut_year."--".$stage_datefin_day."/".$stage_datefin_month."/".$stage_datefin_year;
	$stage_titre = isset($_POST['stage_titre']) ? utf8_decode(filter_input(INPUT_POST,'stage_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$stage_details = isset($_POST['stage_details']) ? utf8_decode(filter_input(INPUT_POST,'stage_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$stage_societe = isset($_POST['stage_societe']) ? utf8_decode(filter_input(INPUT_POST,'stage_societe',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;

if(!empty($formation_concentration) && !empty($formation_niveau) && !empty($formation_cursus)){
			$req = $bdd->prepare('UPDATE membres SET formation_concentration = :formation_concentration, formation_niveau = :formation_niveau, formation_cursus = :formation_cursus WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("formation_concentration" => $formation_concentration, "formation_niveau" => $formation_niveau, "formation_cursus" => $formation_cursus, "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
				
				$_SESSION['formation_concentration'] = $formation_concentration;
				$_SESSION['formation_niveau'] = $formation_niveau;
				$_SESSION['formation_cursus'] = $formation_cursus;
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}

		if(!empty($formation_date) && $formation_date != "﻿0/0/0--0/0/0" && !empty($formation_titre) && !empty($formation_ecole) && !empty($formation_details)){

			$_SESSION['formation_date'] = $_SESSION["formation_date"]."<[separateur]>".$formation_date;
			$_SESSION['formation_titre'] = $_SESSION["formation_titre"]."<[separateur]>".$formation_titre;
			$_SESSION['formation_ecole'] = $_SESSION["formation_ecole"]."<[separateur]>".$formation_ecole;
			$_SESSION['formation_details'] = $_SESSION["formation_details"]."<[separateur]>".$formation_details;

			$req = $bdd->prepare('UPDATE membres SET formation_date = :formation_date, formation_titre = :formation_titre, formation_ecole = :formation_ecole, formation_details = :formation_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("formation_date" => $_SESSION['formation_date'], "formation_titre" => $_SESSION['formation_titre'], "formation_ecole" => $_SESSION['formation_ecole'], "formation_details" => $_SESSION['formation_details'], "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
				
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
		$formation_date_separateur = explode("<[separateur]>",$_SESSION["formation_date"]);
		$formation_titre_separateur = explode("<[separateur]>",$_SESSION["formation_titre"]);
		$formation_ecole_separateur = explode("<[separateur]>",$_SESSION["formation_ecole"]);
		$formation_details_separateur = explode("<[separateur]>",$_SESSION["formation_details"]);

		if(!empty($experience_date) && $experience_date != "﻿0/0/0--0/0/0" && !empty($experience_titre) && !empty($experience_societe) && !empty($experience_details)){

			$_SESSION['experience_date'] = $_SESSION["experience_date"]."<[separateur]>".$experience_date;
			$_SESSION['experience_titre'] = $_SESSION["experience_titre"]."<[separateur]>".$experience_titre;
			$_SESSION['experience_societe'] = $_SESSION["experience_societe"]."<[separateur]>".$experience_societe;
			$_SESSION['experience_details'] = $_SESSION["experience_details"]."<[separateur]>".$experience_details;

			$req = $bdd->prepare('UPDATE membres SET experience_date = :experience_date, experience_titre = :experience_titre, experience_societe = :experience_societe, experience_details = :experience_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("experience_date" => $_SESSION['experience_date'], "experience_titre" => $_SESSION['experience_titre'], "experience_societe" => $_SESSION['experience_societe'], "experience_details" => $_SESSION['experience_details'], "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
				
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
		$experience_date_separateur = explode("<[separateur]>",$_SESSION["experience_date"]);
		$experience_titre_separateur = explode("<[separateur]>",$_SESSION["experience_titre"]);
		$experience_societe_separateur = explode("<[separateur]>",$_SESSION["experience_societe"]);
		$experience_details_separateur = explode("<[separateur]>",$_SESSION["experience_details"]);


		if(!empty($stage_date) && $stage_date != "﻿0/0/0--0/0/0" && !empty($stage_titre) && !empty($stage_societe) && !empty($stage_details)){

			$_SESSION['stage_date'] = $_SESSION["stage_date"]."<[separateur]>".$stage_date;
			$_SESSION['stage_titre'] = $_SESSION["stage_titre"]."<[separateur]>".$stage_titre;
			$_SESSION['stage_societe'] = $_SESSION["stage_societe"]."<[separateur]>".$stage_societe;
			$_SESSION['stage_details'] = $_SESSION["stage_details"]."<[separateur]>".$stage_details;

			$req = $bdd->prepare('UPDATE membres SET stage_date = :stage_date, stage_titre = :stage_titre, stage_societe = :stage_societe, stage_details = :stage_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("stage_date" => $_SESSION['stage_date'], "stage_titre" => $_SESSION['stage_titre'], "stage_societe" => $_SESSION['stage_societe'], "stage_details" => $_SESSION['stage_details'], "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
				
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
		$stage_date_separateur = explode("<[separateur]>",$_SESSION["stage_date"]);
		$stage_titre_separateur = explode("<[separateur]>",$_SESSION["stage_titre"]);
		$stage_societe_separateur = explode("<[separateur]>",$_SESSION["stage_societe"]);
		$stage_details_separateur = explode("<[separateur]>",$_SESSION["stage_details"]);



		/* Supprimer un champs formation */
	if(isset($_POST["supprimerformatiion"]) && !empty($_POST["supprimerformatiion"])){

		$date = str_replace("<[separateur]>".$formation_date_separateur[$_POST["supprimerformatiion"]], "", $_SESSION["formation_date"]);
		$titre = str_replace("<[separateur]>".$formation_titre_separateur[$_POST["supprimerformatiion"]], "", $_SESSION["formation_titre"]);
		$ecole = str_replace("<[separateur]>".$formation_ecole_separateur[$_POST["supprimerformatiion"]], "", $_SESSION["formation_ecole"]);
		$details = str_replace("<[separateur]>".$formation_details_separateur[$_POST["supprimerformatiion"]], "", $_SESSION["formation_details"]);

	$req = $bdd->prepare('UPDATE membres SET formation_date = :formation_date, formation_titre = :formation_titre, formation_ecole = :formation_ecole, formation_details = :formation_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("formation_date" => $date, "formation_titre" => $titre, "formation_ecole" => $ecole, "formation_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["formation_date"] = $date;
	$_SESSION["formation_titre"] = $titre;
	$_SESSION["formation_ecole"] = $ecole;
	$_SESSION["formation_details"] = $details;

	$formation_date_separateur = explode("<[separateur]>",$_SESSION["formation_date"]);
	$formation_titre_separateur = explode("<[separateur]>",$_SESSION["formation_titre"]);
	$formation_ecole_separateur = explode("<[separateur]>",$_SESSION["formation_ecole"]);
	$formation_details_separateur = explode("<[separateur]>",$_SESSION["formation_details"]);
	}

		/* Supprimer un champs experience pro */
	if(isset($_POST["supprimerexperience"]) && !empty($_POST["supprimerexperience"])){

		$date = str_replace("<[separateur]>".$experience_date_separateur[$_POST["supprimerexperience"]], "", $_SESSION["experience_date"]);

		$titre = str_replace("<[separateur]>".$experience_titre_separateur[$_POST["supprimerexperience"]], "", $_SESSION["experience_titre"]);
		$ecole = str_replace("<[separateur]>".$experience_societe_separateur[$_POST["supprimerexperience"]], "", $_SESSION["experience_societe"]);
		$details = str_replace("<[separateur]>".$experience_details_separateur[$_POST["supprimerexperience"]], "", $_SESSION["experience_details"]);

	$req = $bdd->prepare('UPDATE membres SET experience_date = :experience_date, experience_titre = :experience_titre, experience_societe = :experience_societe, experience_details = :experience_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("experience_date" => $date, "experience_titre" => $titre, "experience_societe" => $ecole, "experience_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["experience_date"] = $date;
	$_SESSION["experience_titre"] = $titre;
	$_SESSION["experience_societe"] = $ecole;
	$_SESSION["experience_details"] = $details;

	$experience_date_separateur = explode("<[separateur]>",$_SESSION["experience_date"]);
	$experience_titre_separateur = explode("<[separateur]>",$_SESSION["experience_titre"]);
	$experience_societe_separateur = explode("<[separateur]>",$_SESSION["experience_societe"]);
	$experience_details_separateur = explode("<[separateur]>",$_SESSION["experience_details"]);
	}

	/* Supprimer un champs stage et volontariat */
	if(isset($_POST["supprimerstage"]) && !empty($_POST["supprimerstage"])){

		$date = str_replace("<[separateur]>".$stage_date_separateur[$_POST["supprimerstage"]], "", $_SESSION["stage_date"]);

		$titre = str_replace("<[separateur]>".$stage_titre_separateur[$_POST["supprimerstage"]], "", $_SESSION["stage_titre"]);
		$ecole = str_replace("<[separateur]>".$stage_societe_separateur[$_POST["supprimerstage"]], "", $_SESSION["stage_societe"]);
		$details = str_replace("<[separateur]>".$stage_details_separateur[$_POST["supprimerstage"]], "", $_SESSION["stage_details"]);

	$req = $bdd->prepare('UPDATE membres SET stage_date = :stage_date, stage_titre = :stage_titre, stage_societe = :stage_societe, stage_details = :stage_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("stage_date" => $date, "stage_titre" => $titre, "stage_societe" => $ecole, "stage_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["stage_date"] = $date;
	$_SESSION["stage_titre"] = $titre;
	$_SESSION["stage_societe"] = $ecole;
	$_SESSION["stage_details"] = $details;

	$stage_date_separateur = explode("<[separateur]>",$_SESSION["stage_date"]);
	$stage_titre_separateur = explode("<[separateur]>",$_SESSION["stage_titre"]);
	$stage_societe_separateur = explode("<[separateur]>",$_SESSION["stage_societe"]);
	$stage_details_separateur = explode("<[separateur]>",$_SESSION["stage_details"]);
	}
?><div id="sous_menu_candidat_menu_droit">
			<ul>
				<a href="candidat_photo"><li>Photo</li></a>
				<a href="candidat_infos_perso"><li>Infos perso</li></a>
				<a href="candidat_infos_factu"><li>Infos facul</li></a>
				<a href="candidat_infos_pro"><li>Infos pro</li></a>
			</ul>
	</div>
<div id="contenu_candidat_menu_droit">
    
	<form method="post"  name="myform" id="myform">
		<fieldset>
			<legend><a name="niveau"></a>Niveau actuel: <span class="etoilePetite">*</span></legend>
			<table width="100%" border="0">
	<tr>
	<td>Concentration:  </td>
	<td colspan=4>
	<div class="divLogin">
		<select id="stage_sitebundle_cursuscandidatType_fonction" name="formation_concentration"   class="txtLogin" >
			<option value="1" <?php if($_SESSION["formation_concentration"] == "1"){ echo 'selected="selected"'; } ?> >Choisir une Concentration</option>
			<option value="2" <?php if($_SESSION["formation_concentration"] == "2"){ echo 'selected="selected"'; } ?>>Informatique/ Réseaux/ Télécoms</option>
			<option value="3" <?php if($_SESSION["formation_concentration"] == "3"){ echo 'selected="selected"'; } ?> >Import/ Export/ Commerce</option>
			<option value="4" <?php if($_SESSION["formation_concentration"] == "4"){ echo 'selected="selected"'; } ?> >Direction générale</option>
			<option value="5" <?php if($_SESSION["formation_concentration"] == "5"){ echo 'selected="selected"'; } ?> >Distribution/ Logistique/ Transport</option>
			<option value="6" <?php if($_SESSION["formation_concentration"] == "6"){ echo 'selected="selected"'; } ?> >Commercial/ Vente</option>
			<option value="7" <?php if($_SESSION["formation_concentration"] == "7"){ echo 'selected="selected"'; } ?> >Comptabilité/ Finance/ Audit</option>
			<option value="8" <?php if($_SESSION["formation_concentration"] == "8"){ echo 'selected="selected"'; } ?> >Administration/ Secrétariat</option>
			<option value="9" <?php if($_SESSION["formation_concentration"] == "9"){ echo 'selected="selected"'; } ?> >Internet/ E-commerce/ E-reputation</option>
			<option value="10" <?php if($_SESSION["formation_concentration"] == "10"){ echo 'selected="selected"'; } ?> >Juridique/ Droit</option>
			<option value="11" <?php if($_SESSION["formation_concentration"] == "11"){ echo 'selected="selected"'; } ?> >Marketing/ Communication/ Publicité</option>
			<option value="12" <?php if($_SESSION["formation_concentration"] == "12"){ echo 'selected="selected"'; } ?> >Organisation/ Gestion/ Stratégie</option>
			<option value="13" <?php if($_SESSION["formation_concentration"] == "13"){ echo 'selected="selected"'; } ?> >Recherche &amp; Développement</option>
			<option value="14" <?php if($_SESSION["formation_concentration"] == "14"){ echo 'selected="selected"'; } ?>>Système d&#039;information </option>
			<option value="15" <?php if($_SESSION["formation_concentration"] == "15"){ echo 'selected="selected"'; } ?>>Qualité/ Production</option>
			<option value="16" <?php if($_SESSION["formation_concentration"] == "16"){ echo 'selected="selected"'; } ?>>Ressources Humaines</option>
			<option value="17" <?php if($_SESSION["formation_concentration"] == "17"){ echo 'selected="selected"'; } ?>>Services Généraux</option>
			<option value="18" <?php if($_SESSION["formation_concentration"] == "18"){ echo 'selected="selected"'; } ?>>Tourisme/ Hôtellerie/ Restauration</option>
			<option value="19" <?php if($_SESSION["formation_concentration"] == "19"){ echo 'selected="selected"'; } ?>>Maintenance/ Réparation</option>
			<option value="20" <?php if($_SESSION["formation_concentration"] == "20"){ echo 'selected="selected"'; } ?>>Enseignement /Formation /Education</option>
			<option value="21" <?php if($_SESSION["formation_concentration"] == "21"){ echo 'selected="selected"'; } ?>>Évenementiel</option>
		</select>
			
	<tr>
	<td>Votre niveau:</td>
	<td>
	<div class="divSmall">
			
		<select id="stage_sitebundle_cursuscandidatType_niveau" name="formation_niveau" required="required"    class="txtSmall">
			<option value="0" <?php if($_SESSION["formation_niveau"] == "0"){ echo 'selected="selected"'; } ?> >Choisir Votre Niveau</option>
			<option value="1" <?php if($_SESSION["formation_niveau"] == "1"){ echo 'selected="selected"'; } ?> >BAC+1</option>
			<option value="2" <?php if($_SESSION["formation_niveau"] == "2"){ echo 'selected="selected"'; } ?> >BAC+2</option>
			<option value="3" <?php if($_SESSION["formation_niveau"] == "3"){ echo 'selected="selected"'; } ?> >BAC+3</option>
			<option value="4" <?php if($_SESSION["formation_niveau"] == "4"){ echo 'selected="selected"'; } ?> >BAC+4</option>
			<option value="5" <?php if($_SESSION["formation_niveau"] == "5"){ echo 'selected="selected"'; } ?> >BAC+5</option>
			<option value="6" <?php if($_SESSION["formation_niveau"] == "6"){ echo 'selected="selected"'; } ?> >BAC+6</option>
			
		</select>
	</div>
	</td>
	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>Sur un cursus actuel de:</td>
	<td>
	<div class="divSmall">
			
		<select id="stage_sitebundle_cursuscandidatType_cursus" name="formation_cursus" required="required"    class="txtSmall">
			<option value="0" <?php if($_SESSION["formation_cursus"] == "0"){ echo 'selected="selected"'; } ?> >Choisir Votre Cursus</option>
			<option value="2" <?php if($_SESSION["formation_cursus"] == "2"){ echo 'selected="selected"'; } ?> >2 ans</option>
			<option value="3" <?php if($_SESSION["formation_cursus"] == "3"){ echo 'selected="selected"'; } ?> >3 ans</option>
			<option value="4" <?php if($_SESSION["formation_cursus"] == "4"){ echo 'selected="selected"'; } ?> >4 ans</option>
			<option value="5" <?php if($_SESSION["formation_cursus"] == "5"){ echo 'selected="selected"'; } ?> >5 ans</option>
		</select>
	</div>
	</td>
	</tr>
			</table>
		</fieldset>

		<div class="petitbtnD">
	<input type="image" src="img/addentrise.png" border="0px"></div>
	</form>
		<span class="titre2">Formation  <span class="etoile">*</span></span>
    <div class="spacer2"></div>
    <br />
	
		
	</div>
	</td>
	</tr>
	
<?php foreach ($formation_titre_separateur as $formation_titre_separ_key => $formation_titre_separ_value) { 
	if($formation_titre_separ_value == ""){ continue; }
		$formation_date_separ_debut_fin = explode("--",$formation_date_separateur[$formation_titre_separ_key]);
 ?>
<fieldset>
	<legend>Formation n° <?php echo $formation_titre_separ_key; ?>:</legend>
		<table width="100%" border="0">
	<tbody><tr>
	<td>De :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $formation_date_separ_debut_fin[0]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Á	 :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $formation_date_separ_debut_fin[1]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Titre :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo utf8_encode($formation_titre_separ_value); ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>École :</td>
	<td>
		<div class="divLogin"><input type="text" value="<?php echo utf8_encode($formation_ecole_separateur[$formation_titre_separ_key]); ?>" readonly="readonly" class="txtLogin"></div>
	</td>
	</tr>
	<tr>
	<td>Détails :</td>
	<td>
	<input type="text" value="<?php echo utf8_encode($formation_details_separateur[$formation_titre_separ_key]); ?>" readonly="readonly" class="txtDesc">
	</td>
	</tr>
	</tbody></table>
	</fieldset>

	<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimerformatiion" value="<?php echo $formation_titre_separ_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
		</div>
	<?php } ?>


	<form method="post" >
		<fieldset>
		<legend>Nouvelle Formation<span id="newnum"></span>:</legend>
		<table width="100%" border="0">	<tr>
	<td>De :</td>
	<td>
	<div class="date_formation_debut">
		<select name="formation_nouvelle_datedebut_day">
			<option value="0">- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; }
					echo '<option value="'.$jours.'" >'.$jours.'</option>';
				$jours++; // pour incrémenter $jours
			}
			?>
		</select> 
		<select name="formation_nouvelle_datedebut_month">
			 <option value="0">- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){

					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++; // pour incrémenter $mois
			}
			?>
		</select> 
		<select name="formation_nouvelle_datedebut_year">
			<option value="0">- Année -</option>

			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--;
			}
			?>
		</select>
		
	</div>
	</td>
	</tr>
	
	<tr>
	<td>&Aacute;	 :</td>
	<td>
	<div class="date_formation_fin">
		<select name="formation_nouvelle_datefin_day">
			<option value="0">- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; }
					echo '<option value="'.$jours.'" >'.$jours.'</option>';

				$jours++;
			}
			?>
		</select> 
		<select name="formation_nouvelle_datefin_month">
			 <option value="0">- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				
					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++;
			}
			?>
		</select> 
		<select name="formation_nouvelle_datefin_year">
			<option value="0">- Année -</option>
			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--;
			}
			?>
		</select>
		
	</div>
	</td>
	</tr>
	
	<tr>
	<td>Titre :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_sitebundle_infoprotype_titre" name="formation_titre" required="required" maxlength="100"    class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>&Eacute;cole :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_sitebundle_infoprotype_libele" name="formation_ecole" required="required" maxlength="50"    class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>D&eacute;tails :</td>
	<td>
		<textarea id="stage_sitebundle_infoprotype_details" name="formation_details" required="required"    class="txtDesc"></textarea>
	</td>
	</tr>
		</table>
		</fieldset>
	<div class="petitbtnD"><input type="image" src="img/addentrise.png" border="0px" /></div>
	</form><br/><br/>
		<span class="titre2">EXP&Eacute;RIENCE PROFESSIONNELLE</span><br>
     
     <?php foreach ($experience_titre_separateur as $experience_titre_separ_key => $experience_titre_separ_value) { 
	if($experience_titre_separ_value == ""){ continue; }
		$experience_date_separ_debut_fin = explode("--",$experience_date_separateur[$experience_titre_separ_key]);
 	?>
	<fieldset>
	<legend>Formation n° <?php echo $experience_titre_separ_key; ?>:</legend>
		<table width="100%" border="0">
	<tbody><tr>
	<td>De :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $experience_date_separ_debut_fin[0]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Á	 :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $experience_date_separ_debut_fin[1]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Titre :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo utf8_encode($experience_titre_separ_value); ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Société :</td>
	<td>
		<div class="divLogin"><input type="text" value="<?php echo utf8_encode($experience_societe_separateur[$experience_titre_separ_key]); ?>" readonly="readonly" class="txtLogin"></div>
	</td>
	</tr>
	<tr>
	<td>Détails :</td>
	<td>
	<input type="text" value="<?php echo utf8_encode($experience_details_separateur[$experience_titre_separ_key]); ?>" readonly="readonly" class="txtDesc">
	</td>
	</tr>
	</tbody></table>
	</fieldset>

	<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimerexperience" value="<?php echo $experience_titre_separ_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
	</div>
	<?php } ?>

    <form method="post" >
		<fieldset>
		<legend>Nouvelle Exp&eacute;rience<span id="newnum"></span>:</legend>
		<table width="100%" border="0">	<tr>
	<td>De :</td>
	<td>
	<div class="experience_date_debut">
		<select name="experience_datedebut_day">
			<option>- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; }
					echo '<option value="'.$jours.'" >'.$jours.'</option>';

				$jours++;
			}
			?>
		</select> 
		<select name="experience_datedebut_month">
			 <option>- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				
					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++;
			}
			?>
		</select> 
		<select name="experience_datedebut_year">
			<option>- Année -</option>
			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--; 
			}
			?>
		</select>
	</div>
	</td>
	</tr>
	
	<tr>
	<td>&Aacute;	 :</td><td>
	<div class="experience_date_fin">
		<select name="experience_datefin_day">
			<option>- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; } 
					echo '<option value="'.$jours.'" >'.$jours.'</option>';

				$jours++; 
			}
			?>
		</select> 
		<select name="experience_datefin_month">
			 <option>- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				
					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++;
			}
			?>
		</select> 
		<select name="experience_datefin_year">
			<option>- Année -</option>
			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--; 
			}
			?>
		</select>
	</div>
	</td>
	</tr>
	
	<tr>
	<td>Titre :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_sitebundle_infoprotype_titre" name="experience_titre" required="required" maxlength="100"    class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>Soci&eacute;t&eacute; :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_sitebundle_infoprotype_libele" name="experience_societe" required="required" maxlength="50"   class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>D&eacute;tails :</td>
	<td>
	<textarea id="stage_sitebundle_infoprotype_details" name="experience_details" required="required"  class="txtDesc"></textarea>
	</td>
	</tr>
		</table>
		</fieldset>
	<div class="petitbtnD">
	<input type="image" src="img/addentrise.png" border="0px" /></div><br/>
	</form>

		<span class="titre2">STAGE ET VOLONTARIAT</span>
    <div class="spacer2"></div><br />


 <?php foreach ($stage_titre_separateur as $stage_titre_separateur_key => $stage_titre_separateur_value) { 
	if($stage_titre_separateur_value == ""){ continue; }
		$stage_date_separ_debut_fin = explode("--",$stage_date_separateur[$stage_titre_separateur_key]);
 	?>
	<fieldset>
	<legend>Stage ou volontariat n° <?php echo $stage_titre_separateur_key; ?>:</legend>
		<table width="100%" border="0">
	<tbody><tr>
	<td>De :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $stage_date_separ_debut_fin[0]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Á	 :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo $stage_date_separ_debut_fin[1]; ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Titre :</td><td>
		<div class="divLogin">
		<input type="text" value="<?php echo utf8_encode($stage_titre_separateur_value); ?>" readonly="readonly" class="txtLogin">
		</div>
	</td>
	</tr>
	<tr>
	<td>Société :</td>
	<td>
		<div class="divLogin"><input type="text" value="<?php echo utf8_encode($stage_societe_separateur[$stage_titre_separateur_key]); ?>" readonly="readonly" class="txtLogin"></div>
	</td>
	</tr>
	<tr>
	<td>Détails :</td>
	<td>
	<input type="text" value="<?php echo utf8_encode($stage_details_separateur[$stage_titre_separateur_key]); ?>" readonly="readonly" class="txtDesc">
	</td>
	</tr>
	</tbody></table>
	</fieldset>

	<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimerstage" value="<?php echo $stage_titre_separateur_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
	</div>
	<?php } ?>



    <form method="post" >
		<fieldset>
		<legend>Nouvelle Exp&eacute;rience<span id="newnum"></span>:</legend>
		<table width="100%" border="0">	<tr>
	<td>De :</td>
	<td>
	<div class="stage_date_debut">
		<select name="stage_datedebut_day">
			<option value="0">- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; }
					echo '<option value="'.$jours.'" >'.$jours.'</option>';

				$jours++;
			}
			?>
		</select> 
		<select name="stage_datedebut_month">
			 <option value="0">- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				
					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++;
			}
			?>
		</select> 
		<select name="stage_datedebut_year">
			<option value="0">- Année -</option>
			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--;
			}
			?>
		</select>
	</div>
	</td>
	</tr>
	
	<tr>
	<td>&Aacute;	 :</td>
	<td>
	<div class="stage_date_fin">
		<select name="stage_datefin_day">
			<option value="0">- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; } 
					echo '<option value="'.$jours.'" >'.$jours.'</option>';

				$jours++;
			}
			?>
		</select> 
		<select name="stage_datefin_month">
			 <option value="0">- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				
					echo '<option value="'.$mois.'" >'.$les_mois[$mois].'</option>';

				$mois++;
			}
			?>
		</select> 
		<select name="stage_datefin_year">
			<option value="0">- Année -</option>
			<?php 
			$annee = date("Y");
			while($annee >= 1940){

					echo '<option value="'.$annee.'" >'.$annee.'</option>';

				$annee--; 
			}
			?>
		</select>
	</div>
	</td>
	</tr>
	
	<tr>
	<td>Titre :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_titre" name="stage_titre" required="required" maxlength="100"    class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>Soci&eacute;t&eacute; :</td>
	<td>
	<div class="divLogin">
		<input type="text" id="stage_societe" name="stage_societe" required="required" maxlength="50"    class="txtLogin" value="" />
	</div>
	</td>
	</tr>
	
	<tr>
	<td>D&eacute;tails :</td>
	<td>
		<textarea id="stage_details" name="stage_details" required="required"    class="txtDesc"></textarea>
	</td>
	</tr>
		</table>
		</fieldset>
	<div class="petitbtnD">
		<input type="image" src="img/addentrise.png" border="0px" />
	</div>
	</form>
	</div>

	</div>
                <!-- fin formulaires -->

    </div>
            <!-- fin blocLeft -->	
</div>