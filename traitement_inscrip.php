<?php
	$typemembre = $_POST["typemembre"];
	$civilite = $_POST["civilite"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$naissance_jour = $_POST["naissance_jour"];
	$naissance_mois = $_POST["naissance_mois"];
	$naissance_annee = $_POST["naissance_annee"];
	$passwordcandidat = $_POST["passwordcandidat"];
	$passwordcandidat_confirm = $_POST["passwordcandidat_confirm"];

	$password = $_POST["password"];
	$password_confirm = $_POST["password_confirm"];
	if(isset($_POST["typemembre"]) && $_POST["typemembre"] == "Candidat"){

		if(isset($_POST["civilite"]) && !empty($civilite) && isset($_POST["nom"]) && !empty($nom) && is_string($nom) 
		&& isset($_POST["prenom"]) && !empty($prenom) && is_string($prenom) && $email == true && isset($_POST["email"]) 
		&& !empty($email) && isset($_POST["naissance_jour"]) && !empty($naissance_jour) && is_numeric($naissance_jour) 
		&& $naissance_jour != "- Jour -" && isset($_POST["naissance_mois"]) && !empty($naissance_mois) 
		&& $naissance_mois != "- Mois -" && isset($_POST["naissance_annee"]) && !empty($naissance_annee) 
		&& $naissance_annee != "- Année -" && is_numeric($naissance_annee) && isset($_POST["passwordcandidat"]) 
		&& !empty($passwordcandidat) && strlen($passwordcandidat) >=5 && $passwordcandidat_confirm==$passwordcandidat){
		 
			include_once "basededonnee.php";
			
			$req = $bdd->prepare('INSERT INTO membres (id,nom,prenom,email,date_naissance,password,titre) VALUES(:id, :nom, :prenom, :email, :date_naissance, :password, :titre)');
			$req->execute(array(
				'id' => "",
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'date_naissance' => $naissance_annee."-".$naissance_mois."-".$naissance_jour,
				'password' => sha1($passwordcandidat),
				'titre' => $civilite
				));
			$req->closeCursor();
			echo '<script type="text/javascript">alert("Inscription réussite !");</script>';
			echo '<script type="text/javascript">window.location.href="candidat";</script>';
		}else{ echo '<script type="text/javascript">alert("veuillez renseigner un champs obligatoire");window.location.href="inscription";</script>'; }

	}elseif (isset($_POST["typemembre"]) && $_POST["typemembre"] == "Entreprise") {

	$entreprise_raison_social = isset($_POST['entreprise_raison_social']) ? filter_input(INPUT_POST,'entreprise_raison_social',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_secteur = isset($_POST['entreprise_secteur']) ? filter_input(INPUT_POST,'entreprise_secteur',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_ville = isset($_POST['entreprise_ville']) ? filter_input(INPUT_POST,'entreprise_ville',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_tel = isset($_POST['entreprise_tel']) ? filter_input(INPUT_POST,'entreprise_tel',FILTER_SANITIZE_NUMBER_INT) : false;
    $entreprise_fax = isset($_POST['entreprise_fax']) ? filter_input(INPUT_POST,'entreprise_fax',FILTER_SANITIZE_NUMBER_INT) : false;
    $entreprise_email = isset($_POST['entreprise_email']) ? filter_input(INPUT_POST,'entreprise_email',FILTER_VALIDATE_EMAIL) : false;

		if(!empty($entreprise_raison_social) && !empty($entreprise_secteur) && !empty($entreprise_ville) && !empty($entreprise_tel) && !empty($entreprise_fax) && !empty($entreprise_email) && isset($_POST["password"]) && !empty($password) && strlen($password) >=5 && $password_confirm==$password){
		 
			include_once "basededonnee.php";
			
			$req = $bdd->prepare('INSERT INTO entreprise (entreprise_raison_social,entreprise_secteur,entreprise_ville,entreprise_tel,entreprise_fax,entreprise_email,entreprise_password) VALUES(:entreprise_raison_social, :entreprise_secteur, :entreprise_ville, :entreprise_tel, :entreprise_fax, :entreprise_email, :entreprise_password)');
			$req->execute(array(
				'entreprise_raison_social' => $entreprise_raison_social,
				'entreprise_secteur' => $entreprise_secteur,
				'entreprise_ville' => $entreprise_ville,
				'entreprise_tel' => $entreprise_tel,
				'entreprise_fax' => $entreprise_fax,
				'entreprise_email' => $entreprise_email,
				'entreprise_password' => sha1($password)
				));

			$req->closeCursor();
			echo '<script type="text/javascript">alert("Inscription réussite !");</script>';
			echo '<script type="text/javascript">window.location.href="entreprise";</script>';
		}else{ echo '<script type="text/javascript">alert("veuillez renseigner un champs obligatoire");window.location.href="inscription";</script>'; }
	}
?>