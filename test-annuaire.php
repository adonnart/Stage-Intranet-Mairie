{source}
<html><!--<head></head>--><body>
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
        $file = 'annuaire/test-annuaire.xml';
        $dom = new DOMDocument();
        $dom -> load($file);

        // Noeuds parents.
        $intitulePole = 'Jeunesse';
        //$intitulePole2 = 'Jeunesse';

        // Création des éléments.
        $contact = $dom -> createElement('contact');
        $personne = $dom -> createElement('personne');
        
        $nom = $dom -> createElement('nom','GILBERT');
        $prenom = $dom -> createElement('prenom','Catherine');
        $portable = $dom -> createElement('portable','06 80 10 70 48');
        $fixe = $dom -> createElement('fixe','743');
        
        //$nomPays = $dom -> createTextNode($valeur);
        
        // Ajout des éléments au fichier.
        
        $contacts -> appendChild($nom);
        $contacts -> appendChild($prenom);
        $personnes = $dom -> getElementsByTagName($personne)->item(0);
/*      <personne>
                <nom>GILBERT</nom>
                <prenom>Catherine</prenom>
        </personne>
*/
        $contacts -> appendChild($portable);
        $contacts -> appendChild($fixe);
/*      <portable>06 80 10 70 48</portable>
        <fixe>743</fixe>
*/
        $poles2 = $dom -> getElementsByTagName($intitulePole2)->item(0);
        $tmp = $poles2 -> parentNode; // Récupère le noeud parent de l'intitulé.
        $tmp -> appendChild($contacts);
/*      <pole2>
                [<intitule>Jeunesse</intitule>]
                <personne>
                        <nom></nom>
                        <prenom></prenom>
                </personne>
        </pole2>
*/
        /*$poles1 = $dom -> getElementsByTagName($intitulePole1)->item(0);
        $tmp1 = $poles2 -> parentNode;
        $tmp1 -> appendChild($poles2);*/

/*      <pole1>
                [<intitule>Pôle Education et Action sociale</intitule>]
                <pole2>
                        [<intitule>Jeunesse</intitule>]
                        <personne>
                                <nom></nom>
                                <prenom></prenom>
                        </personne>
                </pole2>
        </pole1>
*/
        $poles1 = $dom -> getElementsByTagName($pole1)->item(0);
        $poles1 -> appendChild($poles2);
        
        // Affichage de tous les éléments 'pays'.
        $liste = $dom -> getElementsByTagName('pole2');
        foreach ($liste as $tmp) { echo $tmp -> firstChild -> firstChild -> nodeValue . "<br/>"; }
        
        //$root = $dom -> documentElement;
        //$element = $dom -> createElement('test','This is the root');
        //$dom -> appendChild($element);
        
        // Sauvegarde du fichier.
        $dom -> save($file);
        
        ?>
        
</body></html>{/source}
