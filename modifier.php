{source}
<html>
<head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" /></head>
<body>
<?php
function afficheContacts($pole){
	foreach($pole as $contact){
		if (!empty($contact->personne)){
			echo "<tr>";
			
			if (!empty($contact->portable)){ echo "<td class='pers'>"; }
			else { echo "<td class='pers' colspan=2>"; }
			
			foreach($contact as $personne){
				if (!empty($personne->nom)){ echo $personne->prenom." ".$personne->nom; }
			}
			
			if (!empty($contact->poste)){ echo " - <i>".$contact->poste."</i>"; }
			echo "</td>";
			/*
			foreach($contact as $numeros){
				//if (!empty($contact->portable)){ echo "<td class='port'>".$contact->portable."</td>"; }
				if (!empty($numeros->num)){
					echo "<td class='port'>".$numeros->num;
					if (strlen($contact->numero)<=3){
						echo "<td class='fixe'>".$contact->numero;
					}else{
						echo "<td class='port'>".$contact->numero;
					}
					echo "</td>";
				}
			}
			*/
			//foreach($contact as $numero){ echo "<td class='num'>".$contact->numero."</td>"; }
			
			if (!empty($contact->portable)){ echo "<td class='num'>".$contact->portable."</td>"; }
			if (!empty($contact->fixe)){ echo "<td class='num'>".$contact->fixe."</td>"; }
			
			echo "</tr>";
		}
	}
}

$file = 'Annuaire/Annuaire-XML.xml';
$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
?>
<!--<div class="bouton" align="right"><form action="Annuaire/modifier.php" method="get">
<input class="modifier" type="submit" value="Modifier" /></form></div>-->
<div class='colonnes'>
<?php
foreach($xml as $pole1){
	echo "<table>";
	if (!empty($pole1->intitule)){ echo "<tr><th colspan=3 class='pole1'>".$pole1->intitule."</th></tr>"; }
	afficheContacts($pole1);
	foreach($pole1 as $pole2){
		if (!empty($pole1->pole2)){
			if (!empty($pole2->intitule)){
				echo "<tr><th colspan=";
				if (!empty($pole2->fax)){ echo "2"; }else{ echo "3"; }
				echo " class='pole2'>".$pole2->intitule."</th>";
				if (!empty($pole2->fax)){ echo "<td class='pole2'>".$pole2->fax."</td>"; }
				echo "</tr>";
			}
			afficheContacts($pole2);
		}
	}
	echo "</table>";
}
?>
</div></body></html>
{/source}

<html>
	<head></head>
	<body>
		<form action="afficheContacts.php" method="get">
			<select size="1" id="combo">
  				<optgroup label="Elus municipaux">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Adjoints et conseillers délégués">
    					<option value="url_21">Lien 1</option>
    					<option value="url_22">Lien 2</option>
    					<option value="url_23">Lien 3</option>
  				</optgroup>
  				<optgroup label="Pôle Direction Générale">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Pôle Finances Administration Générale">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Catégorie 1">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
			</select>
			<input type="submit" value="Ok"/>
		</form>
		<br/><br/>
		<form action="modifContacts.php" method="get">
			<input type="submit" value="Modifier"/>
		</form>
	</body>
</html>
