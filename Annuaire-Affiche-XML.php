<?php
	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	foreach($xml->children() as $pole){
		echo "<b>".$pole->intitule."</b><br/>";
		if ($contact->fax != ""){ echo $contact->fax."<br/>"; }
		foreach($pole as $contact){
			if ($contact->poste != ""){ echo $contact->poste."<br/>"; }
			echo $contact->prenom." ".$contact->nom."<br/>";
			if ($contact->fixe != ""){ echo $contact->fixe."<br/>"; }
			if ($contact->portable != ""){ echo $contact->portable."<br/>"; }
			
			foreach($pole1->children() as $pole){
				echo "<b>".$pole->intitule."</b><br/>";
				if ($contact->fax != ""){ echo $contact->fax."<br/>"; }
				foreach($pole as $contact){
					if ($contact->poste != ""){ echo $contact->poste."<br/>"; }
					echo $contact->prenom." ".$contact->nom."<br/>";
					if ($contact->fixe != ""){ echo $contact->fixe."<br/>"; }
					if ($contact->portable != ""){ echo $contact->portable."<br/>"; }
				}
			}
		}
		echo "<br/>";
	}
?>
