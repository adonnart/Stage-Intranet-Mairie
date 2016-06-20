{source}<?php
	
	//Chargement
	$file = 'annuaire/test-v3.xml';
	$dom = new DOMDocument('1.0');
	$dom -> preserveWhiteSpace = false;
	$dom -> load($file);
	$dom -> validate();
	echo "Fichier ouvert.<br/>";
	
	$poste	= "none";
	$nom	= "Crèche";
	$port	= "02 98 00 00 00";
	$fixe	= "736";
	
	$idPole = "Jeunesse";
	
	$contact = $dom -> createElement('contact');
	
	/*if ($poste != "") { */$contact -> appendChild($dom -> createElement('poste',$poste));// }
	/*if ($nom != "") { */$contact -> appendChild($dom -> createElement('nom',$nom));// }
	/*if ($port != "") { */$contact -> appendChild($dom -> createElement('port',$port));// }
	/*if ($fixe != "") { */$contact -> appendChild($dom -> createElement('fixe',$fixe));// }

	$ids = $dom -> getElementsByTagName('id');
	
	echo "<br/>Pôle recherché : ".$idPole."<br/>";
	
	$cpt = 0;
/*
	foreach($ids as $id){
		$tmp = $ids -> item($cpt) -> nodeValue;
		if ($tmp == $idPole) {
			$pole = $ids -> item($cpt) -> parentNode;
			//var_dump($pole);
			echo "<br/>Contact créé.<br/>";
		}
		echo $cpt."<br/>".$tmp;
		$cpt++;
	}
*/
	$check = 0;
	
	while ($check == 0) {
		$tmp = $ids -> item($cpt) -> nodeValue;
		echo $cpt." - ".$tmp."<br/>";
		if ($tmp == $idPole) {
			$pole = $ids -> item($cpt) -> parentNode;
			//var_dump($pole);
			$check = 1;
			echo "<br/>Contact créé.<br/>";
		}
		$cpt++;
	}
	
	$pole -> appendChild($contact);

	//Sauvegarde
	$dom->formatOutput = true;
	$dom->normalizeDocument();
	$dom -> save($file);
	echo "<br/>Sauvegarde effectuée.<br/>";

?>{/source}
