<?php

	$fichier = "Annuaire-XML.xml";

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

	/*
	echo "Ca marche.<br/>";
	$xml = simplexml_load_file('Annuaire-XML.xml')  or die("Erreur Parseur.");
	foreach($xml->children() as $pole){
		echo $pole->intitule."<br/>";
		foreach($pole->children () as $contact){
			echo $nom."<br/>";
			echo $contact->prenom."<br/>";
	}
	echo "?<br/>";

    $myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
    <note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Don't forget me this weekend!</body>
    </note>";
    
    $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
    print_r($xml);
    */

?>
