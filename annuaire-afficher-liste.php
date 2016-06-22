{source}
<html>
	<head><title>Annuaire - Modifier</title><link href="annuaire/annuaire.css" rel="stylesheet"></head>
	<body>
		<?php
			function listeContacts($pole){
				if (!empty($pole->id)){ echo "<li>".$pole->id; }
				echo "<div class='modif'><ul>";
				foreach($pole as $contact){ if (!empty($contact->nom)){ echo "<li>".$contact->nom."</li>"; } }
				echo "</ul></li>";
			}
			
			$file = 'annuaire/test-v3.xml';
			$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
			
			echo "<ul>";
			foreach($xml as $pole1){
				listeContacts($pole1);
				echo "<ul>";
				foreach($pole1 as $pole2){
					if (!empty($pole1->pole2)){
						listeContacts($pole2);
					}
				}
				echo "</ul>";
			}
			echo "</ul></div>";
		?>
	</body>
</html>
{/source}
