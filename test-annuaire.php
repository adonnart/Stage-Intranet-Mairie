{source}<?php
	
	echo "Modification de l'annuaire...<br/>";
	
	$file = 'annuaire/test.xml';
	$dom = new DOMDocument();
	$dom -> load($file);
	$dom -> validate();
	
	echo "<br/>Fichier ouvert.<br/>";
	
	$poste = "none";
	$nom = "Crèche";
	$port = "02 98 00 00 00";
	$fixe = "736";
	
	$idPole = "Jeunesse";
	
	$contact = $dom -> createElement('contact');
	
	/*if ($poste != "") { */$contact -> appendChild($dom -> createElement('poste',$poste));// }
	/*if ($nom != "") { */$contact -> appendChild($dom -> createElement('nom',$nom));// }
	/*if ($port != "") { */$contact -> appendChild($dom -> createElement('port',$port));// }
	/*if ($fixe != "") { */$contact -> appendChild($dom -> createElement('fixe',$fixe));// }

	$ids = $dom -> getElementsByTagName('id');
	
	$cpt = 0;
	foreach($ids as $id){
		$tmp = $ids -> item($cpt) -> nodeValue;
		if (strcmp($tmp,$idPole) == 0) {
			$parent = $ids -> item($cpt);
			$pole = $parent -> parentNode;
			//$pole = $ids -> item($cpt) -> parentNode;
			$pole -> appendChild($contact);
			var_dump($pole);
			echo "<br/>Contact créé.<br/>";
		}
		$cpt++;
	}

	$dom -> save($file);
	
	echo "<br/>Sauvegarde effectuée.<br/>";

?>{/source}
