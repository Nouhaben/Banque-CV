<?php 

if(isset($_POST['promouvoir_candidat'])){
	$req = $bdd->prepare('UPDATE membres SET rang = "admin" WHERE id = ?') or die(mysql_error());
	$req->execute(array($_POST['promouvoir_candidat']));
}

if(isset($_POST['retirer_admin'])){
	$req = $bdd->prepare('UPDATE membres SET rang = "" WHERE id = ?') or die(mysql_error());
	$req->execute(array($_POST['retirer_admin']));
}

if(isset($_POST['supprimer_candidat'])){
	$req = $bdd->prepare('DELETE FROM membres WHERE id = ?') or die(mysql_error());
	$req->execute(array($_POST['supprimer_candidat']));
}

if(isset($_POST['supprimer_entreprise'])){
	$req = $bdd->prepare('DELETE FROM entreprise WHERE id = ?') or die(mysql_error());
	$req->execute(array($_POST['supprimer_entreprise']));
	$req = $bdd->prepare('DELETE FROM offre_stage1 WHERE id_entreprise = ?') or die(mysql_error());
	$req->execute(array($_POST['supprimer_entreprise']));
}

	$req = $bdd->prepare('SELECT * FROM membres') or die(mysql_error());
	$req->execute();
	$num = 1;
	while($infos = $req->fetch()){
		$info['id'][$num] = $infos['id'];
		$info['date_inscription'][$num] = strstr($infos['date_inscription'], " ",true);
		$info['nom'][$num] = $infos['nom'];
		$info['prenom'][$num] = $infos['prenom'];
		$info['date_naissance'][$num] = $infos['date_naissance'];
		$info['rang'][$num] = $infos['rang'];
		$num++;
	}
?><div id="candidat_tableau">


<div id="condidatinfos">
	<span class="titre" style="float:none;">Informations sur les candidats</span>
	<table>
		<tr>
			<td>Total candidats :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php echo count($info['id']); ?></td>
		</tr>

		<tr>
			<td>Candidats inscrits aujourd'hui :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			date_default_timezone_set("Africa/Casablanca"); //date('Y-m-d')
			$candidat_inscrits = array_count_values($info['date_inscription']);
			if(isset($candidat_inscrits[date('Y-m-d')])){
				echo $candidat_inscrits[date('Y-m-d')]; 
			}else{
			 echo "Aucun candidat n'est inscrit aujourd'hui."; 
			 }
			?></td>
		</tr>
		
		<tr>
			<td>Candidats inscrits cette semaine :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			 $semaine = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*7)]);
			 $jour6 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*6)]);
			 $jour5 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*5)]);
			 $jour4 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*4)]);
			 $jour3 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*3)]);
			 $jour2 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*2)]);
			 $jour1 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*1)]);
			 if(isset($candidat_inscrits[date('Y-m-d')])) {
				$candidats = $candidat_inscrits[date('Y-m-d')]; 
			}else {
				$candidats = 0;
			}
			 $nombretotal = $candidats + $semaine + $jour1 + $jour2 + $jour3 + $jour4 + $jour5 + $jour6;

			 if($nombretotal == 0 ) {
				echo "Aucun candidat n'est inscrit cette semaine.";
			 }else {
				echo $nombretotal;
			 }
			  ?></td>
		</tr>


		<tr>
			<td>Candidats inscrits ce mois :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			foreach ($info['date_inscription'] as $key => $value) {
				$mois[$key] = substr($info['date_inscription'][$key], 0,7);
			}
			$candidat_inscrits = array_count_values($mois);
			if(isset($candidat_inscrits[date('Y-m')])){
				echo $candidat_inscrits[date('Y-m')]; 
			}else{
			 echo "Aucun candidat n'est inscrit ce mois."; 
			 }
			?></td>
		</tr>
	</table>
</div>
<span class="titre2">Liste des candidats</span>

	<div id="listecandidat">
		<br>
		<table>
			<tr>
				<td>Nom</td>
				<td>Prénom</td>
				<td>Date de naissance</td>
				<td>Date d'inscription</td>
				<td>Administration</td>
				<td>Supprimer</td>
			</tr>
		<?php foreach ($info['id'] as $key => $value) {
			//echo $info['nom'][$key];
		?>

		<tr>
			<td><?php echo $info['prenom'][$key] ?></td>
			<td><?php echo $info['nom'][$key] ?></td>
			<td><?php echo $info['date_naissance'][$key] ?></td>
			<td><?php echo $info['date_inscription'][$key] ?></td>
			<td>
				<?php if($info['rang'][$key] == "admin"){ ?>
				<form method="post">
					<input type="hidden" name="retirer_admin" value="<?php echo $info['id'][$key] ?>">
					<input type="submit" value="Retirer administration" onclick="return confirm('êtes-vous sûr ?')">
				</form>

				<?php }else{ ?>
				<form method="post">
					<input type="hidden" name="promouvoir_candidat" value="<?php echo $info['id'][$key] ?>">
					<input type="submit" value="Promouvoir" onclick="return confirm('êtes-vous sûr ?')">
				</form>
				<?php } ?>
			</td>
			<td>
				<form method="post">
					<input type="hidden" name="supprimer_candidat" value="<?php echo $info['id'][$key] ?>">
					<input type="submit" value="Supprimer" onclick="return confirm('êtes-vous sûr ?')">
				</form>
			</td>
		</tr>


		<?php } ?>
		</table>
	</div>


