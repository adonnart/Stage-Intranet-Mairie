{source}
<html><head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" /></head><body>
<?php
	function afficheContacts($pole){
		echo "<tr><th colspan=3>".$pole->intitule;
		if (!empty($pole->fax)){ echo " - <i>Fax : ".$pole->fax."</i>"; }
		echo "</th></tr>";
		foreach($pole as $contact){
			if (!empty($contact->personne)){
				echo "<tr>";
				if (!empty($contact->portable)){
					echo "<td class='pers'>";
				}else{
					echo "<td class='pers' colspan=2>";
				}
				foreach($contact as $personne){
					if (!empty($personne->nom)){ echo $personne->prenom." ".$personne->nom; }
				}
				if (!empty($contact->poste)){ echo " - <i>".$contact->poste."</i>"; }
				echo "</td>";
				/*
				if ((!empty($contact->fixe)) and (empty($contact->portable))){
					echo "<td class='fixe'>".$contact->fixe."</td>";
				}else if ((empty($contact->fixe)) and (!empty($contact->portable))){
					echo "<td class='portable'>".$contact->portable."</td>";
				}else{
					echo "<td class='portable'>".$contact->portable.
					"</td><td class='fixe'>".$contact->fixe."</td>";
				}
				echo "<td class='num'>";
				if ((!empty($contact->fixe)) and (empty($contact->portable))){
					echo $contact->fixe."</td>";
				}else if ((empty($contact->fixe)) and (!empty($contact->portable))){
					echo $contact->portable."</td>";
				}else{
					echo $contact->portable."</td><td class='num'>".$contact->fixe."</td>";
				}
				*/
				if (!empty($contact->portable)){ echo "<td class='port'>".$contact->portable."</td>"; }
				if (!empty($contact->fixe)){
					if (strlen($contact->fixe)<=3){ echo "<td class='fixe'>".$contact->fixe; }
					else { echo "<td class='portable'>".$contact->fixe; }
				}
				echo "</td></tr>";
			}
		}
	}
	
	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	
	foreach($xml as $pole1){
		echo "<br/><br/><table>";
		afficheContacts($pole1);
		foreach($pole1 as $pole2){
			if (!empty($pole1->pole2)){
				afficheContacts($pole2);
			}
		}
		echo "</table>";
	}
?></body></html>
{/source}
