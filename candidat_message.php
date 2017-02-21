<br><br><span class="titre2">Vos messages</span><br><br>
<?php

$id = $_SESSION["id"];
$req = $bdd->query("SELECT * FROM message_candidat WHERE id_candidat = $id");
while ($message = $req->fetch()) {
?>
<div style="border:2px solid;margin:10px auto;padding:10px;width:80%;">
	<h4>Message envoyé par : <a href="infos-entreprise-<?php echo $message["id_emeteur"]; ?>"><?php echo $message["emeteur"]; ?></a></h4>
	<h4>Message envoyé le : <?php echo $message["date_message"]; ?></h4>
	<h4>Sujet : <?php echo $message["sujet"]; ?></h4>
	<h4>son message :</h4> 
	<span style="padding:10px;"><?php echo $message["message"]; ?></span>
	</div>
   
</fieldset>
<?php } ?>