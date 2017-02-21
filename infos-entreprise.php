<?php

$identreprise = $_GET['identreprise'];
include_once "basededonnee.php";

if(isset($_POST['id_distinataire']) && isset($_POST['message'])){
	$req = $bdd->prepare("INSERT INTO message_entreprise (id_entreprise,emeteur,id_emeteur,titre_offre,message) VALUES (:id_entreprise,:emeteur,:id_emeteur,:titre_offre,:message)");
	$req->execute(array("id_entreprise" => $identreprise, "emeteur" => $_SESSION["nom"]." ".$_SESSION["prenom"],"id_emeteur" => $_SESSION["id"], "titre_offre" => $_POST['titre_offre'], "message" => $_POST['message']));
}


	
	$req = $bdd->query("SELECT * FROM entreprise WHERE id = $identreprise"); 
	while($donnees = $req->fetch()){
		/*
			$donne["entreprise_id"] = $donnees["id"]; 
			$donne["entreprise_raison_social"] = $donnees["entreprise_raison_social"]; 
			$donne["entreprise_secteur"] = $donnees["entreprise_secteur"]; 
			$donne["entreprise_ville"] = $donnees["entreprise_ville"]; 
			$donne["entreprise_tel"] = $donnees["entreprise_tel"]; 
			$donne["entreprise_fax"] = $donnees["entreprise_fax"]; 
			$donne["entreprise_email"] = $donnees["entreprise_email"]; 
			$donne["description_entreprise"] = $donnees["description_entreprise"]; 
			$donne["offre_stage1"] = $donnees["offre_stage1"]; 
			$donne["offre_stage2"] = $donnees["offre_stage2"]; 
			$donne["offre_stage3"] = $donnees["offre_stage3"]; 
			$donne["entreprise_password"] = $donnees["entreprise_password"]; */
?>
<h2><?php echo $donnees["entreprise_raison_social"]; ?></h2>
<div id="infosentreprise">
	<span class="titre">Secteur : </span> <span><?php echo $donnees["entreprise_secteur"]; ?></span>
	<span class="titre">Ville : </span> <span><?php echo $donnees["entreprise_ville"]; ?></span>
	<span class="titre">Téléphone : </span> <span><?php echo $donnees["entreprise_tel"]; ?></span>
	<span class="titre">Fax : </span> <span><?php echo $donnees["entreprise_fax"]; ?></span>
	<span class="titre">E-mail : </span> <span><?php echo $donnees["entreprise_email"]; ?></span>
	<span class="titre">Description de l'entreprise : </span> <span><?php echo $donnees["description_entreprise"]; ?></span>
<br><br>

<span class="titre2">Les offres actuelles de l'entreprise : </span>

<?php 

	$raisonsocial = $donnees["entreprise_raison_social"];
	$offres = $bdd->prepare("SELECT * FROM offre_stage1 WHERE entreprise_raison_social = ?");
	$offres->execute(array($raisonsocial));
	$num = 1;
	while($offre = $offres->fetch()){

	 ?>
<br><br>
<span class="titre">Offre <?php echo $num; ?></span>

<?php
switch($offre['offre_fonction']){
			case 1: $offre['offre_fonction'] =  "Non définie"; break;
			case 2: $offre['offre_fonction'] =  "Informatique/ Réseaux/ Télécoms"; break;
			case 3: $offre['offre_fonction'] =  "Import/ Export/ Commerce"; break;
			case 4: $offre['offre_fonction'] =  "Direction générale"; break;
			case 5: $offre['offre_fonction'] =  "Distribution/ Logistique/ Transport"; break;
			case 6: $offre['offre_fonction'] =  "Commercial/ Vente"; break;
			case 7: $offre['offre_fonction'] =  "Comptabilité/ Finance/ Audit"; break;
			case 8: $offre['offre_fonction'] =  "Administration/ Secrétariat"; break;
			case 9: $offre['offre_fonction'] =  "Internet/ E-commerce/ E-reputation"; break;
			case 10: $offre['offre_fonction'] =  "Juridique/ Droit"; break;
			case 11: $offre['offre_fonction'] =  "Marketing/ Communication/ Publicité"; break;
			case 12: $offre['offre_fonction'] =  "Organisation/ Gestion/ Stratégie"; break;
			case 13: $offre['offre_fonction'] =  "Recherche &amp; Développement"; break;
			case 14: $offre['offre_fonction'] =  "Système d&#039;information"; break;
			case 15: $offre['offre_fonction'] =  "Qualité/ Production"; break;
			case 16: $offre['offre_fonction'] =  "Ressources Humaines"; break;
			case 17: $offre['offre_fonction'] =  "Services Généraux"; break;
			case 18: $offre['offre_fonction'] =  "Tourisme/ Hôtellerie/ Restauration"; break;
			case 19: $offre['offre_fonction'] =  "Maintenance/ Réparation"; break;
			case 20: $offre['offre_fonction'] =  "Enseignement /Formation /Education"; break;
			case 21: $offre['offre_fonction'] =  "Évenementiel"; break;
			default: "Non définie"; break;
		}
?>
<div><span style="font-size: 20px;">Titre : </span><?php echo $offre['offre_titre']; ?></div>
<div><span style="font-size: 20px;">Fonction : </span><?php echo $offre['offre_fonction']; ?></div>
<div><span style="font-size: 20px;">Period : </span><?php echo $offre['offre_periode']; ?> mois</div>
<div><span style="font-size: 20px;">Début le : </span><?php echo $offre['offre_debut']; ?></div>
<div><span style="font-size: 20px;">Ville : </span><?php echo utf8_encode($offre['offre_lieu']); ?></div>

<?php if(isset($_SESSION['email'])){ ?>
	<form method="post">
		<textarea style="height:150px;width:500px;display:none;" class="afficher<?php echo $offre['id']; ?>"  placeholder="Votre message" name="message"></textarea>
		<input type="hidden" value="<?php echo $offre['id']; ?>" name="id_distinataire">
		<input type="hidden" value="<?php echo $offre['offre_titre']; ?>" name="titre_offre">
		<br>
		<input type="submit" class="afficher<?php echo $offre['id']; ?>" style="display:none;" value="Soumettre votre candidature pour cette offre">
		<br>
		<input type="button" class="hiddenbutton" value="Soumettre votre candidature pour cette offre" title="<?php echo $offre['id']; ?>">
	</form>
<?php }else{ echo '<span style="color:red">Vous devez être connecté en tant que candidat pour pouvoir postuler</span>'; } ?>
	<?php  $num++;  }?>


</div>



<?php
		}
	$req->closeCursor();
?>

<center><a href="accueil">Retour</a></center>