{source}
<html>
	<head><title>Annuaire - Modifier</title><link href="annuaire/annuaire.css" rel="stylesheet"></head>
	<body>
		<?php
			function listeContacts($pole){
				if (!empty($pole->id)){
					echo "<li><input type='radio' name='r-id' id='.$pole->id.' />
					<label for='.$pole->id.'>".$pole->id."</label>";
				}
				echo "<ul class='liste'>";
				foreach ($pole as $contact){
					if (!empty($contact->nom)){
						echo "<li><input type='radio' name='radio-name' id='.$contact->nom.' />
						<label for='.$contact->nom.'>".$contact->nom."</label>";
						// Saisie
						echo "<ul class='saisie'>";
						//include "annuaire/saisie.php";
						?><form action="" method="post">
							<label>Nom : </label>
							<input class='saisie' type='text' name='nom' value='<?php echo $contact->nom;?>'/>
							<label>Poste : </label>
							<input type='text' name='poste' value='<?php echo $contact->poste;?>'/>
							<label>Fixe : </label>
							<input type='text' name='fixe' value='<?php echo $contact->fixe;?>'/>
							<label>Portable : </label>
							<input type='text' name='port' value='<?php echo $contact->port;?>'/>
							<input class='saisie' type="submit" value="Sauvegarder"/>
						</form><?php
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
		
		<!--<div class='modif'>-->
		<form action="" method="post">
			<!--<input type="submit" value="Submit" /><input type="reset" value="Reset" />-->
			<ul class='liste'>
			<?php
				foreach ($xml as $pole1){
					//$p1 = "";
					listeContacts($pole1);
					echo "<ul class='liste'>";
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
		</form>
		<!--</div>-->
	</body>
</html>
{/source}
