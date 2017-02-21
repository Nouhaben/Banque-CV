<br><br><span class="titre2">Vos messages</span><br><br>
<?php

$id_entreprise = $_SESSION["entreprise_id"];
$req = $bdd->query("SELECT * FROM message_entreprise WHERE id_entreprise = $id_entreprise");
while ($message = $req->fetch()) {
?>
<div style="border:2px solid;margin:10px auto;padding:10px;width:80%;">
	<h4>Message envoyé par : <a href="infos-entreprise-<?php echo $message["id_emeteur"]; ?>"><?php echo $message["emeteur"]; ?></a></h4>
	<h4>Message envoyé le : <?php echo $message["date_message"]; ?></h4>
	<h4>Concernant l'offre : <?php echo $message["titre_offre"]; ?></h4>
	<h4>Son message : </h4>
	<span style="padding:10px;"><?php echo $message["message"]; ?></span>
</div>

<?php } ?>