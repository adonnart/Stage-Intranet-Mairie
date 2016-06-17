{source}
<?php
        // Ouverture du fichier.
        $file = 'annuaire/testPays.xml';
        $dom = new DOMDocument();
        $dom -> load($file);

        $pays = $dom -> createElement('pays','Russie');
        
        // Ajout de ce nouvel élément au fichier.
        $continent = $dom -> getElementsByTagName('europe') -> item(0);
        $continent -> appendChild($pays);
        
        // Affichage de tous les éléments 'pays'.
        $listePays = $dom -> getElementsByTagName('pays');
        foreach ($listePays as $pays) { echo $pays -> firstChild -> nodeValue . "<br/>"; }
        
        // Sauvegarde du fichier.
        $dom -> save($file);
?>
{/source}
