<?php
	/*
	$fichier = "Annuaire/Annuaire-XML.xml";
	
	function fonctionTexte($parseur, $texte){ echo $texte."<br/>"; }
	
	xml_parser_set_option($xml_parser,XML_OPTION_TARGET_ENCODING, "UTF-8");
	
	$parseurXML = xml_parser_create();
	
	xml_set_character_data_handler($parseurXML, "fonctionTexte");
	
	$fp = fopen($fichier, "r");
	if (!$fp) die("Impossible d'ouvrir le fichier XML");
	
	while ( $ligneXML = fgets($fp, 1024)) {
		// Analyse de la ligne REM: feof($fp) retourne TRUE s'il s'agit de la dernière ligne du fichier.
		xml_parse($parseurXML, $ligneXML, feof($fp)) or die("Erreur XML");
	}
	
	xml_parser_free($parseurXML);
	fclose($fp);
	*/
	
    echo "Ca marche.<br/>";
    $xml = simplexml_load_file('Annuaire/Annuaire-XML.xml') or die("Erreur Parseur.");
    foreach($xml as $pole){
        echo "<br/>".$pole->intitule;
        foreach($pole->children() as $contact){
            echo $contact->nom."<br/>";
            echo $contact->prenom."<br/>";
			echo $contact->fixe."<br/>";
			echo $contact->portable."<br/>";
			echo $contact->poste."<br/>";
		}
		echo "<br/>".$pole->fax;
    }
    echo "?<br/>";
?>
