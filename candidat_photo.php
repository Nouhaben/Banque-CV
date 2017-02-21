<?php
	$email_utilisateur = strstr($_SESSION["email"], '@', true);
	
	$imagesGlobalPath = "img_candidats/"; //le répértoire dans lequel on va stocker les images des candidats
    if(isset($_FILES['photo_candidat'])){ //on vérifie que l'utilisateur a envoyé une image
    $fichier = basename($_FILES['photo_candidat']['name']); // on stock le nom du fichier envoyé dans une varibale
    $extension = strrchr($_FILES['photo_candidat']['name'], '.'); 
    $extensionsAutorisees = array(".png", ".jpg", ".jpeg", ".bmp"); 
    if(file_exists($imagesGlobalPath.$fichier)){ 
       echo '<script type="text/javascript">alert("Cette image existe déjà ou ça peut qu\'elle à le même nom d\'une autre image, veuillez la renommer.");</script>'; 
     }elseif(!(in_array($extension, $extensionsAutorisees))){ 
        echo '<script type="text/javascript">alert("Erreur : Aucun fichier selectionné ou l\'extension n\'est pas bonne !");</script>'; 
	 }elseif(move_uploaded_file($_FILES['photo_candidat']['tmp_name'], $imagesGlobalPath.$fichier) AND in_array($extension, $extensionsAutorisees)){ 
          echo '<script type="text/javascript">alert("Photo transférée avec succès !");</script>';
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: Mon, 26 Jul 2014 05:00:00 GMT");
     }else{ 
                switch ($_FILES['nom_du_fichier']['error']){  
                   case 1: // UPLOAD_ERR_INI_SIZE    
                   $err = '<script type="text/javascript">alert("Le fichier dépasse la limite du serveur (fichier php.ini) !");</script>';    
                   break;    
                   case 2: // UPLOAD_ERR_FORM_SIZE    
                   $err = '<script type="text/javascript">alert("Le fichier dépasse la limite du formulaire HTML !");</script>';
                   break;    
                   case 3: // UPLOAD_ERR_PARTIAL    
                   $err = '<script type="text/javascript">alert("L\'envoie du fichier à été interrompu par le serveur !");</script>';    
                   break;    
                   case 4: // UPLOAD_ERR_NO_FILE    
                   $err = '<script type="text/javascript">alert("Le fichier que vous avez envoyer à un taille 0 !");</script>';
                   break;    
                }
          echo 'Erreur : '.$err;
     }
	if(file_exists("img_candidats/".$email_utilisateur.".png")) {
		unlink("img_candidats/".$email_utilisateur.".png");
	}
	rename("img_candidats/".$fichier, "img_candidats/".$email_utilisateur.".png"); 
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

<div id="candidat_photo">
	<div id="candidat_photo_block_gauche">
		<img src="img_candidats/<?php echo $email_utilisateur.".png"; ?>" alt="candidat" width="170" height="190">
		<div id="candidat_photo_right">
			<p><u>Recommandations :</u><br>
			Type de photo: Professionnelle<br>
			Angle de prise: Face<br>
			Arrière plan: Blanc<br>
			Dimensions: 170 x 190<br>
			Fichier: JPG, PNG, GIF, BMP<br>
			Ajouter/changer votre photo :</p>
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="photo_candidat" >
				<input type="submit" name="envoyer_photo" value="Envoyer">
			</form>
		</div>
	</div>
	<div id="candidat_photo_block_droit">
		<a href="candidat_visionnercv"><img src="img/visionner_cv.png" alt="visionner cv"></a>
	</div>
</div>