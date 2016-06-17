{source}<?php

	$file = 'annuaire/tests.xml';
	$dom = new DOMDocument();
	$dom -> load($file);
	
	echo "Fichier ouvert ?<br/><br/>";

	$new_personne = $dom -> createElement('personne');
	$personne = $dom -> getElementsByTagName($new_personne) -> item(0);
	
	$nom = $dom -> createElement('nom','GILBERT');
	$personne -> appendChild($nom);
	        
	$prenom = $dom -> createElement('prenom','Catherine');
	$personne -> appendChild($prenom);

	$new_contact = $dom -> createElement('contact');
	$contact = $dom -> getElementsByTagName($new_contact) -> item(0);

	$portable = $dom -> createElement('portable','06 80 10 70 48');
	$fixe = $dom -> createElement('fixe','743');
	
	$contact -> appendChild($personne);
	$contact -> appendChild($portable);
	$contact -> appendChild($fixe);
	
	echo "Contact créé ?<br/><br/>";
/*      
	Résultat :
	<contact>
		<personne>
                	<nom>GILBERT</nom>
                	<prenom>Catherine</prenom>
        	</personne>
		<portable>06 80 10 70 48</portable>
        	<fixe>743</fixe>
        <contact>
*/
	$new_intitule = 'Jeunesse';
	$pole = $dom -> getElementsById($new_intitule) -> item(0);
	//$pole = $intitule -> parentNode; // Récupère le noeud parent de l'intitulé : pole2.
	$pole -> appendChild($contact);
        
	echo "Mis dans Jeunesse ?<br/><br/>";
/*      
	Résultat :
	<pole2>
		<contact>
			<personne>
	                	<nom>GILBERT</nom>
	                	<prenom>Catherine</prenom>
	        	</personne>
			<portable>06 80 10 70 48</portable>
	        	<fixe>743</fixe>
	        <contact>
        </pole2>
*/
	// Affichage de tous les éléments 'pays'.
	
	echo "Liste ?<br/><br/>";
        
	$liste = $dom -> getElementsByTagName('pole2');
	foreach ($liste as $tmp) { echo $tmp -> firstChild -> nodeValue . "<br/>"; }

	echo "Save ?<br/><br/>";
	
	$dom -> save($file);

?>{/source}
