<?php
	function afficheContacts($pole){
		foreach($pole as $contact){
			echo "<p>";
			if ($contact->poste != ""){ echo "<b style='color:red;'>".$contact->poste."</b>"; }
			echo $contact->prenom." ".$contact->nom."<br/>";
			if ($contact->fixe != ""){ echo $contact->fixe."<br/>"; }
			if ($contact->portable != ""){ echo $contact->portable."<br/>"; }
			echo "</p><br/>";
		}
	}

	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	foreach($xml as $pole1){
		echo "<b>".$pole1->intitule."</b>";
		if ($pole1->fax != ""){ echo "<br/>".$pole1->fax."<br/>"; }
		afficheContacts($pole1);
		if (property_exists($pole1,'pole2')){
			foreach($pole1 as $pole2){
				echo "<b>".$pole2->intitule."</b><br/>";
				if ($pole2->fax != ""){ echo "<br/>".$pole2->fax."<br/>"; }
				afficheContacts($pole2);
			}
		}
	}
?>
