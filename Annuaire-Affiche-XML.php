<?php
	$xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Fichier introuvable.");
	foreach($xml as $pole){
		echo $pole->intitule;
		foreach($pole as $contact){
			echo $contact->poste."<br/>";
			echo $contact->prenom." ".$contact->nom."<br/>";
			echo $contact->fixe."<br/>";
			echo $contact->portable."<br/>";
		}
		echo $pole->fax."<br/>";
	}
?>
