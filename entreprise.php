<?php

if(isset($_SESSION["entreprise_email"])){ 
require_once "basededonnee.php"; 

?>

<div id="candidat">

	<div id="espace_candidat" style="background: #8AB4FF;">Espace Entreprise</div>
	<div id="candidat_menu_gauche">
		<ul>
			<a href="entreprise"><li>Ma ficher entreprise</li></a>
			<a href="entreprise_message"><li>Mes messages</li></a>
			<a href="entreprise_offre_stage"><li>Publier une offre</li></a>
			<a href="entreprise_cvtheque"><li>La CVthèque</li></a>
			<a href="entreprise_parametres_compte"><li>Paramètres de mon compte</li></a>
			<a href="deconnexion"><li>Déconnexion</li></a>
		</ul>
	</div>
	
	<div id="candidat_menu_droit">
		<?php 
			if(isset($_GET["entreprise"]) && $_GET["entreprise"] != NULL){ $page_candidat = $_GET["entreprise"].".php"; }else{ $page_candidat = "entreprise_infos.php"; }
			
			if(file_exists($page_candidat)){ 
				include_once $page_candidat;
			}else{ 
				include_once "erreur.php";
			}
		?>
		</div>
	</div>

</div>

<?php }else{ ?>
<div id="candidat">
	<div id="espace_candidat" style="background: #8AB4FF;">Espace entreprise</div>
<h3>Connectez vous en tant qu'entreprise</h3>
<form method="post" action="connexion.php">
	<input id="pseudo_connex" type="text" name="username" placeholder="Votre email"><br>
	<input id="password_connex" type="password" name="password" placeholder="Mot de passe"><br>
	<input type="hidden" name="typemembre" value="entreprise">
	<input id="submit_connex" type="submit" value="Se connecter">
</form>
<h3>Vous n'êtes pas inscrit ? <a href="inscription">inscrivez vous</a> !</h3>
</div>

<?php } ?>