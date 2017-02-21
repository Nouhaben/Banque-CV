<?php
    $entreprise_raison_social = isset($_POST['entreprise_raison_social']) ? filter_input(INPUT_POST,'entreprise_raison_social',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_secteur = isset($_POST['entreprise_secteur']) ? filter_input(INPUT_POST,'entreprise_secteur',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_ville = isset($_POST['entreprise_ville']) ? filter_input(INPUT_POST,'entreprise_ville',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;
    $entreprise_tel = isset($_POST['entreprise_tel']) ? filter_input(INPUT_POST,'entreprise_tel',FILTER_SANITIZE_NUMBER_INT) : false;
    $entreprise_fax = isset($_POST['entreprise_fax']) ? filter_input(INPUT_POST,'entreprise_fax',FILTER_SANITIZE_NUMBER_INT) : false;
    $entreprise_email = isset($_POST['entreprise_email']) ? filter_input(INPUT_POST,'entreprise_email',FILTER_VALIDATE_EMAIL) : false;
    $description_entreprise = isset($_POST['description_entreprise']) ? filter_input(INPUT_POST,'description_entreprise',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : false;

    if($entreprise_raison_social && $entreprise_secteur && $entreprise_ville && $entreprise_tel && $entreprise_fax && $description_entreprise){
        $req = $bdd->prepare('UPDATE entreprise SET entreprise_raison_social = :entreprise_raison_social, entreprise_secteur = :entreprise_secteur, entreprise_ville = :entreprise_ville, entreprise_tel = :entreprise_tel, entreprise_fax = :entreprise_fax, description_entreprise = :description_entreprise WHERE entreprise_email = :entreprise_email');
        $req->execute(array("entreprise_raison_social" => $entreprise_raison_social, "entreprise_secteur" => $entreprise_secteur, "entreprise_ville" => $entreprise_ville, "entreprise_tel" => $entreprise_tel, "entreprise_fax" => $entreprise_fax, "description_entreprise" => $description_entreprise, "entreprise_email" => $_SESSION["entreprise_email"]));

    $_SESSION["entreprise_raison_social"] = $entreprise_raison_social; 
    $_SESSION["entreprise_secteur"] = $entreprise_secteur; 
    $_SESSION["entreprise_ville"] = $entreprise_ville; 
    $_SESSION["entreprise_tel"] = $entreprise_tel; 
    $_SESSION["entreprise_fax"] = $entreprise_fax; 
    $_SESSION["entreprise_email"] = $entreprise_email; 
    $_SESSION["description_entreprise"] = $description_entreprise;

      echo '<script type="text/javascript">alert("Vos modifitions ont bien été changés");</script>';
    }

?><div class="coloneRight">
    <div class="blocLeft">
     <span class="titre">INFORMATIONS DE CONTACT</span>
        <form method="post">
            <table width="490" border="0">
                <tbody>
                <tr class="nonAnonymeBloc" style="display: table-row;">
                    <td>Raison social :</td>
                    <td>
                        <div class="divLogin">
                            <input style="color:#000;" value="<?php echo $_SESSION["entreprise_raison_social"]; ?>" type="text" name="entreprise_raison_social" class="txtLogin" required="required" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Secteur d'activité :</td>
                    <td>
                        <div class="divLogin"  style="color:#000;">
                            <select  style="color:#000;" name="entreprise_secteur"  required="required" class="txtLogin">
                                <option  style="color:#000;" value="Industries/ Transport/ Automobile" <?php if($_SESSION['entreprise_secteur'] == 'Industries/ Transport/ Automobile'){ echo 'selected="selected"';} ?>>Industries/ Transport/ Automobile</option>
                                <option  style="color:#000;" value="Immobilier" <?php if($_SESSION['entreprise_secteur'] == 'Immobilier'){ echo 'selected="selected"';} ?>>Immobilier</option>
                                <option  style="color:#000;" value="Energie/ Environnement" <?php if($_SESSION['entreprise_secteur'] == 'Energie/ Environnement'){ echo 'selected="selected"';} ?>>Energie/ Environnement</option>
                                <option  style="color:#000;" value="Distribution/ Commerce" <?php if($_SESSION['entreprise_secteur'] == 'Distribution/ Commerce'){ echo 'selected="selected"';} ?>>Distribution/ Commerce</option>
                                <option  style="color:#000;" value="Construction BTP" <?php if($_SESSION['entreprise_secteur'] == 'Construction BTP'){ echo 'selected="selected"';} ?>>Construction BTP</option>
                                <option  style="color:#000;" value="Conseil/ Audit" <?php if($_SESSION['entreprise_secteur'] == 'Conseil/ Audit'){ echo 'selected="selected"';} ?>>Conseil/ Audit</option>
                                <option  style="color:#000;" value="Banque/ Assurance/ Finance" <?php if($_SESSION['entreprise_secteur'] == 'Banque/ Assurance/ Finance'){ echo 'selected="selected"';} ?>>Banque/ Assurance/ Finance</option>
                                <option  style="color:#000;" value="Arts plastiques/ Cinéma/ Musique" <?php if($_SESSION['entreprise_secteur'] == 'Arts plastiques/ Cinéma/ Musique'){ echo 'selected="selected"';} ?>>Arts plastiques/ Cinéma/ Musique</option>
                                <option  style="color:#000;" value="Informatique/ Télécom/ Internet" <?php if($_SESSION['entreprise_secteur'] == 'Informatique/ Télécom/ Internet'){ echo 'selected="selected"';} ?>>Informatique/ Télécom/ Internet</option>
                                <option  style="color:#000;" value="Marketing/ Communication" <?php if($_SESSION['entreprise_secteur'] == 'Marketing/ Communication'){ echo 'selected="selected"';} ?>>Marketing/ Communication</option>
                                <option  style="color:#000;" value="Média/ Presse/ Impression" <?php if($_SESSION['entreprise_secteur'] == 'Média/ Presse/ Impression'){ echo 'selected="selected"';} ?>>Média/ Presse/ Impression</option>
                                <option  style="color:#000;" value="Santé/ Médical/ Social/ Pharmacie" <?php if($_SESSION['entreprise_secteur'] == 'Santé/ Médical/ Social/ Pharmacie'){ echo 'selected="selected"';} ?>>Santé/ Médical/ Social/ Pharmacie</option>
                                <option  style="color:#000;" value="Services à la personne" <?php if($_SESSION['entreprise_secteur'] == 'Services à la personne'){ echo 'selected="selected"';} ?>>Services à la personne</option>
                                <option  style="color:#000;" value="Services aux entreprises/ collectivités<" <?php if($_SESSION['entreprise_secteur'] == 'Services aux entreprises/ collectivités'){ echo 'selected="selected"';} ?>>Services aux entreprises/ collectivités</option>
                                <option  style="color:#000;" value="Services publics/ Administrations" <?php if($_SESSION['entreprise_secteur'] == 'Services publics/ Administrations'){ echo 'selected="selected"';} ?>>Services publics/ Administrations</option>
                                <option  style="color:#000;" value="Tourisme/ Restauration/ Hôtellerie" <?php if($_SESSION['entreprise_secteur'] == 'Tourisme/ Restauration/ Hôtellerie'){ echo 'selected="selected"';} ?>>Tourisme/ Restauration/ Hôtellerie</option>
                                <option  style="color:#000;" value="Formation/ Education" <?php if($_SESSION['entreprise_secteur'] == 'Formation/ Education'){ echo 'selected="selected"';} ?>>Formation/ Education</option>
                                <option  style="color:#000;" value="Autre" <?php if($_SESSION['entreprise_secteur'] == 'Autre'){ echo 'selected="selected"';} ?>>Autre</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="nonAnonymeBloc" style="display: table-row;">
                    <td>Ville siège social :</td>
                    <td>
                        <div class="divLogin">
                            <input  style="color:#000;" required="required" value="<?php echo $_SESSION["entreprise_ville"]; ?>" type="text" name="entreprise_ville"  class="txtLogin" >
                        </div>
                    </td>
                </tr>
                <tr class="nonAnonymeBloc" style="display: table-row;">
                    <td>Tél:</td>
                    <td>
                        <div class="divLogin">
                            <input  style="color:#000;" required="required" type="text" name="entreprise_tel" class="txtLogin" value="<?php echo $_SESSION["entreprise_tel"]; ?>">
                        </div>
                    </td>
                </tr>
                <tr class="nonAnonymeBloc" style="display: table-row;">
                    <td>Fax:</td>
                    <td>
                        <div class="divLogin">
                            <input  style="color:#000;" required="required" type="text" name="entreprise_fax"  class="txtLogin" value="<?php echo $_SESSION["entreprise_fax"]; ?>">
                        </div>
                    </td>
                </tr>
                <tr class="nonAnonymeBloc" style="display: table-row;">
                    <td>E-mail du contact:</td>
                    <td>
                        <div class="divLogin">
                          <input required="required" type="text" name="entreprise_email"  class="txtLogin" value="<?php echo $_SESSION["entreprise_email"]; ?>" readonly>
                      </div>
                  </td>
              </tr>
        </tbody>
    </table>
        <span class="titre">DESCRIPTION DE L'ENTREPRISE</span>
        <textarea name="description_entreprise" required="required" class="txtDesc" style="width:100%;height:200px;margin-bottom:10px;color:#000;"><?php echo $_SESSION["description_entreprise"]; ?></textarea>
        <br>
            <input type="submit" value="Enregistrer">


    </form></div>       
    




</div>