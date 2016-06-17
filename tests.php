{source}<html><body><?php

        $dom = new DOMDocument();
        $doc -> load('annuaire/test.xml') or die ("error?");
        $root = $dom -> documentElement;
        
        $listePays = $dom -> getElementsByTagName('pays');
        
        foreach($listePays as $pays){
                echo $pays -> firstChild -> nodeValue . "<br/>";
        }
        
        echo "---<br/>";
        
        $europe = $dom -> getElementsByTagName('europe') -> item(0);
        $listePaysEurope = $europe -> getElementsByTagName('pays');
        foreach($listePaysEurope as $pays){
                echo $pays -> firstChild -> nodeValue . "<br/>";
        }
        
        //$element = $dom -> createElement('test','This is the root');
        //$dom -> appendChild($element);
        //$dom -> save('test.xml');

?></body></html>{/source}
