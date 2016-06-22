{source}<?php

	$file = 'annuaire/test-v3.xml';
	
	$dom = new DOMDocument('1.0');
	$dom -> preserveWhiteSpace = false;
	$dom -> load($file);
	$dom -> validate();
	echo "Fichier ouvert.<br/>";
	
	$idPole = "Jeunesse";
	$poste	= "";
	$nom	= "truc";
	$port	= "";
	$fixe	= "02 98 11 11 11";
	
	$contact = $dom -> createElement('contact');
	
	if ($poste != ""){ $contact -> appendChild($dom -> createElement('poste',$poste)); }
	if ($nom != "")	 { $contact -> appendChild($dom -> createElement('nom',$nom)); }
	if ($port != "") { $contact -> appendChild($dom -> createElement('port',$port)); }
	if ($fixe != "") { $contact -> appendChild($dom -> createElement('fixe',$fixe)); }

	$ids = $dom -> getElementsByTagName('id');
	
	echo "<br/>Pôle recherché : ".$idPole."<br/><br/>";
	
	$cpt = 0;
	$check = 0;
	
	while ($check == 0) {
		$tmp = $ids -> item($cpt) -> nodeValue;
		if ($cpt < 10) { echo "0"; }
		echo $cpt." - ".$tmp."<br/>";
		if ($tmp == $idPole) {
			$pole = $ids -> item($cpt) -> parentNode;
			$check = 1;
			echo "<br/>Contact créé.<br/>";
		}
		$cpt++;
	}
	
	$pole -> appendChild($contact);

	$dom->formatOutput = true;
	$dom->normalizeDocument();
	$dom -> save($file);
	echo "<br/>Sauvegarde effectuée.<br/>";

?>{/source}
