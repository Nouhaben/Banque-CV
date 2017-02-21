<ul class="menu" <?php if(isset($_SESSION["entreprise_email"]) || isset($_SESSION["email"])){ echo 'style="width:420px;"';} ?>>
	<div id="menu_content" <?php if(isset($_SESSION["entreprise_email"]) || isset($_SESSION["email"])){ echo 'style="width:400px;"';} ?>>
		<li><a href="accueil">Accueil</a></li>
		<li <?php if(isset($_SESSION["entreprise_email"])){ echo 'style="display:none;"';} ?>><a href="candidat">Candidat</a>
			<ul <?php if(!isset($_SESSION["email"]) && !isset($_SESSION["entreprise_email"])){ echo 'style="display:none;"';} ?>>
				<a href="candidat_message"><li>Mes message</li></a>
				<a href="candidat"><li>Mon CV en ligne</li></a>
				<a href="candidat_lettre_motivation"><li>Lettres de motivation</li></a>
				<a href="candidat_parametres_compte"><li>Paramètres de mon compte</li></a>
				<a href="deconnexion"><li>Déconnexion</li></a>
			</ul>
		</li>
		
		<li <?php if(isset($_SESSION["email"])){ echo 'style="display:none;"';} ?>><a href="entreprise">Recruteur</a>
			<ul <?php if(!isset($_SESSION["email"]) && !isset($_SESSION["entreprise_email"])){ echo 'style="display:none;"';} ?>>
				<a href="entreprise"><li>Ma ficher entreprise</li></a>
				<a href="entreprise_message"><li>Mes messages</li></a>
				<a href="entreprise_offre_stage"><li>Publier une offre</li></a>
				<a href="entreprise_cvtheque"><li>La CVthèque</li></a>
				<a href="entreprise_parametres_compte"><li>Paramètres de mon compte</li></a>
				<a href="deconnexion"><li>Déconnexion</li></a>
			</ul>
		</li>
		<li><a href="offres">Offres</a></li>
		<li><a href="conseils">Conseils</a></li>
		<li><a href="contact">Contact</a></li>
	</div>
</ul>