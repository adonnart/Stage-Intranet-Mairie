{source}
<html>
<head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" /></head>
<body><div class='colonnes'>
<?php
	$file = 'Annuaire/Annuaire-XML.xml';
	$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
	
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
				
				if (!empty($contact->portable)){ echo "<td class='port'>".$contact->portable."</td>"; }
				if (!empty($contact->fixe)){
					if (strlen($contact->fixe)<=3){ echo "<td class='fixe'>".$contact->fixe; }
					else { echo "<td class='port'>".$contact->fixe; }
				}
				
				echo "</td></tr>";
			}
		}
	}
	
	foreach($xml as $pole1){
		echo "<br/><br/><table>";
		if (!empty($pole1->intitule)){
			echo "<tr><th colspan=3 class='pole1'>".$pole1->intitule;
			if (!empty($pole1->fax)){ echo " - <i>Fax : ".$pole1->fax."</i>"; }
			echo "</th></tr>";
		}
		afficheContacts($pole1);
		foreach($pole1 as $pole2){
			if (!empty($pole1->pole2)){
				if (!empty($pole2->intitule)){
					echo "<tr><th colspan=3 class='pole2'>".$pole2->intitule;
					if (!empty($pole2->fax)){ echo " - <i>Fax : ".$pole2->fax."</i>"; }
					echo "</th></tr>";
				}
				afficheContacts($pole2);
			}
		}
		echo "</table>";
	}
?></div></body></html>
{/source}
