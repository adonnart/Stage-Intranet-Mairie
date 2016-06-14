{source}
<html><head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" /></head><body>
<?php
	function afficheContacts($pole){
		echo "<th colspan=10>".$pole->intitule;
		if (!empty($pole->fax)){ echo "<i>".$pole->fax."</i>"; }
		echo "</th>";
		foreach($pole as $contact){
			if (!empty($contact->personne)){
				echo "<tr>";
				echo "<td>";
				foreach($contact as $personne){
					if (!empty($personne->nom)){ echo $personne->prenom." ".$personne->nom; }
				}
				if (!empty($contact->poste)){ echo " - <i>".$contact->poste."</i>"; }
				echo "</td>";
				/*if (!empty($contact->fixe)){ */echo "<td>".$contact->fixe."</td>";/* }*/
				/*if (!empty($contact->portable)){ */echo "<td>".$contact->portable."</td>";/* }*/
				echo "</tr>";
			}
		}
	}
	
	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	
	foreach($xml as $pole1){
		echo "<br/><table>";
		afficheContacts($pole1);
		foreach($pole1 as $pole2){
			if (!empty($pole1->pole2)){
				afficheContacts($pole2);
			}
		}
		echo "</table><br/>";
	}
?></body></html>
{/source}
