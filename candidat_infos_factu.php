<?php
	
	$competence_titre = isset($_POST['competence_titre'] ) ? utf8_decode(filter_input(INPUT_POST,'competence_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$competence_details = isset($_POST['competence_details'] ) ? utf8_decode(filter_input(INPUT_POST,'competence_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$langue_titre = isset($_POST['langue_titre']) ? filter_input(INPUT_POST,'langue_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false ;
	$langue_details = isset($_POST['langue_details']) ? filter_input(INPUT_POST,'langue_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$vie_associative_titre = isset($_POST['vie_associative_titre']) ? utf8_decode(filter_input(INPUT_POST,'vie_associative_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$vie_associative_details = isset($_POST['vie_associative_details']) ? utf8_decode(filter_input(INPUT_POST,'vie_associative_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$centre_interet_titre = isset($_POST['centre_interet_titre']) ? utf8_decode(filter_input(INPUT_POST,'centre_interet_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$centre_interet_details = isset($_POST['centre_interet_details']) ? utf8_decode(filter_input(INPUT_POST,'centre_interet_details',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	
	if(!empty($competence_titre) && !empty($competence_details)){

	$req = $bdd->prepare('UPDATE membres SET competence_titre = :competence_titre, competence_details = :competence_details WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array("competence_titre" => $_SESSION["competence_titre"]."<[separateur]>".$competence_titre, "competence_details" => $_SESSION["competence_details"]."<[separateur]>".$competence_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
	
	$_SESSION["competence_titre"] = $_SESSION["competence_titre"]."<[separateur]>".$competence_titre;
	$_SESSION["competence_details"] = $_SESSION["competence_details"]."<[separateur]>".$competence_details;
	echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
	}

	
	/* SEPARATEURS */
	$competence_titre_separateur = explode("<[separateur]>",$_SESSION["competence_titre"]); //on met séparateur qu'on a  + la variable qui contient les infos
	$competence_details_separateur = explode("<[separateur]>",$_SESSION["competence_details"]);

	if(!empty($langue_titre) && !empty($langue_details)){
		if($langue_titre == "anglais"){
			$req = $bdd->prepare('UPDATE membres SET langue_titre1 = :langue_titre, langue_details1 = :langue_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("langue_titre" => $langue_titre, "langue_details" => $langue_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
			
				$_SESSION["langue_titre"][0] = $langue_titre;
				$_SESSION["langue_details"][0] = $langue_details;
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}elseif($langue_titre == "francais"){
			$req = $bdd->prepare('UPDATE membres SET langue_titre2 = :langue_titre, langue_details2 = :langue_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("langue_titre" => $langue_titre, "langue_details" => $langue_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
			
				$_SESSION["langue_titre"][1] = $langue_titre;
				$_SESSION["langue_details"][1] = $langue_details;
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}else{
			$req = $bdd->prepare('UPDATE membres SET langue_titre3 = :langue_titre, langue_details3 = :langue_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("langue_titre" => $langue_titre, "langue_details" => $langue_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
			
				$_SESSION["langue_titre"][2] = $langue_titre;
				$_SESSION["langue_details"][2] = $langue_details;
			
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
	}
	
		if(!empty($vie_associative_titre) && !empty($vie_associative_details)){
			$req = $bdd->prepare('UPDATE membres SET vie_associative_titre = :vie_associative_titre, vie_associative_details = :vie_associative_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("vie_associative_titre" => $_SESSION["vie_associative_titre"]."<[separateur]>".$vie_associative_titre, "vie_associative_details" => $_SESSION["vie_associative_details"]."<[separateur]>".$vie_associative_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
			$_SESSION["vie_associative_titre"] = $_SESSION["vie_associative_titre"]."<[separateur]>".$vie_associative_titre; 
			$_SESSION["vie_associative_details"] = $_SESSION["vie_associative_details"]."<[separateur]>".$vie_associative_details;
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
	$vie_associative_titre_separateur = explode("<[separateur]>",$_SESSION["vie_associative_titre"]);
	$vie_associative_details_separateur = explode("<[separateur]>",$_SESSION["vie_associative_details"]);

	if(!empty($centre_interet_titre) && !empty($centre_interet_details)){
			$req = $bdd->prepare('UPDATE membres SET centre_interet_titre = :centre_interet_titre, centre_interet_details = :centre_interet_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("centre_interet_titre" => $_SESSION["centre_interet_titre"]."<[separateur]>".$centre_interet_titre, "centre_interet_details" => $_SESSION["centre_interet_details"]."<[separateur]>".$centre_interet_details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
			$_SESSION["centre_interet_titre"] = $_SESSION["centre_interet_titre"]."<[separateur]>".$centre_interet_titre; 
			$_SESSION["centre_interet_details"] = $_SESSION["centre_interet_details"]."<[separateur]>".$centre_interet_details;
			echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
		}
	$centre_interet_titre_separateur = explode("<[separateur]>",$_SESSION["centre_interet_titre"]);
	$centre_interet_details_separateur = explode("<[separateur]>",$_SESSION["centre_interet_details"]);

	/* SUPPRIMER DES CHAMPS */

	/* Supprimer une coméptence */
	if(isset($_POST["supprimercompetence"]) && !empty($_POST["supprimercompetence"])){
		$titre = str_replace("<[separateur]>".$competence_titre_separateur[$_POST["supprimercompetence"]], "", $_SESSION["competence_titre"]);
		$details = str_replace("<[separateur]>".$competence_details_separateur[$_POST["supprimercompetence"]], "", $_SESSION["competence_details"]);

	$req = $bdd->prepare('UPDATE membres SET competence_titre = :competence_titre, competence_details = :competence_details WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array("competence_titre" => $titre, "competence_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["competence_details"] = $details;
	$_SESSION["competence_titre"] = $titre;

	$competence_titre_separateur = explode("<[separateur]>",$_SESSION["competence_titre"]);
	$competence_details_separateur = explode("<[separateur]>",$_SESSION["competence_details"]);
	}

	/* Supprimer un champs vie asociative */

	if(isset($_POST["supprimervieassociative"]) && !empty($_POST["supprimervieassociative"])){
		$titre = str_replace("<[separateur]>".$vie_associative_titre_separateur[$_POST["supprimervieassociative"]], "", $_SESSION["vie_associative_titre"]);
		$details = str_replace("<[separateur]>".$vie_associative_details_separateur[$_POST["supprimervieassociative"]], "", $_SESSION["vie_associative_details"]);

	$req = $bdd->prepare('UPDATE membres SET vie_associative_titre = :vie_associative_titre, vie_associative_details = :vie_associative_details WHERE nom = :nom AND prenom = :prenom');
			$req->execute(array("vie_associative_titre" => $titre, "vie_associative_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["vie_associative_details"] = $details;
	$_SESSION["vie_associative_titre"] = $titre;

	$vie_associative_titre_separateur = explode("<[separateur]>",$_SESSION["vie_associative_titre"]);
	$vie_associative_details_separateur = explode("<[separateur]>",$_SESSION["vie_associative_details"]);
	}

	/* Supprimer un champs Langue */
	if(isset($_POST["supprimerlangue"]) && !empty($_POST["supprimerlangue"])){
		if ($_POST["supprimerlangue"] == 1) {
			$req = $bdd->prepare("UPDATE membres SET langue_titre1 = '', langue_details1 = '' WHERE nom = :nom AND prenom = :prenom");
			$req->execute(array("nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
		}elseif ($_POST["supprimerlangue"] == 2) {
			$req = $bdd->prepare("UPDATE membres SET langue_titre2 = '', langue_details2 = '' WHERE nom = :nom AND prenom = :prenom");
			$req->execute(array("nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
		}elseif ($_POST["supprimerlangue"] == 3) {
			$req = $bdd->prepare("UPDATE membres SET langue_titre3 = '', langue_details3 = '' WHERE nom = :nom AND prenom = :prenom");
			$req->execute(array("nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
		}
		

		$_SESSION["langue_titre"][$_POST["supprimerlangue"]-1] = "";
		$_SESSION["langue_details"][$_POST["supprimerlangue"]-1] = "";
	}


	/* Supprimer un champs centre d'intérêt */

	if(isset($_POST["supprimercentreinteret"]) && !empty($_POST["supprimercentreinteret"])){
		$titre = str_replace("<[separateur]>".$centre_interet_titre_separateur[$_POST["supprimercentreinteret"]], "", $_SESSION["centre_interet_titre"]);
		$details = str_replace("<[separateur]>".$centre_interet_details_separateur[$_POST["supprimercentreinteret"]], "", $_SESSION["centre_interet_details"]);

	$req = $bdd->prepare('UPDATE membres SET centre_interet_titre = :centre_interet_titre, centre_interet_details = :centre_interet_details WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array("centre_interet_titre" => $titre, "centre_interet_details" => $details,"nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));

	$_SESSION["centre_interet_details"] = $details;
	$_SESSION["centre_interet_titre"] = $titre;

	$centre_interet_titre_separateur = explode("<[separateur]>",$_SESSION["centre_interet_titre"]);
	$centre_interet_details_separateur = explode("<[separateur]>",$_SESSION["centre_interet_details"]);
	}
?>
		<div id="sous_menu_candidat_menu_droit">
			<ul>
				<a href="candidat_photo"><li>Photo</li></a>
				<a href="candidat_infos_perso"><li>Infos perso</li></a>
				<a href="candidat_infos_factu"><li>Infos facul</li></a>
				<a href="candidat_infos_pro"><li>Infos pro</li></a>
			</ul>
		</div>
		<div id="contenu_candidat_menu_droit">


<div id="candidat_infos_pro">
	<div>
        <span class="titre">COMP&Eacute;TENCES  
			<span class="etoile">*</span>
		</span>
		<div class="spacer"></div>
		<span id="formnew">
		
		<?php		
			$numero_competence = 1;
			foreach($competence_titre_separateur as $titre_competence_separe_key => $titre_competence_separe){
			if($titre_competence_separe == ""){ continue; }
		?>
		<fieldset>
			<legend> Comp&eacute;tence <?php echo $numero_competence; ?><span id="newnum"></span>:</legend>

		<table width="100%" border="0">
			<tr>
				<td>Titre :</td>
				<td>
				
					<div class="divLogin">
						<input value="<?php if(!empty($_SESSION["competence_titre"])){ echo utf8_encode($titre_competence_separe); } ?>" type="text" id="stage_sitebundle_infotype_titre" name="competence_titre" required="required" maxlength="255" class="txtLogin" readonly>
					</div>
				
				</td>
			</tr>
			
			<tr>
				<td>D&eacute;tails :</td>
				<td>
					<textarea id="stage_sitebundle_infotype_details" name="competence_details" required="required" class="txtDesc" readonly><?php if(!empty($_SESSION["competence_details"])){ echo utf8_encode($competence_details_separateur[$titre_competence_separe_key]); } ?></textarea>
				</td>
			</tr>
		</table>
		</fieldset>
		<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimercompetence" value="<?php echo $titre_competence_separe_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
		</div>
		<?php $numero_competence++; } ?>
		
		<form method="post" >
		
		<fieldset>
			<legend>Nouvelle  Comp&eacute;tence <span id="newnum"></span>:</legend>

		<table width="100%" border="0">
			<tr>
				<td>Titre :</td>
				<td>
					<div class="divLogin">
						<input type="text" id="stage_sitebundle_infotype_titre" name="competence_titre" required="required" maxlength="255" class="txtLogin" />
					</div>
				</td>
			</tr>
			
			<tr>
				<td>D&eacute;tails :</td>
				<td>
					<textarea id="stage_sitebundle_infotype_details" name="competence_details" required="required" class="txtDesc"></textarea>
				</td>
			</tr>
		</table>
		</fieldset>
		
		<div class="petitbtnD">
			<input type="image" src="img/addentrise.png" border="0px" />
		</div>
		
		</form>
		
		</span>	
		<span class="titre">LANGUES <span class="etoile">*</span></span>

		<?php 
		$numero = 1;
		foreach($_SESSION["langue_titre"] as $num_langue => $langue){ 
				if(empty($langue)){ continue; }
		?>
		<form method="post" >

		<fieldset>
			<legend>Langue <?php echo $numero; ?><span id="newnum"></span>:</legend>

		<table width="100%" border="0">
		<tr>
			<td>Langue :</td>
			<td>
				<div class="divLogin">
					<input type="texte" value="<?php echo $langue; ?>" class="txtLogin" readonly>
				</div>
			</td>
		</tr>
		<tr>
			<td>Niveau :</td>
			<td>
			<div class="divLogin">
				<input type="text" value="<?php echo $_SESSION["langue_details"][$num_langue]; ?>" class="txtLogin" readonly>
			</div>
			</td>
		</tr>
		</table>
		</fieldset>
			<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimerlangue" value="<?php echo $num_langue+1 ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
		</div>
		</form>
		<?php $numero++; } ?>
		
		<form method="post" >

		<fieldset>
			<legend>Nouvelle Langue <span id="newnum"></span>:</legend>

		<table width="100%" border="0">
		<tr>
			<td>Langue :</td>
			<td>
				<div class="divLogin">

					<select id="stage_sitebundle_infotype_titre" name="langue_titre" required="required" class="txtLogin">

					<option value="anglais">Anglais</option>
					<option value="francais">Français</option>
					<option value="arabe">Arabe</option></select>
				</div>
				
			</td>
		</tr>
		<tr>
			<td>Niveau :</td>
			<td>
			<div class="divLogin">

				<select id="stage_sitebundle_infotype_details" name="langue_details" required="required" class="txtLogin">

				<option value="Passable">Passable</option><option value="Bon">Bon</option>

				<option value="Excellent ">Excellent</option></select>

			</div>
			</td>
		</tr>
		</table>
		</fieldset>
			<div class="petitbtnD">
				<input type="image" src="img/addentrise.png" border="0px" />
			</div>
		</form>
        <span class="titre">VIE ASSOCIATIVE</span>
            <div class="spacer"></div>
        <?php
        	$numero_vie_assoc = 1;
			foreach($vie_associative_titre_separateur as $vie_associative_titre_key => $vie_associative_separ){
			if($vie_associative_separ == ""){ continue; }
		?>
		<fieldset>
			<legend> Vie associative <?php echo $numero_vie_assoc; ?><span id="newnum"></span>:</legend>

		<table width="100%" border="0">
			<tr>
				<td>Titre :</td>
				<td>
				
					<div class="divLogin">
						<input value="<?php if(!empty($_SESSION["vie_associative_titre"])){ echo utf8_encode($vie_associative_separ); } ?>" type="text" id="stage_sitebundle_infotype_titre" name="vie_associative_titre" required="required" maxlength="255" class="txtLogin" readonly>
					</div>
				
				</td>
			</tr>
			
			<tr>
				<td>D&eacute;tails :</td>
				<td>
					<textarea id="stage_sitebundle_infotype_details" name="competence_details" required="required" class="txtDesc" readonly><?php if(!empty($_SESSION["vie_associative_details"])){ echo utf8_encode($vie_associative_details_separateur[$vie_associative_titre_key]); } ?></textarea>
				</td>
			</tr>
		</table>
		</fieldset>

		<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimervieassociative" value="<?php echo $vie_associative_titre_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
		</div>
		<?php $numero_vie_assoc++; } ?>

		
		<form method="post" >

		<fieldset>
		<legend>Nouvelle Exp&eacute;rience <span id="newnum"></span>:</legend>

		<table width="100%" border="0">
		<tr>
			<td>Titre :</td>
			<td>
				<div class="divLogin">
					<input type="text" id="stage_sitebundle_infotype_titre" name="vie_associative_titre" required="required" maxlength="255" class="txtLogin" value="" />
				</div>
			</td>
		</tr>
		<tr>
			<td>D&eacute;tails :</td>
			<td>
				<textarea id="stage_sitebundle_infotype_details" name="vie_associative_details" required="required" class="txtDesc"></textarea>
			</td>
		</tr>
		</table>
		</fieldset>
			<div class="petitbtnD">
				<input type="image" src="img/addentrise.png" border="0px" />
			</div>
				
			</form>
		<span class="titre">CENTRES INT&Eacute;R&Ecirc;T  <span class="etoile">*</span></span>
                <div class="spacer"></div>
		 <?php
        	$numero_centre_interet = 1;
			foreach($centre_interet_titre_separateur as $centre_interet_titre_key => $centre_interet_titre_separ){
			if($centre_interet_titre_separ == ""){ continue; }
		?>
		<fieldset>
			<legend> Centre d'intrêt <?php echo $numero_centre_interet; ?><span id="newnum"></span>:</legend>

		<table width="100%" border="0">
			<tr>
				<td>Titre :</td>
				<td>
				
					<div class="divLogin">
						<input value="<?php if(!empty($_SESSION["centre_interet_titre"])){ echo utf8_encode($centre_interet_titre_separ); } ?>" type="text" id="stage_sitebundle_infotype_titre" name="centre_interet_titre" required="required" maxlength="255" class="txtLogin" readonly>
					</div>
				
				</td>
			</tr>
			
			<tr>
				<td>D&eacute;tails :</td>
				<td>
					<textarea id="stage_sitebundle_infotype_details" name="competence_details" required="required" class="txtDesc" readonly><?php if(!empty($_SESSION["centre_interet_details"])){ echo utf8_encode($centre_interet_details_separateur[$centre_interet_titre_key]); } ?></textarea>
				</td>
			</tr>
		</table>
		</fieldset>

		<div class="petitbtnG">
			<form method="post">
				<input type="hidden" name="supprimercentreinteret" value="<?php echo $centre_interet_titre_key ?>">
				<input type="image" src="img/suprubrique.png" border="0px" />
			</form>
		</div>
		<?php $numero_centre_interet++; } ?>

		
		<form method="post" >
		<fieldset>
		<legend>Nouveau Hobby <span id="newnum"></span>:</legend>

		<table width="100%" border="0">
		<tr>
			<td>Titre :</td>
			<td>
				<div class="divLogin">
					<input type="text" id="stage_sitebundle_infotype_titre" name="centre_interet_titre" required="required" maxlength="255"    class="txtLogin" value="" />
				</div>
			</td>
		</tr>
		<tr>
			<td>D&eacute;tails :</td>
			<td>
				<textarea id="stage_sitebundle_infotype_details" name="centre_interet_details" required="required"    class="txtDesc"></textarea>
			</td>
		</tr>
		</table>
		</fieldset>
			<div class="petitbtnD"><input type="image" src="img/addentrise.png" border="0px" />
			</div>
		</form>
             </div>		

</div>