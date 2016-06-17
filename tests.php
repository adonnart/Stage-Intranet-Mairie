{source}<!--<html><body>-->
<?php
        // Ouverture du fichier.
        $file = 'annuaire/test.xml';
        $dom = new DOMDocument();
        $dom -> load($file);

        // Définition de l'élément à modifier, de sa valeur et du noeud parent.
        $element = 'pays';
        $valeur = 'Cambodge';
        $noeud = 'asie';

        // Création d'un nouvel élément 'pays'.
        $nouveauPays = $dom -> createElement($element);
        $nomPays = $dom -> createTextNode($valeur);
        
        // Ajout de ce nouvel élément au fichier.
        $nouveauPays -> appendChild($nomPays);
        $continent = $dom -> getElementsByTagName($noeud)->item(0);
        $continent -> appendChild($nouveauPays);
        
        // Affichage de tous les éléments 'pays'.
        $listePays = $dom -> getElementsByTagName('pays');
        foreach ($listePays as $pays) { echo $pays -> firstChild -> nodeValue . "<br/>"; }
        
        //$root = $dom -> documentElement;
        //$element = $dom -> createElement('test','This is the root');
        //$dom -> appendChild($element);
        
        // Sauvegarde du fichier.
        $dom -> save($file);
?>
<!--</body></html>-->{/source}
