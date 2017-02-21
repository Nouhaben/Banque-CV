<?php
	$passactuel = isset($_POST['passactuel']) ? sha1(filter_input(INPUT_POST,'passactuel',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$nouveaupass = isset($_POST['nouveaupass']) ? sha1(filter_input(INPUT_POST,'nouveaupass',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;
	$confirmerpass = isset($_POST['confirmerpass']) ? sha1(filter_input(INPUT_POST,'confirmerpass',FILTER_SANITIZE_FULL_SPECIAL_CHARS)) : false;

if(isset($_POST['passactuel']) && isset($_POST['nouveaupass']) && isset($_POST['confirmerpass'])){
	if($passactuel == $_SESSION["entreprise_password"] && $nouveaupass == $confirmerpass){
		$req = $bdd->prepare('UPDATE entreprise SET entreprise_password = :pass WHERE id = :nom');
		$req->execute(array("pass" => $nouveaupass, "nom" => $_SESSION["entreprise_id"]));
		echo '<script type="text/javascript">alert("Votre mot de pass à bien été changé");</script>';
	}else{
		echo '<script type="text/javascript">alert("Le mot de pass ne correspond pas");</script>';

	}
}
?><div id="parametrescompte">
<h2 style="color:#E57400;">Paramétres de compte</h2>
	<table>
		<tr>
		<td>Votre e-mail : </td>
		<td>
			<div class="divLogin">
				<input type="text" value="<?php echo $_SESSION["entreprise_email"]; ?>" id="stage_sitebundle_candidattype_nom" name="candidat_nom"  class="txtLogin" readonly="readonly" style="background-image: none; background-position: 0% 0%; background-repeat: repeat repeat;padding:0 10px;">
			</div>
		</td>
	</tr>
	</table>
	
<h2 style="color:#E57400;">Changer votre mot de pass</h2>
<form method="post">
<table>
		<tr>
			<td>Votre pass actual : </td>
			<td>
				<div class="divLogin">
					<input type="password"name="passactuel"  class="txtLogin" style="background-image: none; background-position: 0% 0%; background-repeat: repeat repeat;padding:0 10px;">
				</div>
			</td>
		</tr>

		<tr>
			<td>Nouveau pass : </td>
			<td>
				<div class="divLogin">
					<input type="password"name="nouveaupass" class="txtLogin" style="background-image: none; background-position: 0% 0%; background-repeat: repeat repeat;padding:0 10px;">
				</div>
			</td>
		</tr>

		<tr>
			<td>Confirmer pass :</td>
			<td>
				<div class="divLogin">
					<input type="password"name="confirmerpass" class="txtLogin" style="background-image: none; background-position: 0% 0%; background-repeat: repeat repeat;padding:0 10px;">
				</div>
			</td>
		</tr>
	</table>

	<input type="submit" value="Enregistrer">
</form>

</div>