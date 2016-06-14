<html><head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" /></head><body>
<?php
	function afficheContacts($pole){
		echo "<caption>".$pole->intitule."</caption>";
		if (!empty($pole->fax)){ echo "<tr><td>".$pole->fax."</td></tr>"; }
		foreach($pole as $contact){
			echo "<tr>";
			if (!empty($contact->poste)){	echo "<td><i>".$contact->poste."</i></td>"; }
			foreach($contact as $personne){
				echo "<td>";
				if (!empty($contact->personne)){ echo $personne->prenom." ".$personne->nom." "; }
				echo "</td>";
			}
			if (!empty($contact->fixe)){ echo "<td>".$contact->fixe."</td>"; }
			if (!empty($contact->portable)){ echo "<td>".$contact->portable."</td>"; }
			echo "</tr>";
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
