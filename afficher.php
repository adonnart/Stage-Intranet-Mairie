{source}
<html>
<head><title>Annuaire</title><link rel="stylesheet" content="text/css" href="annuaire/annuaire.css" /></head>
<body><div class='colonnes'>
<?php
	function afficheContacts($pole){
		foreach($pole as $contact){
			if (!empty($contact->personne)){
				echo "<tr>";
				
				if (!empty($contact->portable)){ echo "<td class='pers'>"; }
				else { echo "<td class='pers' colspan=2>"; }
				
				foreach($contact as $personne){
					if (!empty($personne->nom)){ echo $personne->prenom." ".$personne->nom." - "; }
				}
				
				if (!empty($contact->poste)){ echo " - <i>".$contact->poste."</i>"; }
				echo "</td>";
				
				if (!empty($contact->portable)){ echo "<td class='num'>".$contact->portable."</td>"; }
				if (!empty($contact->fixe)){ echo "<td class='num'>".$contact->fixe."</td>"; }
				
				echo "</tr>";
			}
		}
	}
	
	$file = 'annuaire/annuaire.xml';
	$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
	
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
