<?php
session_start(); //on initialise la session
//On récupère les variables

if($_POST["typemembre"] == "candidat"){
	$le_email = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
	$le_motdepass = sha1($_POST['password']); //On récupère le mot de passe crypté

	//On se connecte à la base de donnée 
	include_once "basededonnee.php";
	/* on est connecté à base et on est entrain de récupérer les infos */
	$req = $bdd->prepare('SELECT * FROM membres WHERE email = ? AND password = ?'); //On récupère les données depuis la BDD
	$req->execute(array($le_email, $le_motdepass));
	$donnees = $req->fetch();
		if(!$donnees){ /* le cas d'un problème */
			echo '<script type="text/javascript">alert("Une erreur s\'est produite");</script>';
			echo '<script type="text/javascript">window.location.href="candidat";</script>';
		}else{
			$_SESSION["id"] = $donnees["id"];
			$_SESSION["nom"] = $donnees["nom"]; //on stock son nom comme identifiant dans la session 
			$_SESSION["prenom"] = $donnees["prenom"]; //on stock son prenom comme identifiant dans la session 
			$_SESSION["rang"] = $donnees["rang"]; //on stock si c'est un admin ou pas
			$_SESSION["password"] = $donnees["password"];
			$_SESSION["email"] = $donnees["email"]; //on stock son email comme identifiant dans la session 
			$_SESSION["date_naissance"] = explode("-",$donnees["date_naissance"]); //on stock son date de naissance comme identifiant dans la session 
			$_SESSION["statut"] = $donnees["statut"]; //on stock son statut comme identifiant dans la session CELIB ou MARIE
			$_SESSION["titre"] = $donnees["titre"]; //on stock son titre comme identifiant dans la session M ou MLLE ou MME
			$_SESSION["adresse"] = $donnees["adresse"]; //on stock son adresse comme identifiant dans la session 
			$_SESSION["ville"] = $donnees["ville"]; //on stock son ville comme identifiant dans la session 
			$_SESSION["telephone"] = $donnees["telephone"]; //on stock son telephone comme identifiant dans la session 
			$_SESSION["permis"] = $donnees["permis"]; //on stock son permis comme identifiant dans la session
			$_SESSION["competence_titre"] = $donnees["competence_titre"];
			$_SESSION["competence_details"] = $donnees["competence_details"];
			
			$titrelangue1 = ($donnees["langue_titre1"] != NULL)? "Anglais" : "";
			$titrelangue2 = ($donnees["langue_titre2"] != NULL)? "Français" : "";
			$titrelangue3 = ($donnees["langue_titre3"] != NULL)? "Arabe" : "";
			$_SESSION["langue_titre"] = array($titrelangue1,$titrelangue2,$titrelangue3);
			$_SESSION["langue_details"] = array($donnees["langue_details1"],$donnees["langue_details2"],$donnees["langue_details3"]);
			$_SESSION["vie_associative_titre"] = $donnees["vie_associative_titre"];
			$_SESSION["vie_associative_details"] = $donnees["vie_associative_details"];
			$_SESSION["centre_interet_titre"] = $donnees["centre_interet_titre"];
			$_SESSION["centre_interet_details"] = $donnees["centre_interet_details"];
			$_SESSION['formation_concentration'] = $donnees["formation_concentration"];
			$_SESSION['formation_niveau'] = $donnees["formation_niveau"];
			$_SESSION['formation_cursus'] = $donnees["formation_cursus"];
			$_SESSION['formation_date'] = $donnees["formation_date"];
			$_SESSION['formation_titre'] = $donnees["formation_titre"];
			$_SESSION['formation_ecole'] = $donnees["formation_ecole"];
			$_SESSION['formation_details'] = $donnees["formation_details"];
			$_SESSION['experience_date'] = $donnees["experience_date"];
			$_SESSION['experience_titre'] = $donnees["experience_titre"];
			$_SESSION['experience_societe'] = $donnees["experience_societe"];
			$_SESSION['experience_details'] = $donnees["experience_details"];
			$_SESSION['stage_date'] = $donnees["stage_date"];
			$_SESSION['stage_titre'] = $donnees["stage_titre"];
			$_SESSION['stage_details'] = $donnees["stage_details"];
			$_SESSION['stage_societe'] = $donnees["stage_societe"];
			$_SESSION['lettre1'] = $donnees["lettre1"];
			$_SESSION['lettre2'] = $donnees["lettre2"];
			Header("Location: candidat"); //si le pass et email sont juste on redirige vers can didat
		}

	$req->closeCursor();
}elseif($_POST["typemembre"] == "entreprise"){

	$le_email = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
	$le_motdepass = sha1($_POST['password']); //On récupère le mot de passe crypté

	
	include_once "basededonnee.php";
	
	$req = $bdd->prepare('SELECT * FROM entreprise WHERE entreprise_email = ? AND entreprise_password = ?');
	$req->execute(array($le_email, $le_motdepass));
	$donnees = $req->fetch();
		if(!$donnees){ 
			echo '<script type="text/javascript">alert("Une erreur s\'est produite, verifié votre email ou mot de passe !");</script>';
			echo '<script type="text/javascript">window.location.href="entreprise";</script>';
		}else{

			$_SESSION["entreprise_id"] = $donnees["id"]; 
			$_SESSION["entreprise_raison_social"] = $donnees["entreprise_raison_social"]; 
			$_SESSION["entreprise_secteur"] = $donnees["entreprise_secteur"]; 
			$_SESSION["entreprise_ville"] = $donnees["entreprise_ville"]; 
			$_SESSION["entreprise_tel"] = $donnees["entreprise_tel"]; 
			$_SESSION["entreprise_fax"] = $donnees["entreprise_fax"]; 
			$_SESSION["entreprise_email"] = $donnees["entreprise_email"]; 
			$_SESSION["description_entreprise"] = $donnees["description_entreprise"]; 
			$_SESSION["offre_stage1"] = $donnees["offre_stage1"]; 
			$_SESSION["offre_stage2"] = $donnees["offre_stage2"]; 
			$_SESSION["offre_stage3"] = $donnees["offre_stage3"]; 
			$_SESSION["entreprise_password"] = $donnees["entreprise_password"]; 
			Header("Location: entreprise");
		}

	$req->closeCursor();
}

?>