<html>
	<body>
		<?php
			function afficheContacts($pole){
				echo "<table><th><b>".$pole->intitule."</b></th>";
				if ($pole->fax != ""){ echo "<br/><br/><tr>".$pole->fax."</tr><br/>"; }
				foreach($pole as $contact){
					echo "<tr>";
					if ($contact->poste != ""){	echo "<i style='color:red;'>".$contact->poste."</i><br/>"; }
					foreach($contact as $personne){	echo $personne->prenom." ".$personne->nom."<br/>"; }
					if ($contact->fixe != ""){	echo $contact->fixe."<br/>"; }
					if ($contact->portable != ""){	echo $contact->portable."<br/>"; }
					echo "</tr><br/>";
				}
				echo "</table>";
			}
		
			$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
			foreach($xml as $pole1){
				afficheContacts($pole1);
				if (property_exists($pole1,'pole2')){
					foreach($pole1 as $pole2){
						afficheContacts($pole2);
					}
				}
			}
		?>
	</body>

</html>
