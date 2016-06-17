{source}<?php

	$file = 'annuaire/test-mille.xml';
	$dom = new DOMDocument();
	$dom -> load($file);
	
	//print_r $dom;
	
	echo "Fichier ouvert ?<br/><br/>";
		
	$pole = $dom -> getElementById('Jeunesse'); // -> item(0)

	echo $pole;

	$contact = $dom -> createElement('contact');
	//$contact = $dom -> getElementsByTagName($new_contact) -> item(0);

	$personne = $dom -> createElement('personne');
	$personne -> appendChild(createElement('nom','GILBERT'));
	$personne -> appendChild(createElement('prenom','Catherine'));

	$contact -> appendChild($personne);
	$contact -> appendChild(createElement('portable','06 80 10 70 48'));
	$contact -> appendChild(createElement('fixe','743'));
	
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
