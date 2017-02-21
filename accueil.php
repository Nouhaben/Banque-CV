<?php

require_once "basededonnee.php"; // On se connecte a la bdd 

if(isset($_POST['rechercher']) && !empty($_POST['rechercher'])){
	$req = $bdd->prepare('SELECT * FROM offre_stage1 WHERE entreprise_raison_social LIKE :recherche OR offre_titre LIKE :recherche OR offre_lieu LIKE :recherche OR offre_misson LIKE :recherche OR offre_profil LIKE :recherche');
	$req->execute(array("recherche" => "%".$_POST['rechercher']."%"));
}elseif(isset($_GET['ville']) && !empty($_GET['ville'])){
	$req = $bdd->prepare('SELECT * FROM offre_stage1 WHERE offre_lieu = ? ORDER BY id DESC LIMIT 5');
	$req->execute(array(utf8_encode($_GET['ville'])));
}else{
	$req = $bdd->prepare('SELECT * FROM offre_stage1 ORDER BY id DESC LIMIT 5');
	$req->execute();
}
while($donnees = $req->fetch()){

	$id_a[] = $donnees['id_entreprise'];
	$entreprise_raison_social_a[] = utf8_encode($donnees['entreprise_raison_social']);
	$offre_titre_a[] = utf8_encode($donnees['offre_titre']);
	$offre_periode_a[] = utf8_encode($donnees['offre_periode']);
	$offre_debut_a[] = utf8_encode($donnees['offre_debut']);
	$offre_lieu_a[] = utf8_encode($donnees['offre_lieu']);
	$offre_fonction_a[] = utf8_encode($donnees['offre_fonction']);
	$offre_type_a[] = utf8_encode($donnees['offre_type']);
	$offre_remuniration_a[] = ($donnees['offre_remuniration'] == 1) ? "Oui" : "Non" ;
	$offre_convention_a[] = ($donnees['offre_convention'] == 1) ? "Oui" : "Non" ;
	$offre_misson_a[] = utf8_encode($donnees['offre_misson']);
	$offre_profil_a[] = utf8_encode($donnees['offre_profil']);
}


	

?><div id="recherche_par_ville">
		<div id="contenu_recherche_par_ville">
			<img src="img/maroc.jpg" alt="" title="" width="118" height="142" class="region_picture">
				<div class="item-list"><h3 style="color:#087e67; font-size:14px"><b>Régions actives</b></h3><ul id="homepage-regions" class="vid_7-list">
						<?php $req = $bdd->prepare('SELECT offre_lieu, count(offre_lieu) c from offre_stage1
						group by offre_lieu
						order by c desc');
						$req->execute();
						while($villes = $req->fetch()){
							$ville = $villes["offre_lieu"];
						 ?>
							<li><a href="accueil-<?php echo utf8_encode($ville); ?>" ><?php echo utf8_encode($ville); ?></a></li>
						<?php } $req->closeCursor(); ?>
							<li class="last"><a href="accueil">Toutes les régions</a></li>
							</ul>

				</div>
		</div>
	</div>
			
	<div id="recherche_personnalisee">
		<img style="border:3px solid #eee;width: 99%;" src="img/CV-enligne.jpg" alt="votre cvthèque">

			<form method="post">
				<input type="text" placeholder="rechercher" name="rechercher" style="height:30px;line-height:30px;font-size:18px;width:75%;border:2px solide #86557C;padding:3px;">
				<input type="submit" value="Recherche" style="padding:5px;">
			</form>

			<span class="titre">Les dernières offres :</span>
				<div class="offrestage">
				<?php 
				if(isset($offre_titre_a)){	
				foreach ($offre_titre_a as $key => $value) { ?>
					<a href="infos-entreprise-<?php echo $id_a[$key]; ?>">
						<h4 style="margin:10px 0 3px 0;text-decoration: underline;"><?php echo $value;?></h4></a>
					<span style="color:#828282;">Publié par : <?php echo $entreprise_raison_social_a[$key]; ?></span> - <span style="color:#828282;">Début le : <?php echo $offre_debut_a[$key]; ?></span><br>
					<span style="color:#828282;font-size: 12px;">Période : <?php echo $offre_periode_a[$key]; ?> mois</span> - <span style="color:#828282;font-size: 12px;">Lieu : <?php echo $offre_lieu_a[$key]; ?></span> - <span style="color:#828282;font-size: 12px;">Rémuniration : <?php echo $offre_remuniration_a[$key]; ?></span>
				
				<?php }} ?>
			<span style="display:block;text-align:right;"><a href="offres">Suivants</a></span>
				</div>
				
	</div>

			<?php if(isset($_SESSION["email"])){ ?>
			<div id="cadidat_connecte">
			<h3><?php echo strtoupper($_SESSION["nom"]); //ucfirst : met la première lettre en majescule 
					echo " ".ucfirst($_SESSION["prenom"]); //strtoupper : met toutes les lettres en maj ?></h3>

			<div id="candidat_menu">
				<ul>
					<a href="candidat_message"><li><p>Mes messages</p></li></a>
					<a href="candidat"><li><p>Modifier mon CV</p></li></a>
					<a href="candidat_visionnercv"><li><p>Visionner mon CV</p></li></a>
				</ul>
				<p><a href="deconnexion" style="color:#7AA0E1;">Déconnexion</a></p>
			</div>
			</div>
			<?php }elseif(isset($_SESSION["entreprise_email"])){ ?>
			<div id="cadidat_connecte">
			<h3><?php echo $_SESSION["entreprise_raison_social"]; ?></h3>

			<div id="candidat_menu">
				<a href="entreprise"><li>Ma ficher entreprise</li></a>
				<a href="entreprise_message"><li>Mes messages</li></a>
				<a href="entreprise_offre_stage"><li>Publier une offre</li></a>
				<a href="entreprise_cvtheque"><li>La CVthèque</li></a>
				<a href="entreprise_parametres_compte"><li>Paramètres de mon compte</li></a>
				<p><a href="deconnexion" style="color:#7AA0E1;">Déconnexion</a></p>
			</div>
			</div>
			<?php }else{ ?>
			<div id="inscription">
				<div id="connexion"><b>Connexion</b></div>
				<form method="post" action="connexion.php">
					E-mail (*)
					<input type="text" name="username" placeholder="Votre email"><br>
					Mot de pass (*)
					<input type="password" name="password" placeholder="Mot de passe">
					<input type="hidden" name="typemembre" value="candidat"><br /><br />
					<input style="float:right" type="submit" value="Se connecter"><br /><br />
					<a href="inscription"><input style="float:right" type="button" value="Inscription"></a>
				</form>
				
			</div>
			<?php } ?> 