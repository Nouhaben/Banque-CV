<?php

if(isset($_SESSION["email"])){ //si la variable session existe on affiche le suivant :
require_once "basededonnee.php"; // On se connecte a la bdd 

?>
<div id="candidat">

	<div id="espace_candidat">Espace candidat</div>
	<div id="candidat_menu_gauche">
		<ul>
			<?php if($_SESSION["rang"] == "admin"){ ?>
			<a href="candidat_tableau"><li>Tableau de bord</li></a>
			<?php } ?>
			<a href="candidat_message"><li>Mes message</li></a>
			<a href="candidat"><li>Mon CV en ligne</li></a>
			<a href="candidat_lettre_motivation"><li>Lettres de motivation</li></a>
			<a href="candidat_parametres_compte"><li>Paramètres de mon compte</li></a>
			<a href="deconnexion"><li>Déconnexion</li></a>
		</ul>
	</div>
	
	<div id="candidat_menu_droit">
			<?php 
			if(isset($_GET["candidat"]) && $_GET["candidat"] != NULL){ $page_candidat = $_GET["candidat"].".php"; }else{ $page_candidat = "candidat_photo.php"; }
			
			if(file_exists($page_candidat)){ /* si le nom tapé dans ?candidat=.... existe = on l'inclut */
				include_once $page_candidat;
			}else{ /* sinon on inclut la page d'erreur */
				include_once "erreur.php";
			}
			//require_once $_GET["candidat"].'.php'; ?>
		</div>
	</div>

</div>

<?php }elseif(isset($_SESSION["entreprise_email"])){ ?>

<h2>Vous devez être connecté en tant que candidat</div>
<?php 	}else{ // si la variable session n'existe pas on affiche le suivant : ?>
<div id="candidat">
	<div id="espace_candidat">Espace candidat</div>
	<div  class="candidat" >
<h3>Connectez vous en tant que candidat</h3>
<form method="post" action="connexion.php">
	<input id="pseudo_connex" type="text" name="username" placeholder="Votre email"><br>
	<input id="password_connex" type="password" name="password" placeholder="Mot de passe"><br>
	<input type="hidden" name="typemembre" value="candidat">
	<input id="submit_connex" type="submit" value="Se connecter">
</form>
<h3>Vous n'êtes pas inscrit ? <a href="inscription">inscrivez vous</a> !</h3>
</div>
</div>

<?php } ?>