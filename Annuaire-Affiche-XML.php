<html>
	<head>
		<title>Annuaire</title>
		<link rel="stylesheet" content="text/css" href="Annuaire/Annuaire-XML.css" />
	</head>
	<body>
	<?php
		function afficheContacts($pole){
			echo "<tr><b>".$pole->intitule."</b></tr>";
			if ($pole->fax != ""){ echo "<br/><br/><tr>".$pole->fax."</tr><br/>"; }
			foreach($pole as $contact){
				echo "<tr>";
				if ($contact->poste != "")	echo "<td><i>".$contact->poste."</i></td>"; }
				foreach($contact as $personne){	echo "<td>" $personne->prenom." ".$personne->nom."</td>"; }
				if ($contact->fixe != ""){	echo "<td>" $contact->fixe."</td>"; }
				if ($contact->portable != ""){	echo "<td>" $contact->portable."</td>"; }
				echo "</tr>";
			}
			//echo "</tr>";
		}
	
		$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
		echo "<table>";
		foreach($xml as $pole1){
			afficheContacts($pole1);
			if (property_exists($pole1,'pole2')){
				foreach($pole1 as $pole2){
					afficheContacts($pole2);
				}
			}
		}
		echo "</table>";
	?>
	</body>
</html>