<?php 
	$entreprises = $bdd->prepare('SELECT * FROM entreprise') or die(mysql_error());
	$entreprises->execute();
	$num = 1;
	while($entreprise_infos = $entreprises->fetch()){
		$infos_entreprise['id'][$num] = $entreprise_infos['id'];
		$infos_entreprise['date_inscription'][$num] = strstr($entreprise_infos['date_inscription'], " ",true);
		$infos_entreprise['entreprise_raison_social'][$num] = $entreprise_infos['entreprise_raison_social'];
		$infos_entreprise['entreprise_ville'][$num] = $entreprise_infos['entreprise_ville'];
		$num++;
	}
?>



<div id="entrepriseinfos">
		<span class="titre" style="float:none;">Informations sur les entreprises</span>
	<table>
		<tr>
			<td>Total entreprises :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php echo count($infos_entreprise['id']); ?></td>
		</tr>

		<tr>
			<td>Entreprises inscrites aujourd'hui :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			date_default_timezone_set("Africa/Casablanca"); //date('Y-m-d')
			$candidat_inscrits = array_count_values($infos_entreprise['date_inscription']);
			if(isset($candidat_inscrits[date('Y-m-d')])){
				echo $candidat_inscrits[date('Y-m-d')]; 
			}else{
			 echo "Aucune entreprise n'est inscrite aujourd'hui."; 
			 } ?></td>
		</tr>
		
		<tr>
			<td>Entreprises inscrites cette semaine :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			 $semaine = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*7)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*7)]:0;
			 $jour6 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*6)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*6)]:0;
			 $jour5 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*5)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*5)]:0;
			 $jour4 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*4)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*4)]:0;
			 $jour3 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*3)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*3)]:0;
			 $jour2 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*2)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*2)]:0;
			 $jour1 = isset($candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*1)])?$candidat_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*1)]:0;
			 $aujourdhui = isset($candidat_inscrits[date('Y-m-d')])?$candidat_inscrits[date('Y-m-d')]:0;
			 $nombretotal = $aujourdhui + $semaine + $jour1 + $jour2 + $jour3 + $jour4 + $jour5 + $jour6;

			  if($nombretotal == 0 ) {
				echo "Aucune entreprise n'est inscrite cette semaine.";
			 }else {
				echo $nombretotal;
			 }
			  ?></td>
		</tr>


		<tr>
			<td>Entreprises inscrites ce mois :</td>
			<td style="background: #FFA500;font-size: 18px;"><?php
			foreach ($infos_entreprise['date_inscription'] as $key => $value) {
				$mois[$key] = substr($infos_entreprise['date_inscription'][$key], 0,7);
			}
			$candidat_inscrits = array_count_values($mois);
			if(isset($candidat_inscrits[date('Y-m')])){
				echo $candidat_inscrits[date('Y-m')]; 
			}else{
			 echo "Aucune entreprise n'est inscrite ce mois."; 
			 }
			
			?></td>
		</tr>
	</table>
</div>

<span class="titre2">Liste des entreprises</span>

	<div id="listeentreprise">
		<br>
		<table>
			<tr>
				<td>Raison social</td>
				<td>Date d'inscription</td>
				<td>Ville</td>
				<td>Supprimer</td>
			</tr>
		<?php foreach ($infos_entreprise['id'] as $key => $value) {
			//echo $infos_entreprise['nom'][$key];
		?>

		<tr>
			<td><?php echo $infos_entreprise['entreprise_raison_social'][$key] ?></td>
			<td><?php echo $infos_entreprise['date_inscription'][$key] ?></td>
			<td><?php echo $infos_entreprise['entreprise_ville'][$key] ?></td>
			<td>
				<form method="post">
					<input type="hidden" name="supprimer_entreprise" value="<?php echo $infos_entreprise['id'][$key] ?>">
					<input type="submit" value="Supprimer" onclick="return confirm('êtes-vous sûr ?')">
				</form>
			</td>
		</tr>


		<?php } ?>
		</table>
	</div>

</div>