{source}<html><body><?php

        $dom = new DOMDocument();
        $dom -> load('annuaire/test.xml') or die ("error?");
        echo "- Chargé.";
        //$root = $dom -> documentElement;
        
        $listePays = $dom -> getElementsByTagName('pays');
        
        foreach($listePays as $pays){ echo $pays -> firstChild -> nodeValue . "<br/>"; }

        $nouveauPays = $dom -> createElement('pays');
        $nomPays = $dom -> createTextNode('Allemagne');
        
        $nouveauPays -> appendChild($nomPays);
        $europe = $dom -> getElementsByTagName("europe")->item(0);
        $europe -> appendChild($nouveauPays);
        
        //$element = $dom -> createElement('test','This is the root');
        //$dom -> appendChild($element);
        //$dom -> save('test.xml');

?></body></html>{/source}
