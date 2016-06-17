{source}
<html><body>
<!--	
	<form action="" method="post">
        	<select size="1" id="pole1">
			<option>Elus municipaux</option>
			<option>Adjoints et conseillers délégués></option>
			<option>Pôle Direction Générale</option>
			<option>Pôle Finances Administration Générale</option>
			<option>Pôle Aménagement Urbanisme et Patrimoine / Travaux</option>
			<option>Pôle Communication, Culture, Vie associative, Animations et Sport</option>
			<option>Pôle Education et Action sociale</option>
			<option>Salles</option>
			<option>Numéros utiles</option>
		</select>
		<input type="submit" value="Modifier"/>
	</form>
-->
<?php
        // Ouverture du fichier.
        $file = 'annuaire/tests.xml';
        $dom = new DOMDocument();
        $dom -> load($file);
	
	// Création des noeuds parents

	$new_personne = $dom -> createElement('personne');
	$personne = $dom -> getElementsByTagName($new_personne) -> item(0);
	
	$nom = $dom -> createElement('nom','GILBERT');
	$prenom = $dom -> createElement('prenom','Catherine');
	
        $personne -> appendChild($nom);
        $personne -> appendChild($prenom);
        
        $new_contact = $dom -> createElement('contact');
	$contact = $dom -> getElementsByTagName($new_contact) -> item(0);

	$portable = $dom -> createElement('portable','06 80 10 70 48');
	$fixe = $dom -> createElement('fixe','743');
	
	$contact -> appendChild($personne);
	$contact -> appendChild($portable);
	$contact -> appendChild($fixe);
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
        $intitule = $dom -> getElementsByTagName($new_intitule) -> item(0);
        $pole = $intitule -> parentNode; // Récupère le noeud parent de l'intitulé : pole2.
        $pole -> appendChild($contact);
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
        $liste = $dom -> getElementsByTagName('pole2');
        foreach ($liste as $tmp) { echo $tmp -> firstChild -> nodeValue . "<br/>"; }
        
        //$root = $dom -> documentElement;
        //$element = $dom -> createElement('test','This is the root');
        //$dom -> appendChild($element);
        
        // Sauvegarde du fichier.
        $dom -> save($file);
?>
</body></html>
{/source}
