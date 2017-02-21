<?php
	//On collecte les variables
	$statut = isset($_POST['candidat_statut']) ? filter_input(INPUT_POST,'candidat_statut',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$titre = isset($_POST['candidat_titre']) ? filter_input(INPUT_POST,'candidat_titre',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false ;
	$adresse = isset($_POST['candidat_adresse']) ? filter_input(INPUT_POST,'candidat_adresse',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$ville = isset($_POST['candidat_ville']) ? filter_input(INPUT_POST,'candidat_ville',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
	$telephone = isset($_POST['candidat_tel']) ? filter_input(INPUT_POST,'candidat_tel',FILTER_SANITIZE_NUMBER_INT) : false;
	$email = isset($_POST['candidat_email']) ? filter_input(INPUT_POST,'candidat_email',FILTER_VALIDATE_EMAIL) : false;
	$permis = isset($_POST['candidat_permis']) ? filter_input(INPUT_POST,'candidat_permis',FILTER_SANITIZE_NUMBER_INT) : false;

	if(!empty($statut) && !empty($titre) && !empty($adresse) && !empty($ville) && !empty($telephone) && !empty($email)){
		$req = $bdd->prepare('UPDATE membres SET email = :email, statut = :statut, titre = :titre, adresse = :adresse, ville = :ville, telephone = :phone, permis = :permis WHERE nom = :nom AND prenom = :prenom');
		$req->execute(array("email" => $email, "statut" => $statut, "titre" => $titre, "adresse" => $adresse, "ville" => $ville, "phone" => $telephone, "permis" => $permis, "nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"]));
		
		$_SESSION["email"] = $email;
		$_SESSION["statut"] = $statut;
		$_SESSION["titre"] = $titre;
		$_SESSION["adresse"] = $adresse;
		$_SESSION["ville"] = $ville;
		$_SESSION["telephone"] = $telephone;
		$_SESSION["permis"] = $permis;
		echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
	
	}
	 

?><div id="sous_menu_candidat_menu_droit">
			<ul>
				<a href="candidat_photo"><li>Photo</li></a>
				<a href="candidat_infos_perso"><li>Infos perso</li></a>
				<a href="candidat_infos_factu"><li>Infos facul</li></a>
				<a href="candidat_infos_pro"><li>Infos pro</li></a>
			</ul>
		</div>
		<div id="contenu_candidat_menu_droit">

<div id="candidat_infos_perso">
<form method="post" action="candidat_infos_perso">
<table width="500px" border="0">
<tbody>
	<tr>
		<td>Statut: <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin2" style="color:#000;">
				<div id="stage_sitebundle_candidattype_statut" class="txtLogin2">
					<input <?php if($_SESSION["statut"] == "celib"){ echo 'checked="checked"'; } ?> type="radio" id="stage_sitebundle_candidattype_statut_Célibataire" name="candidat_statut" required="required" value="celib"><label for="stage_sitebundle_candidattype_statut_Célibataire" class="required">Célibataire</label>
					<input <?php if($_SESSION["statut"] == "marie"){ echo 'checked="checked"'; } ?> type="radio" id="stage_sitebundle_candidattype_statut_Marié" name="candidat_statut" required="required" value="marie"><label for="stage_sitebundle_candidattype_statut_Marié" class=" required">Marié</label>
				</div>
			</div>
		</td>
	</tr>

	<tr>
		<td>Titre: <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin2" style="color:#000;">
				<div id="stage_sitebundle_candidattype_sexe" class="txtLogin2">
					<input <?php if($_SESSION["titre"] == "MME"){ echo 'checked="checked"'; } ?> type="radio" id="stage_sitebundle_candidattype_sexe_0" name="candidat_titre" required="required" value="MME"><label for="stage_sitebundle_candidattype_sexe_0" class=" required">Mme.</label>
					<input <?php if($_SESSION["titre"] == "MLLE"){ echo 'checked="checked"'; } ?> type="radio" id="stage_sitebundle_candidattype_sexe_1" name="candidat_titre" required="required" value="MLLE"><label for="stage_sitebundle_candidattype_sexe_1" class=" required">Mlle.</label>
					<input <?php if($_SESSION["titre"] == "M"){ echo 'checked="checked"'; } ?> type="radio" id="stage_sitebundle_candidattype_sexe_2" name="candidat_titre" required="required" value="M"><label for="stage_sitebundle_candidattype_sexe_2" class=" required">M.</label>
				</div>
			</div>
		</td>
	</tr>
	
	<tr>
		<td>Nom : <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin">
				<input type="text" value="<?php if(!empty($_SESSION["nom"])){ echo $_SESSION["nom"]; } ?>" id="stage_sitebundle_candidattype_nom" name="candidat_nom" required="required" maxlength="50" class="txtLogin" readonly>
			</div>
		</td>
	</tr>
	
	<tr>
		<td>Prénom: <span class="etoilePetite">*</span></td>
		<td>
		<div class="divLogin">
			<input type="text" value="<?php if(!empty($_SESSION["prenom"])){ echo $_SESSION["prenom"]; } ?>" id="stage_sitebundle_candidattype_prenom" name="candidat_prenom" required="required" maxlength="50" class="txtLogin" readonly>
		</div>
		</td>
	</tr>

	<tr>
	<td>Date de naissance: <span class="etoilePetite">*</span></td>
	<td>
		<select name="naissance_jour">
			<option>- Jour -</option>
			<?php 
			$jours = 1;
			while($jours <= 31){
				if($jours <= 9 && $jours >= 1){ $jours = "0".$jours; } 
				if($_SESSION["date_naissance"][2] == $jours){
					echo '<option selected="selected" value="'.$jours.'" disabled>'.$jours.'</option>';
				}else{
					echo '<option value="'.$jours.'" disabled>'.$jours.'</option>';
				}
				$jours++;
			}
			?>
		</select> 
		<select name="naissance_mois">
			 <option>- Mois -</option>
			<?php 
			$mois = 1;
			$les_mois = array("", "Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
			while($mois <= 12){
				if(ltrim($_SESSION["date_naissance"][1], "0") == $mois){
					echo '<option selected="selected" value="'.$mois.'" disabled>'.$les_mois[$mois].'</option>';
				}else{
					echo '<option value="'.$mois.'" disabled>'.$les_mois[$mois].'</option>';
				}
				$mois++; 
			}
			?>
		</select> 
		<select name="naissance_annee">
			<option>- Année -</option>
			<?php 
			$annee = 1940;
			while($annee <= 2011){
				if($_SESSION["date_naissance"][0] == $annee){
					echo '<option selected="selected" value="'.$annee.'" disabled>'.$annee.'</option>';
				}else{
					echo '<option value="'.$annee.'" disabled>'.$annee.'</option>';
				}
				$annee++;
			}
			?>
		</select>
</td>
</tr>
	<tr>
		<td>Adresse: <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin">
				<textarea id="stage_sitebundle_candidattype_adresse" name="candidat_adresse" required="required" class="txtLogin" style="color:#000;"><?php 
					if(!empty($_SESSION["adresse"])){
						echo $_SESSION["adresse"];
					}else{
						echo "Votre adresse";
					}
				?></textarea>
			</div>
		</td>
	</tr>
	
	<tr>
		<td>Ville: <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin2">
				<select id="stage_sitebundle_candidattype_ville" name="candidat_ville" required="required" class="txtLogin2">
				<?php
				$villes = array("Aïn Harrouda","Ben Yakhlef","Bouskoura","Casablanca","Médiouna","Mohammédia","Tit Mellil","Ben Yakhlef","Bejaâd","Ben Ahmed","Benslimane","Berrechid","Boujniba","Boulanouare","Bouznika","Deroua","El Borouj","El Gara","Guisser","Hattane","Khouribga","Loulad","Oued Zem","Oulad Abbou","Oulad H'Riz Sahel","Oulad M'rah","Oulad Saïd","Oulad Sidi Ben Daoud","Ras El Aïn","Settat","Sidi Rahhal Chataï","Soualem","Azemmour","Bir Jdid","Bouguedra","Echemmaia","El Jadida","Hrara","Ighoud","Jamâat Shaim","Jorf Lasfar","Khemis Zemamra","Laaounate","Moulay Abdallah","Oualidia","Oulad Amrane","Oulad Frej","Oulad Ghadbane","Safi","Sebt El Maârif","Sebt Gzoula","Sidi Ahmed","Sidi Ali Ban Hamdouche","Sidi Bennour","Sidi Bouzid","Sidi Smaïl","Youssoufia","Fès","Aïn Cheggag","Bhalil","Boulemane","El Menzel","Guigou","Imouzzer Kandar","Imouzzer Marmoucha","Missour","Moulay Yaâcoub","Ouled Tayeb","Outat El Haj","Ribate El Kheir","Séfrou","Skhinate","Tafajight","Arbaoua","Aïn Dorij","Dar Gueddari","Had Kourt","Jorf El Melha","Kénitra","Khenichet","Lalla Mimouna","Mechra Bel Ksiri","Mehdia","Moulay Bousselham","Sidi Allal Tazi","Sidi Kacem","Sidi Slimane","Sidi Taibi","Sidi Yahya El Gharb","Souk El Arbaa","Akka","Assa","Bouizakarne","El Ouatia","Es-Semara","Fam El Hisn","Foum Zguid","Guelmim","Taghjijt","Tan-Tan","Tata","Zag","Marrakech","Ait Daoud","Amizmiz","Assahrij","Aït Ourir","Ben Guerir","Chichaoua","El Hanchane","El Kelaâ des Sraghna","Essaouira","Fraïta","Ghmate","Ighounane","Imintanoute","Kattara","Lalla Takerkoust","Loudaya","Lâattaouia","Moulay Brahim","Mzouda","Ounagha","Sid L'Mokhtar","Sid Zouin","Sidi Abdallah Ghiat","Sidi Bou Othmane","Sidi Rahhal","Skhour Rehamna","Smimou","Tafetachte","Tahannaout","Talmest","Tamallalt","Tamanar","Tamansourt","Tameslouht","Tanalt","Zeubelemok","Meknès?","Khénifra","Agourai","Ain Taoujdate","MyAliCherif","Rissani","Amalou Ighriben","Aoufous","Arfoud","Azrou","Aïn Jemaa","Aïn Karma","Aïn Leuh","Aït Boubidmane","Aït Ishaq","Boudnib","Boufakrane","Boumia","El Hajeb","Elkbab","Er-Rich","Errachidia","Gardmit","Goulmima","Gourrama","Had Bouhssoussen","Haj Kaddour","Ifrane","Itzer","Jorf","Kehf Nsour","Kerrouchen","M'haya","M'rirt","Midelt","Moulay Ali Cherif","Moulay Bouazza","Moulay Idriss Zerhoun","Moussaoua","N'Zalat Bni Amar","Ouaoumana","Oued Ifrane","Sabaa Aiyoun","Sebt Jahjouh","Sidi Addi","Tichoute","Tighassaline","Tighza","Timahdite","Tinejdad","Tizguite","Toulal","Tounfite","Zaouia d'Ifrane","Zaïda","Ahfir","Aklim","Al Aroui","Aïn Bni Mathar","Aïn Erreggada","Ben Taïeb","Berkane","Bni Ansar","Bni Chiker","Bni Drar","Bni Tadjite","Bouanane","Bouarfa","Bouhdila","Dar El Kebdani","Debdou","Douar Kannine","Driouch","El Aïoun Sidi Mellouk","Farkhana","Figuig","Ihddaden","Jaâdar","Jerada","Kariat Arekmane","Kassita","Kerouna","Laâtamna","Madagh","Midar","Nador","Naima","Oued Heimer","Oujda","Ras El Ma","Saïdia","Selouane","Sidi Boubker","Sidi Slimane Echcharaa","Talsint","Taourirt","Tendrara","Tiztoutine","Touima","Touissit","Zaïo","Zeghanghane","Rabat","Salé","Ain El Aouda","Harhoura","Khémisset","Oulmès","Rommani","Sidi Allal El Bahraoui","Sidi Bouknadel","Skhirat","Tamesna","Témara","Tiddas","Tiflet","Touarga","Agadir","Agdz","Agni Izimmer","Aït Melloul","Alnif","Anzi","Aoulouz","Aourir","Arazane","Aït Baha","Aït Iaâza","Aït Yalla","Ben Sergao","Biougra","Boumalne-Dadès","Dcheira El Jihadia","Drargua","El Guerdane","Harte Lyamine","Ida Ougnidif","Ifri","Igdamen","Ighil n'Oumgoun","Imassine","Inezgane","Irherm","Kelaat-M'Gouna","Lakhsas","Lakhsass","Lqliâa","M'semrir","Massa (Maroc)","Megousse","Ouarzazate","Oulad Berhil","Oulad Teïma","Sarghine","Sidi Ifni","Skoura","Tabounte","Tafraout","Taghzout","Tagzen","Taliouine","Tamegroute","Tamraght","Tanoumrite Nkob Zagora","Taourirt ait zaghar","Taroudant","Temsia","Tifnit","Tisgdal","Tiznit","Toundoute","Zagora","Afourar","Aghbala","Azilal","Aït Majden","Beni Ayat","Béni Mellal","Bin elouidane","Bradia","Bzou","Dar Oulad Zidouh","Demnate","Dra'a","El Ksiba","Foum Jamaa","Fquih Ben Salah","Kasba Tadla","Ouaouizeght","Oulad Ayad","Oulad M'Barek","Oulad Yaich","Sidi Jaber","Souk Sebt Oulad Nemma","Zaouïat Cheikh","Tanger?","Tétouan?","Akchour","Assilah","Bab Berred","Bab Taza","Brikcha","Chefchaouen","Dar Bni Karrich","Dar Chaoui","Fnideq","Gueznaia","Jebha","Karia","Khémis Sahel","Ksar El Kébir","Larache","M'diq","Martil","Moqrisset","Oued Laou","Oued Rmel","Ouezzane","Point Cires","Sidi Lyamani","Sidi Mohamed ben Abdallah el-Raisuni","Zinat","Ajdir?","Aknoul?","Al Hoceïma?","Aït Hichem?","Bni Bouayach?","Bni Hadifa?","Ghafsai?","Guercif?","Imzouren?","Inahnahen?","Issaguen (Ketama)?","Karia (El Jadida)?","Karia Ba Mohamed?","Oued Amlil?","Oulad Zbair?","Tahla?","Tala Tazegwaght?","Tamassint?","Taounate?","Targuist?","Taza?","Taïnaste?","Thar Es-Souk?","Tissa?","Tizi Ouasli?","Laayoune?","El Marsa?","Tarfaya?","Boujdour?","Awsard","Oued-Eddahab");
				
				$numero_de_la_ville = 0;
				foreach($villes as $ville){ /* la fonction foreach nous donne tous les éléments d'un array */
					if($_SESSION["ville"] == $ville){
						echo '<option selected="selected" value="'.$ville.'">'.$ville.'</option>';
					}else{
						echo '<option value="'.$ville.'">'.$ville.'</option>';
					}
					$numero_de_la_ville++;
				}
				?>
					
				</select>
			</div>
		</td>
	</tr>

	<tr>
		<td>Téléphone: <span class="etoilePetite">*</span></td>
		<td>
			<div class="divLogin">
				<input type="text" id="stage_sitebundle_candidattype_tel" value="<?php if(!empty($_SESSION["telephone"])){ echo $_SESSION["telephone"]; } ?>" name="candidat_tel" required="required" maxlength="10" class="txtLogin" style="color:#000;">
			</div>
		</td>
	</tr>

	<tr>
		<td>E-mail: <span class="etoilePetite">*</span></td>
		<td>
		<div class="divLogin">
			<input type="email" id="stage_sitebundle_candidattype_email" value="<?php if(!empty($_SESSION["email"])){ echo $_SESSION["email"]; } ?>" name="candidat_email" required="required" class="txtLogin" readonly>
		</div>
		</td>
	</tr>

	<tr>
		<td>Permis: <span class="etoilePetite">*</span></td>
		<td>
		<div class="divLogin2">
			<select id="stage_sitebundle_candidattype_permis" name="candidat_permis" required="required" class="txtLogin2">
				<option value="1" <?php if($_SESSION["permis"] == "1"){ echo 'selected="selected"'; } ?>>Oui</option>
				<option value="0" <?php if($_SESSION["permis"] == "0"){ echo 'selected="selected"'; } ?>>Non</option>
			</select>
		</div>
	</tr>
	</tbody>
</table>

<div class="blocBtn">
	<input type="image" src="img/buttonSave.jpg" border="0px" class="btn">
</div>  

</form>
</div>