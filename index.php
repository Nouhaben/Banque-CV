<?php
session_start(); //l'initiation de la session doit tjr se faire avant le HTML
?><!DOCTYPE html> <!-- Le doctype de HTML 5 -->
<html>
<head>
	<title>CV en ligne</title> 
	<meta charset="utf-8"> <!-- définir l'encodage, UTF-8 gère la plupart des langues dont le français -->
	<meta name="description" xml:lang="fr" content="Banque de CV pour candidat voulant un stage ou emploi"/> <!-- La meta de déscription qui sert généralement pour les sites de recherche --> 
	<meta name="keywords" xml:lang="fr" content="banque cv, stage, emploi"/> <!-- Aussi pour les moteurs de recherche, ce sont des mot cléf -->
	<meta name="Robots" content="index, follow"/> <!-- Aussi pour moteurs de recherche, intéragie avec les bots des moteurs de recherche -->
	<meta name="author" content="Nouhaila et sarah"> <!-- Permet de rechercher la page dans certains moteurs de recherche en se basant sur les noms de
	auteurs indiqués --> 
	<link rel="shortcut icon" href="img/CV-logo.jpg">
	<link type="text/css" rel="stylesheet" href="style.css"/> <!-- associe le CSS avec HTML -->
	<link href='http://fonts.googleapis.com/css?family=Happy+Monkey' rel='stylesheet' type='text/css'> <!-- Nouvelle police -->
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="js.js"></script>
</head>
<body>
	<div id="page"> <!-- Déclaration d’une sub-division(en mode « bloc ») -->
		<div id="header">
			<div id="header_top">
				<img src="img/cv en ligne.png" alt="CV en ligne Logo" width="296" height="88"></div>
			<?php include_once "menu.php"; ?>
		</div>
		
		<div id="menu_recherche">
			<?php 
			if(isset($_GET["page"]) && $_GET["page"] != NULL){ $page = $_GET["page"].".php"; }else{ $page = "accueil.php"; }
			
			if(file_exists($page)){ /* si le nom tapé dans ?page=.... existe = on l'inclut */
				include_once $page;
			}else{ /* sinon on inclut la page d'erreur */
				include_once "erreur.php";
			}
			
			?>
		</div>
		<div class="coloneLeft">
			
		</div>
		

		<div id="footer">
			<div class="footerb">
			  <div class="conteneurB">
			    	<div class="links">
			        	<a href="#">Qui sommes nous ?</a>
			            <img src="img/SpacerBlack.gif" class="spacer">
			            <a href="#">Informations recruteurs</a>
			            <img src="img/SpacerBlack.gif" class="spacer">
			            <a href="#">Partenaires</a>
			            <img src="img/SpacerBlack.gif" class="spacer">
			            <a href="#">Mentions légales</a>
			            <img src="img/SpacerBlack.gif" class="spacer">
			            <a href="#">Contactez-nous</a>
			        </div>
			        
		    	</div>
		    </div>
		</div>
	</div>
</body>
</html>