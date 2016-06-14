<?php
	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	foreach($xml as $pole){
		echo "<b>".$pole->intitule."</b><br/>";
		foreach($pole as $contact){
			if ($contact->poste != "") { echo $contact->poste."<br/>"; }
			echo $contact->prenom." ".$contact->nom."<br/>";
			if ($contact->fixe != "") { echo $contact->fixe."<br/>"; }
			if ($contact->portable != "") { echo $contact->portable."<br/>"; }
		}
		if ($contact->fax != "") { echo $contact->fax."<br/>"; }
		echo "<br/>";
	}
?>
