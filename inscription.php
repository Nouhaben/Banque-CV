<div id="page_inscription">
    
        <table>
            <form method="post" action="traitement_inscrip.php">
            <tr>
                <td width="160"><p id="typemembre"><label>Vous êtes : </label></td>
                  <td><input checked="checked" type="radio" name="typemembre" value="Candidat" id="candidat" /><label for="candidat">Candidat</label>
                  <input type="radio" name="typemembre" value="Entreprise" id="entreprise"/><label for="entreprise">Recruteur</label>
             </tr>
        </table>
   <div id="membre_candidat">
        <table>
		<tr>
            <td><p id="civilite"><label>Civilité : </label></td>
              <td><input checked="checked" type="radio" name="civilite" value="M" />M.
              <input type="radio" name="civilite" value="Mlle" />Mlle
              <input type="radio" name="civilite" value="Mme" />Mme
            </p><td>
        </tr>

        <tr>
            <td><label>Nom : </label></td>
        	<td><input type="text" name="nom" placeholder="Votre nom" size=30><br/></td>
        </tr>
        <tr>
            <td><label>Prénom : </label></td>
        	<td><input type="text" name="prenom" placeholder="Votre prénom" size=30><br/></td>
        </tr>

        <tr>
            <td><label>E-mail : </label></td>
        	<td><input type="text" name="email" placeholder="Votre E-mail" size=30><br/></td>
        </tr>

        <tr>
            <td><label>Date de naissance </label>: </td>
        <td><select name="naissance_jour">
        		<option>- Jour -</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select> 
            <select name="naissance_mois">
                 <option>- Mois -</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select> 
        <select name="naissance_annee">
            <option>- Année -</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
            <option value="1979">1979</option>
            <option value="1978">1978</option>
            <option value="1977">1977</option>
            <option value="1976">1976</option>
            <option value="1975">1975</option>
            <option value="1974">1974</option>
            <option value="1973">1973</option>
            <option value="1972">1972</option>
            <option value="1971">1971</option>
            <option value="1970">1970</option>
            <option value="1969">1969</option>
            <option value="1968">1968</option>
            <option value="1967">1967</option>
            <option value="1966">1966</option>
            <option value="1965">1965</option>
            <option value="1964">1964</option>
            <option value="1963">1963</option>
            <option value="1962">1962</option>
            <option value="1961">1961</option>
            <option value="1960">1960</option>
            <option value="1959">1959</option>
            <option value="1958">1958</option>
            <option value="1957">1957</option>
            <option value="1956">1956</option>
            <option value="1955">1955</option>
            <option value="1954">1954</option>
            <option value="1953">1953</option>
            <option value="1952">1952</option>
            <option value="1951">1951</option>
            <option value="1950">1950</option>
            <option value="1949">1949</option>
            <option value="1948">1948</option>
            <option value="1947">1947</option>
            <option value="1946">1946</option>
            <option value="1945">1945</option>
            <option value="1944">1944</option>
            <option value="1943">1943</option>
            <option value="1942">1942</option>
            <option value="1941">1941</option>
            <option value="1940">1940</option>
        </select><br><td>
    </tr>
        <tr>
            <td><label>Mot de passe : </label></td>
        	<td><input type="password" name="passwordcandidat" placeholder="Votre Mot de passe" size=30><br></td>
        </tr>
        <tr>
            <td><label>Confirmation de passe : </label></td>
        	<td><input type="password" name="passwordcandidat_confirm" placeholder="Confirmation" size=30><br></td>
        </tr>
    </table>
</div>


<div id="membre_entreprise" style="display:none;">
    <table>
        <tr>
            <td><label>Raison social : </label></td>
            <td><input type="text" name="entreprise_raison_social" placeholder="Votre Raison social"><br/></td>
        </tr>
        <tr>
            <td><label>Secteur d'activité : </label></td>
            <td>
                <select name="entreprise_secteur"  required="required" class="txtLogin">
                    <option value="Industries/ Transport/ Automobile" selected="selected">Industries/ Transport/ Automobile</option>
                    <option value="Immobilier">Immobilier</option>
                    <option value="Energie/ Environnement">Energie/ Environnement</option>
                    <option value="Distribution/ Commerce">Distribution/ Commerce</option>
                    <option value="Construction BTP">Construction BTP</option>
                    <option value="Conseil/ Audit">Conseil/ Audit</option>
                    <option value="Banque/ Assurance/ Finance">Banque/ Assurance/ Finance</option>
                    <option value="Arts plastiques/ Cinéma/ Musique">Arts plastiques/ Cinéma/ Musique</option>
                    <option value="Informatique/ Télécom/ Internet">Informatique/ Télécom/ Internet</option>
                    <option value="Marketing/ Communication">Marketing/ Communication</option>
                    <option value="Média/ Presse/ Impression">Média/ Presse/ Impression</option>
                    <option value="Santé/ Médical/ Social/ Pharmacie">Santé/ Médical/ Social/ Pharmacie</option>
                    <option value="Services à la personne">Services à la personne</option>
                    <option value="Services aux entreprises/ collectivités<">Services aux entreprises/ collectivités</option><option value="Services publics/ Administrations</option">Services publics/ Administrations</option><option value="Tourisme/ Restauration/ Hôtellerie">Tourisme/ Restauration/ Hôtellerie</option>
                    <option value="Formation/ Education">Formation/ Education</option>
                    <option value="Autre">Autre</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label>Ville siège social : </label></td>
            <td><input type="text" name="entreprise_ville" placeholder="Votre siège social" ><br/></td>
        </tr>

        <tr class="nonAnonymeBloc">
            <td>Tél:</td>
            <td>
                <div>
                    <input type="text" name="entreprise_tel" placeholder="Votre Téléphone">
                </div>
            </td>
        </tr>
        <tr>
            <td>Fax:</td>
            <td>
                <div>
                    <input type="text" name="entreprise_fax"  placeholder="Votre Fax">
                </div>
            </td>
        </tr>
        <tr>
            <td>E-mail du contact:</td>
            <td>
                <div>
                  <input type="text" name="entreprise_email"  placeholder="Votre E-mail">
              </div>
          </td>
      </tr>
      <tr>
        <td><label>Mot de passe : </label></td>
        <td><input type="password" name="password" placeholder="Votre Mot de passe" size=30><br></td>
    </tr>
    <tr>
        <td><label>Confirmation de passe : </label></td>
        <td><input type="password" name="password_confirm" placeholder="Confirmation" size=30><br></td>
    </tr>

</table>
</div>
<input type="submit" value="Envoyer">
</form>
</div>