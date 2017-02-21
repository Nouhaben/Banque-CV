<?php

if (isset($_POST['supprimeroffre'])) {
	$req = $bdd->prepare('DELETE FROM offre_stage1 WHERE id = ?');
	$req->execute(array($_POST['supprimeroffre']));
}

$_SESSION["offre_id"] = array();
$_SESSION["offre_titre"] = array();
$_SESSION["offre_periode"] = array();
$_SESSION["offre_debut"] = array();
$_SESSION["offre_lieu"] = array();
$_SESSION["offre_fonction"] = array();
$_SESSION["offre_type"] = array();
$_SESSION["offre_remuniration"] = array();
$_SESSION["offre_convention"] = array();
$_SESSION["offre_misson"] = array();
$_SESSION["offre_profil"] = array();
	
	$offre_titre = isset($_POST["offre_titre"]) ? utf8_decode(filter_input(INPUT_POST, "offre_titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_periode = isset($_POST["offre_periode"]) ? utf8_decode(filter_input(INPUT_POST, "offre_periode", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_debut = isset($_POST["offre_debut"]) ? utf8_decode(filter_input(INPUT_POST, "offre_debut", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_lieu = isset($_POST["offre_lieu"]) ? utf8_decode(filter_input(INPUT_POST, "offre_lieu", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_fonction = isset($_POST["offre_fonction"]) ? utf8_decode(filter_input(INPUT_POST, "offre_fonction", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_type = isset($_POST["offre_type"]) ? utf8_decode(filter_input(INPUT_POST, "offre_type", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_remuniration = isset($_POST["offre_remuniration"]) ? utf8_decode(filter_input(INPUT_POST, "offre_remuniration", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_convention = isset($_POST["offre_convention"]) ? utf8_decode(filter_input(INPUT_POST, "offre_convention", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_misson = isset($_POST["offre_misson"]) ? utf8_decode(filter_input(INPUT_POST, "offre_misson", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$offre_profil = isset($_POST["offre_profil"]) ? utf8_decode(filter_input(INPUT_POST, "offre_profil", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;


if(isset($_POST["offre_titre"]) && isset($_POST["offre_periode"]) && isset($_POST["offre_debut"]) && isset($_POST["offre_lieu"]) && isset($_POST["offre_fonction"]) && isset($_POST["offre_type"]) && isset($_POST["offre_remuniration"]) && isset($_POST["offre_convention"]) && isset($_POST["offre_misson"]) && isset($_POST["offre_profil"])){

	$req = $bdd->prepare('INSERT INTO offre_stage1(id_entreprise,entreprise_raison_social, offre_titre,offre_periode,offre_debut,offre_lieu,offre_fonction,offre_type,offre_remuniration,offre_convention,offre_misson,offre_profil) VALUES(:id_entreprise,:entreprise_raison, :offre_titre,:offre_periode,:offre_debut,:offre_lieu,:offre_fonction,:offre_type,:offre_remuniration,:offre_convention,:offre_misson,:offre_profil)');

	$req->execute(array("id_entreprise"=> $_SESSION["entreprise_id"], "entreprise_raison" => $_SESSION["entreprise_raison_social"],"offre_titre" => $offre_titre,"offre_periode" => $offre_periode,"offre_debut" => $offre_debut,"offre_lieu" => $offre_lieu,"offre_fonction" => $offre_fonction,"offre_type" => $offre_type,"offre_remuniration" => $offre_remuniration,"offre_convention" => $offre_convention,"offre_misson" => $offre_misson,"offre_profil" => $offre_profil));


	echo '<script type="text/javascript">alert("Vos modifitions ont bien été enregistrés");</script>';

}

		$req = $bdd->prepare('SELECT * FROM offre_stage1 WHERE entreprise_raison_social = ?'); //On récupère les données depuis la BDD
		$req->execute(array($_SESSION["entreprise_raison_social"]));
		while($donnees = $req->fetch()) {

			$_SESSION["offre_id"][] = utf8_encode($donnees["id"]); 
			$_SESSION["offre_titre"][] = utf8_encode($donnees["offre_titre"]); 
			$_SESSION["offre_periode"][] = utf8_encode($donnees["offre_periode"]); 
			$_SESSION["offre_debut"][] = utf8_encode($donnees["offre_debut"]); 
			$_SESSION["offre_lieu"][] = utf8_encode($donnees["offre_lieu"]); 
			$_SESSION["offre_fonction"][] = utf8_encode($donnees["offre_fonction"]); 
			$_SESSION["offre_type"][] = utf8_encode($donnees["offre_type"]); 
			$_SESSION["offre_remuniration"][] = ($donnees['offre_remuniration'] == 1) ? "Oui" : "Non" ;
			$_SESSION["offre_convention"][] = ($donnees['offre_convention'] == 1) ? "Oui" : "Non" ; 
			$_SESSION["offre_misson"][] = utf8_encode($donnees["offre_misson"]); 
			$_SESSION["offre_profil"][] = utf8_encode($donnees["offre_profil"]); 
		}

?><h2 style="color:#E57400;">Publier une offre</h2>
<form method="post">

	<table width="490" border="0">
		<tbody><tr>
			<td>Titre de l'offre:</td>
			<td>
				<div class="divLogin">
					<input type="text" id="offre_titre" name="offre_titre" required="required" maxlength="255" class="txtLogin" value="">

				</div>
			</td>
		</tr>
		
		<tr>
			<td>Date début d'offre:</td>
			<td>
				<div class="divLogin2">
					<input type="date" id="offre_debut" name="offre_debut" required="required" class="txtLogin2 datepicker hasDatepicker" value="">
				</div>
			</td>
		</tr>
		<tr>
			<td>Période d'offre:</td>
			<td>
				<div class="divLogin3">
					<select id="offre_periode" name="offre_periode" required="required" class="txtLogin3">
						<option value="1">1 mois</option>
						<option value="2">2 mois</option>
						<option value="3">3 mois</option>
						<option value="4">4 mois</option>
						<option value="5">5 mois</option>
						<option value="6">6 mois</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Lieu :</td>
			<td>
				<div class="divLogin">
					<select name="offre_lieu" class="txtLogin">
	
					<?php 
					$villes = array("Azemmour","Bejaâd","Benslimane","Ben Ahmed","Ben Yakhlef","Berrechid","Bouskoura","Boujniba","Boulanouare","Bouznika","Casablanca","Médiouna","Mohammédia","Tit Mellil","Deroua","El Borouj","El Gara","Guisser","Hattane","Khouribga","Loulad","Oued Zem","Oulad Abbou","Oulad H'Riz Sahel","Oulad M'rah","Oulad Saïd","Oulad Sidi Ben Daoud","Ras El Aïn","Settat","Sidi Rahhal Chataï","Soualem","Azemmour","Bir Jdid","Bouguedra","Echemmaia","El Jadida","Hrara","Ighoud","Jamâat Shaim","Jorf Lasfar","Khemis Zemamra","Laaounate","Moulay Abdallah","Oualidia","Oulad Amrane","Oulad Frej","Oulad Ghadbane","Safi","Sebt El Maârif","Sebt Gzoula","Sidi Ahmed","Sidi Ali Ban Hamdouche","Sidi Bennour","Sidi Bouzid","Sidi Smaïl","Youssoufia","Fès","Aïn Cheggag","Bhalil","Boulemane","El Menzel","Guigou","Imouzzer Kandar","Imouzzer Marmoucha","Missour","Moulay Yaâcoub","Ouled Tayeb","Outat El Haj","Ribate El Kheir","Séfrou","Skhinate","Tafajight","Arbaoua","Aïn Dorij","Dar Gueddari","Had Kourt","Jorf El Melha","Kénitra","Khenichet","Lalla Mimouna","Mechra Bel Ksiri","Mehdia","Moulay Bousselham","Sidi Allal Tazi","Sidi Kacem","Sidi Slimane","Sidi Taibi","Sidi Yahya El Gharb","Souk El Arbaa","Akka","Assa","Bouizakarne","El Ouatia","Es-Semara","Fam El Hisn","Foum Zguid","Guelmim","Taghjijt","Tan-Tan","Tata","Zag","Marrakech","Ait Daoud","Amizmiz","Assahrij","Aït Ourir","Ben Guerir","Chichaoua","El Hanchane","El Kelaâ des Sraghna","Essaouira","Fraïta","Ghmate","Ighounane","Imintanoute","Kattara","Lalla Takerkoust","Loudaya","Lâattaouia","Moulay Brahim","Mzouda","Ounagha","Sid L'Mokhtar","Sid Zouin","Sidi Abdallah Ghiat","Sidi Bou Othmane","Sidi Rahhal","Skhour Rehamna","Smimou","Tafetachte","Tahannaout","Talmest","Tamallalt","Tamanar","Tamansourt","Tameslouht","Tanalt","Zeubelemok","Meknès?","Khénifra","Agourai","Ain Taoujdate","MyAliCherif","Rissani","Amalou Ighriben","Aoufous","Arfoud","Azrou","Aïn Jemaa","Aïn Karma","Aïn Leuh","Aït Boubidmane","Aït Ishaq","Boudnib","Boufakrane","Boumia","El Hajeb","Elkbab","Er-Rich","Errachidia","Gardmit","Goulmima","Gourrama","Had Bouhssoussen","Haj Kaddour","Ifrane","Itzer","Jorf","Kehf Nsour","Kerrouchen","M'haya","M'rirt","Midelt","Moulay Ali Cherif","Moulay Bouazza","Moulay Idriss Zerhoun","Moussaoua","N'Zalat Bni Amar","Ouaoumana","Oued Ifrane","Sabaa Aiyoun","Sebt Jahjouh","Sidi Addi","Tichoute","Tighassaline","Tighza","Timahdite","Tinejdad","Tizguite","Toulal","Tounfite","Zaouia d'Ifrane","Zaïda","Ahfir","Aklim","Al Aroui","Aïn Bni Mathar","Aïn Erreggada","Ben Taïeb","Berkane","Bni Ansar","Bni Chiker","Bni Drar","Bni Tadjite","Bouanane","Bouarfa","Bouhdila","Dar El Kebdani","Debdou","Douar Kannine","Driouch","El Aïoun Sidi Mellouk","Farkhana","Figuig","Ihddaden","Jaâdar","Jerada","Kariat Arekmane","Kassita","Kerouna","Laâtamna","Madagh","Midar","Nador","Naima","Oued Heimer","Oujda","Ras El Ma","Saïdia","Selouane","Sidi Boubker","Sidi Slimane Echcharaa","Talsint","Taourirt","Tendrara","Tiztoutine","Touima","Touissit","Zaïo","Zeghanghane","Rabat","Salé","Ain El Aouda","Harhoura","Khémisset","Oulmès","Rommani","Sidi Allal El Bahraoui","Sidi Bouknadel","Skhirat","Tamesna","Témara","Tiddas","Tiflet","Touarga","Agadir","Agdz","Agni Izimmer","Aït Melloul","Alnif","Anzi","Aoulouz","Aourir","Arazane","Aït Baha","Aït Iaâza","Aït Yalla","Ben Sergao","Biougra","Boumalne-Dadès","Dcheira El Jihadia","Drargua","El Guerdane","Harte Lyamine","Ida Ougnidif","Ifri","Igdamen","Ighil n'Oumgoun","Imassine","Inezgane","Irherm","Kelaat-M'Gouna","Lakhsas","Lakhsass","Lqliâa","M'semrir","Massa (Maroc)","Megousse","Ouarzazate","Oulad Berhil","Oulad Teïma","Sarghine","Sidi Ifni","Skoura","Tabounte","Tafraout","Taghzout","Tagzen","Taliouine","Tamegroute","Tamraght","Tanoumrite Nkob Zagora","Taourirt ait zaghar","Taroudant","Temsia","Tifnit","Tisgdal","Tiznit","Toundoute","Zagora","Afourar","Aghbala","Azilal","Aït Majden","Beni Ayat","Béni Mellal","Bin elouidane","Bradia","Bzou","Dar Oulad Zidouh","Demnate","Dra'a","El Ksiba","Foum Jamaa","Fquih Ben Salah","Kasba Tadla","Ouaouizeght","Oulad Ayad","Oulad M'Barek","Oulad Yaich","Sidi Jaber","Souk Sebt Oulad Nemma","Zaouïat Cheikh","Tanger?","Tétouan?","Akchour","Assilah","Bab Berred","Bab Taza","Brikcha","Chefchaouen","Dar Bni Karrich","Dar Chaoui","Fnideq","Gueznaia","Jebha","Karia","Khémis Sahel","Ksar El Kébir","Larache","M'diq","Martil","Moqrisset","Oued Laou","Oued Rmel","Ouezzane","Point Cires","Sidi Lyamani","Sidi Mohamed ben Abdallah el-Raisuni","Zinat","Ajdir?","Aknoul?","Al Hoceïma?","Aït Hichem?","Bni Bouayach?","Bni Hadifa?","Ghafsai?","Guercif?","Imzouren?","Inahnahen?","Issaguen (Ketama)?","Karia (El Jadida)?","Karia Ba Mohamed?","Oued Amlil?","Oulad Zbair?","Tahla?","Tala Tazegwaght?","Tamassint?","Taounate?","Targuist?","Taza?","Taïnaste?","Thar Es-Souk?","Tissa?","Tizi Ouasli?","Laayoune?","El Marsa?","Tarfaya?","Boujdour?","Awsard","Oued-Eddahab");

					foreach ($villes as $value) {
					?>
					<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
					<?php } ?>
				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Fonction:</td>
			<td>
				<div class="divLogin">
					<select id="offre_fonction" name="offre_fonction" class="txtLogin" >
						<option value="1" >Choisir une fonction</option>
						<option value="2" >Informatique/ Réseaux/ Télécoms</option>
						<option value="3" >Import/ Export/ Commerce</option>
						<option value="4" >Direction générale</option>
						<option value="5" >Distribution/ Logistique/ Transport</option>
						<option value="6" >Commercial/ Vente</option>
						<option value="7" >Comptabilité/ Finance/ Audit</option>
						<option value="8" >Administration/ Secrétariat</option>
						<option value="9" >Internet/ E-commerce/ E-reputation</option>
						<option value="10">Juridique/ Droit</option>
						<option value="11">Marketing/ Communication/ Publicité</option>
						<option value="12">Organisation/ Gestion/ Stratégie</option>
						<option value="13">Recherche &amp; Développement</option>
						<option value="14">Système d&#039;information </option>
						<option value="15">Qualité/ Production</option>
						<option value="16">Ressources Humaines</option>
						<option value="17">Services Généraux</option>
						<option value="18">Tourisme/ Hôtellerie/ Restauration</option>
						<option value="19">Maintenance/ Réparation</option>
						<option value="20">Enseignement /Formation /Education</option>
						<option value="21">Évenementiel</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Type de stage:</td>
			<td>
				<div class="divLogin">
					<select id="offre_type" name="offre_type" required="required" class="txtLogin">
						<option value="1">Opérationnel</option>
						<option value="2">Observation</option>
						<option value="3">Fonctionnel</option>
						<option value="4">Fin d'études</option>
						<option value="5">Pré-embauche</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Rémunération:</td>
			<td>
				<div class="divLogin3">
					<select id="offre_remuniration" name="offre_remuniration" required="required" class="txtLogin3">
						<option value="1">Avec</option>
						<option value="0">Sans</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Convention:</td>
			<td>
				<div class="divLogin3">
					<select id="offre_convention" name="offre_convention" required="required" class="txtLogin3">
						<option value="1">Avec</option>
						<option value="0">Sans</option>
					</select>
				</div>
			</td>
		</tr>
	</tbody></table>

	<div>
		<span class="titre">CONTEXTE ET MISSIONS</span>
		<textarea id="offre_misson" name="offre_misson" style="width:100%;height:200px;float:none;" required="required" class="txtDesc"></textarea>
	</div>
	<div style="margin:20px 0;">
		<span class="titre">PROFIL RECHERCHÉ</span>
		<div class="spacer"></div>
		<textarea id="offre_profil" name="offre_profil" style="width:100%;height:200px;float:none;" required="required" class="txtDesc"></textarea>
	</div>
<br>

<input type="submit" value="Enregistrer">
</form>

<h2 style="color:#E57400;">Vos offres publiés</h2>
<?php 
$lesoffres = $_SESSION["offre_titre"];
if(count($lesoffres) == 0){ echo "Aucune offre."; } ?>
<?php foreach ($lesoffres as $key => $value) { ?>

<h2 style="color:blue;">Offre <?php echo $key+1; ?></h2>

<table width="490" border="0">
		<tbody><tr>
			<td>Titre de l'offre:</td>
			<td>
				<div class="divLogin">
					<input disabled="disabled" type="text" id="offre_titre" name="offre_titre" required="required" maxlength="255" class="txtLogin" value="<?php echo $value; ?>">

				</div>
			</td>
		</tr>
		<tr>
			<td>Période du stage:</td>
			<td>
				<div class="divLogin3">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin3" value="<?php echo $_SESSION["offre_periode"][$key]; ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>Date début de stage:</td>
			<td>
				<div class="divLogin3">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin3" value="<?php echo $_SESSION["offre_debut"][$key]; ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>Lieu :</td>
			<td>
				<div class="divLogin">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin" value="<?php echo $_SESSION["offre_lieu"][$key]; ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>Fonction:</td>
			<td>

				<?php
				switch($_SESSION["offre_fonction"][$key]){
		case 1: $_SESSION["offre_fonction"][$key] =  "Non définie"; break;
		case 2: $_SESSION["offre_fonction"][$key] =  "Informatique/ Réseaux/ Télécoms"; break;
		case 3: $_SESSION["offre_fonction"][$key] =  "Import/ Export/ Commerce"; break;
		case 4: $_SESSION["offre_fonction"][$key] =  "Direction générale"; break;
		case 5: $_SESSION["offre_fonction"][$key] =  "Distribution/ Logistique/ Transport"; break;
		case 6: $_SESSION["offre_fonction"][$key] =  "Commercial/ Vente"; break;
		case 7: $_SESSION["offre_fonction"][$key] =  "Comptabilité/ Finance/ Audit"; break;
		case 8: $_SESSION["offre_fonction"][$key] =  "Administration/ Secrétariat"; break;
		case 9: $_SESSION["offre_fonction"][$key] =  "Internet/ E-commerce/ E-reputation"; break;
		case 10: $_SESSION["offre_fonction"][$key] =  "Juridique/ Droit"; break;
		case 11: $_SESSION["offre_fonction"][$key] =  "Marketing/ Communication/ Publicité"; break;
		case 12: $_SESSION["offre_fonction"][$key] =  "Organisation/ Gestion/ Stratégie"; break;
		case 13: $_SESSION["offre_fonction"][$key] =  "Recherche &amp; Développement"; break;
		case 14: $_SESSION["offre_fonction"][$key] =  "Système d&#039;information"; break;
		case 15: $_SESSION["offre_fonction"][$key] =  "Qualité/ Production"; break;
		case 16: $_SESSION["offre_fonction"][$key] =  "Ressources Humaines"; break;
		case 17: $_SESSION["offre_fonction"][$key] =  "Services Généraux"; break;
		case 18: $_SESSION["offre_fonction"][$key] =  "Tourisme/ Hôtellerie/ Restauration"; break;
		case 19: $_SESSION["offre_fonction"][$key] =  "Maintenance/ Réparation"; break;
		case 20: $_SESSION["offre_fonction"][$key] =  "Enseignement /Formation /Education"; break;
		case 21: $_SESSION["offre_fonction"][$key] =  "Évenementiel"; break;
			default: "Non définie"; break;
		}

				?>
				<div class="divLogin">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin" value="<?php echo $_SESSION["offre_fonction"][$key]; ?>">

				</div>
			</td>
		</tr>
		<tr>
			<td>Type de stage:</td>
			<td>
				<div class="divLogin">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin" value="<?php echo $_SESSION["offre_type"][$key]; ?>">

				</div>
			</td>
		</tr>
		<tr>
			<td>Rémunération:</td>
			<td>
				<div class="divLogin3">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin3" value="<?php echo $_SESSION["offre_remuniration"][$key]; ?>">

				</div>
			</td>
		</tr>
		<tr>
			<td>Convention:</td>
			<td>
				<div class="divLogin3">
					<input disabled="disabled" type="text" id="offre_periode3" name="offre_periode3" required="required" maxlength="255" class="txtLogin3" value="<?php echo $_SESSION["offre_remuniration"][$key]; ?>">
				</div>
			</td>
		</tr>
	</tbody></table>

	<div>
		<span class="titre">CONTEXTE ET MISSIONS</span>
		<textarea  disabled="disabled" id="offre_misson" name="offre_misson" style="width:100%;height:200px;float:none;" required="required" class="txtDesc"><?php echo $_SESSION["offre_misson"][$key]; ?></textarea>
	</div>
	<div style="margin:20px 0;">
		<span class="titre">PROFIL RECHERCHÉ</span>
		<div class="spacer"></div>
		<textarea disabled="disabled" id="offre_profil" name="offre_profil" style="width:100%;height:200px;float:none;" required="required" class="txtDesc"><?php echo $_SESSION["offre_profil"][$key]; ?></textarea>
	</div>
<br>
<form method="post">
	<input type="hidden" name="supprimeroffre" value="<?php echo $_SESSION["offre_id"][$key]; ?>">
	<input type="submit" value="Suuprimer">
</form>
<?php } ?>