<?php

require_once "basededonnee.php";
	$idcandidat = $_GET['cvcandidat'];
	$req = $bdd->query("SELECT * FROM membres WHERE id= $idcandidat");

while ($donne = $req->fetch()) {

	$nom = $donne["nom"];
	$prenom = $donne["prenom"];
	$ville = $donne["ville"];
	$donne["date_naissance"] = explode("-",$donne["date_naissance"]);
	$competence_titre_separateur = explode("<[separateur]>",utf8_encode($donne["competence_titre"]));
	$competence_details_separateur = explode("<[separateur]>",utf8_encode($donne["competence_details"]));
	$vie_associative_titre_separateur = explode("<[separateur]>",utf8_encode($donne["vie_associative_titre"]));
	$vie_associative_details_separateur = explode("<[separateur]>",utf8_encode($donne["vie_associative_details"]));
	$centre_interet_titre_separateur = explode("<[separateur]>",utf8_encode($donne["centre_interet_titre"]));
	$centre_interet_details_separateur = explode("<[separateur]>",utf8_encode($donne["centre_interet_details"]));
	$formation_date_separateur = explode("<[separateur]>",utf8_encode($donne["formation_date"]));
	$formation_titre_separateur = explode("<[separateur]>",utf8_encode($donne["formation_titre"]));
	$formation_ecole_separateur = explode("<[separateur]>",utf8_encode($donne["formation_ecole"]));
	$formation_details_separateur = explode("<[separateur]>",utf8_encode($donne["formation_details"]));
	$experience_date_separateur = explode("<[separateur]>",utf8_encode($donne["experience_date"]));
	$experience_titre_separateur = explode("<[separateur]>",utf8_encode($donne["experience_titre"]));
	$experience_societe_separateur = explode("<[separateur]>",utf8_encode($donne["experience_societe"]));
	$experience_details_separateur = explode("<[separateur]>",utf8_encode($donne["experience_details"]));
	$stage_date_separateur = explode("<[separateur]>",utf8_encode($donne["stage_date"]));
	$stage_titre_separateur = explode("<[separateur]>",utf8_encode($donne["stage_titre"]));
	$stage_societe_separateur = explode("<[separateur]>",utf8_encode($donne["stage_societe"]));
	$stage_details_separateur = explode("<[separateur]>",utf8_encode($donne["stage_details"]));

	$email_utilisateur = strstr($donne["email"], '@', true);


	$titrelangue1 = ($donne["langue_titre1"] != NULL)? "Anglais" : "";
	$titrelangue2 = ($donne["langue_titre2"] != NULL)? "Français" : "";
	$titrelangue3 = ($donne["langue_titre3"] != NULL)? "Arabe" : "";
	$donne["langue_titre"] = array($titrelangue1,$titrelangue2,$titrelangue3);
	$donne["langue_details"] = array($donne["langue_details1"],$donne["langue_details2"],$donne["langue_details3"]);

		switch($donne["formation_concentration"]){
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

if(isset($_POST['message']) && isset($_POST['sujet'])){
	$message = $bdd->prepare("INSERT INTO message_candidat (id_candidat,emeteur,id_emeteur,sujet,message) VALUES (:id_candidat,:emeteur,:id_emeteur,:sujet,:message)");
	$message->execute(array("id_candidat" => $idcandidat, "emeteur" => $_SESSION["entreprise_raison_social"], "id_emeteur" => $_SESSION["entreprise_id"], "sujet" => $_POST['sujet'], "message" => $_POST['message']));
	echo '<script type="text/javascript">alert("Message bien envoyé !");</script>';
}


if(isset($_SESSION["entreprise_email"])){
?>
<form method="post" >
	
	<br>
	<input type="text" style="display:none" class="afficher<?php echo $idcandidat; ?>" placeholder="Sujet" name="sujet">
		<br>
	<textarea style="height:150px;width:500px;display:none;" class="afficher<?php echo $idcandidat; ?>"  placeholder="Votre message" name="message"></textarea>
	<input type="hidden" value="<?php echo $_SESSION["entreprise_id"]; ?>" name="id_emeteur">
	<input type="submit" class="afficher<?php echo $idcandidat; ?>" style="display:none;" value="Envoyer">
	<br>
	<input type="button" class="hidden_contacter_candidat" value="Contacter ce candidat" style="height:35px;width:250px;background:#eee;border:2px solid #000;color:#000;line-height:35px;text-align:center;cursor:pointer;font-size:16px;" title="<?php echo $idcandidat; ?>">
</form>
<?php }else{ echo '<p style="color:red">Vous devez être connecté en tant que recruteur pour contacter ce candidat</p>'; } ?>
<div id="visionnercv">

	<img src="img_candidats/<?php echo $email_utilisateur; ?>.png" style="float:right;margin-top: 5px;" width="170" height="190" border="2">
<br>
	<span style="font-size: 24px; "><?php echo strtoupper($nom); //ucfirst : met la première lettre en majescule 
			echo " ".ucfirst($prenom); //strtoupper : met toutes les lettres en maj
			if (empty($formation_concentration) || !isset($formation_concentration)){
				$formation_concentration = "Non définie";
			}
	?></span> -  <span style="font-size: 18px;color:#7EA5EE;">FORMATION : <?php echo $formation_concentration." | BAC+".$donne['formation_niveau']; ?></span><br><br>
	<span style="color:#E57400;">Né le :</span><?php echo $donne["date_naissance"][2]."/".$donne["date_naissance"][1]."/".$donne["date_naissance"][0]; ?><br>
	<span style="color:#E57400;">Adresse :</span><?php echo $donne["adresse"]; ?><br>
	<span style="color:#E57400;">Ville :</span><?php echo $donne["ville"]; ?><br>
	<span style="color:#E57400;">Téléphone :</span><?php echo $donne["telephone"]; ?><br>
	<span style="color:#E57400;">Statut :</span><?php if($donne["statut"] == "celib"){ echo "Célibataire"; }elseif($donne["statut"] == "marie") { echo "Marié"; }else{ echo "Non définie"; } ?><br>
	<span style="color:#E57400;">E-mail :</span><?php echo $donne["email"]; ?><br>
	
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
		<?php foreach ($donne["langue_titre"] as $key => $value) {
			if(empty($value)){ continue; }
		?>
			<li><?php echo "<b>".$value."</b> : ".$donne["langue_details"][$key]; ?></li>

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

<div style="text-align: center;"><a href="entreprise_cvtheque">Retour</a></div>

<?php }

$req->closeCursor();

?>