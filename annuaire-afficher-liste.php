{source}
<html>
	<head><title>Annuaire - Modifier</title><link href="annuaire/annuaire.css" rel="stylesheet"></head>
	<body>
		<?php
			function listeContacts($pole, $p){
				if (!empty($pole->id)){
					$name = "pole".$p;
					echo "<li><input class='liste' type='radio' name='$name' id='.$pole->id.' />
					<label for='.$pole->id.'>".$pole->id."</label>";
				}
				echo "<ul class='liste'>";
				foreach ($pole as $contact){
					if (!empty($contact->nom)){
						echo "<li><input class='saisie' type='radio' name='r-name' id='.$contact->nom.' />
						<label for='.$contact->nom.'>".$contact->nom."</label>";
						// Saisie
						echo "<ul class='saisie'>";
						//include "annuaire/saisie.php";
						echo "<fieldset><form action='' method='post'>
							<label>Nom : </label>
							<input type='text' name='nom' value='$contact->nom' />
							<label>Poste : </label>
							<input type='text' name='poste' value='$contact->poste' />
							<label>Fixe : </label>
							<input type='text' name='fixe' value='$contact->fixe' />
							<label>Portable : </label>
							<input type='text' name='port' value='$contact->port' />
							<input type='submit' name = 'save' value='Sauvegarder'/>
						</form></fieldset>";
						echo "</ul>";
						// Saisie
						echo "</li>";
					}
				}
				echo "</ul>";
			}
			
			$file = 'annuaire/test-v3.xml';
			$xml = simplexml_load_file($file) or die("Fichier ".$file." introuvable.");
		?>
		
		<div class='modif'>
		<form action="" method="post">
			<!--<input type="submit" value="Submit" /><input type="reset" value="Reset" />-->
			<ul class='liste'>
			<?php
				foreach ($xml as $pole1){
					$p = 1; listeContacts($pole1,$p);
					echo "<ul class='liste'>";
					foreach ($pole1 as $pole2){
						if (!empty($pole1->pole2)){
							$p = 2; listeContacts($pole2,$p);
						}
					}
					echo "</ul>";
				}
			?>
			</li></ul>
		</form>
		</div>
	</body>
</html>
{/source}
