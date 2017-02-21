<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cv_enligne', 'root', ''); /* se connecter à mysql avec PDO on met le type d la bdd = mysql  le nom d lhost host=localhost et le nom de la bdd dbname=cv_enligne', le pseudo 'root', et le mot de pass'' et on est connecté a la bdd */
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>