<?php
	function afficheContact(){
		if ($contact->poste != ""){ echo "<p style='color:red;'>".$contact->poste."</p>"; }
		echo $contact->prenom." ".$contact->nom."<br/>";
		if ($contact->fixe != ""){ echo $contact->fixe."<br/>"; }
		if ($contact->portable != ""){ echo $contact->portable."<br/>"; }
		echo "<br/>";
	}

	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	foreach($xml as $pole1){
		echo "<b>".$pole1->intitule."</b>";
		if ($pole1->fax != ""){ echo $pole1->fax."<br/>"; }
		foreach($pole1 as $contact){
			afficheContact()
		}
		if (property_exists($pole1,'pole2')){
			foreach($pole1 as $pole2){
				echo "<b>".$pole2->intitule."</b><br/>";
				if ($pole2->fax != ""){ echo $pole2->fax."<br/>"; }
				foreach($pole2 as $contact){
					afficheContact()	
				}
			}
		}
	}
?>
