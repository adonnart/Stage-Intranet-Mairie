{source}
<html>
	<head><title>Annuaire - Modifier</title><link href="annuaire/annuaire.css" rel="stylesheet"></head>
	<body>
		<?php
			function listeContacts($pole){
				if (!empty($pole->id)){
					echo "<li><input type='checkbox' id='.$pole->id.' />
					<label for='.$pole->id.'>".$pole->id."</label>";
				}
				echo "<ul>";
				foreach ($pole as $contact){
					if (!empty($contact->nom)){
						echo "<li>".$contact->nom."</li>"; /*} - type='radio' name='contact'*/
						/*echo "<li><input type='checkbox' id='.$contact->nom.' />
						<label for='.$contact->nom.'>".$contact->nom".</label></li>";*/
					}
				}
				echo "</ul>";
			}
			
			$file = 'annuaire/test-v3.xml';
			$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
		?>
		
		<div class='modif'><form action="" method="post">
			<!--<input type="submit" value="Submit" /><input type="reset" value="Reset" />-->
			<ul>
			<?php
				foreach ($xml as $pole1){
					//$p1 = "";
					listeContacts($pole1);
					echo "<ul>";
					foreach ($pole1 as $pole2){
						if (!empty($pole1->pole2)){
							//$p2 = "";
							listeContacts($pole2);
						}
					}
					echo "</ul>";
				}
			?>
			</li></ul>
		</form></div>
	</body>
</html>
{/source}
