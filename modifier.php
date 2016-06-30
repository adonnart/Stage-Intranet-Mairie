{source}
<!DOCTYPE html>
<html>
	<head>
		<title>Annuaire - Modifier</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" content="text/css" href="annuaire/annuaire.css" />
		<script>
			function refuserToucheEntree(event){
				if (!event && window.event){ event = window.event; }
				if (event.keyCode == 13){ event.returnValue = false; event.cancelBubble = true; }
				if (event.which == 13){ event.preventDefault(); event.stopPropagation(); }
			}
		</script>
	</head>
	<body>
		<?php
			function listeContacts($pole, $p){
				if (!empty($pole->id)){
					$name = "pole".$p;
					echo "<li><input class='pole' type='radio' name='$name' id='.$pole->id.' />
					<label for='.$pole->id.'>".$pole->id."</label>";
				}
				echo "<ul class='liste'>";
				foreach ($pole as $contact){
					if (!empty($contact->nom)){
						echo "<li class='contact'><input type='radio' name='r-name' id='.$contact->nom.' />
						<label for='.$contact->nom.'>".$contact->nom."</label>";
						echo "<ul class='saisie'><form action='' method='post'>
						<label for='nom'>Nom : </label>
						<input type='text' id='nom' name='nom' value='$contact->nom'
							onkeypress='refuserToucheEntree(event);' />
						<label for='poste'>Poste : </label>
						<input type='text' id='poste' name='poste' value='$contact->poste' 
							onkeypress='refuserToucheEntree(event);' />
						<label for='fixe'>Fixe : </label>
						<input type='text' id='fixe' name='fixe' value='$contact->fixe' 
							onkeypress='refuserToucheEntree(event);' />
						<label for='port'>Portable : </label>
						<input type='text' id='port' name='port' value='$contact->port' 
							onkeypress='refuserToucheEntree(event);' />
						<input type='submit' name='save' value='Sauvegarder' />";
						//Traitement des données
						/*$nom = $_POST['nom'];
						$poste = $_POST['poste'];
						$fixe = $_POST['fixe'];
						$port = $_POST['port'];
						
						if (($nom == $contact->nom) && ($poste == $contact->poste)
						&& ($fixe == $contact->fixe) && ($port == $contact->port)){
							echo "Aucune modification.";
						}else{
							$clone_contact = $contact -> clodeNode(TRUE);
							
						}
						
						$idPole = $pole -> id;
						$noms = $pole -> getElementsByTagName('nom');
	
						echo "<br/>Nom recherché : ".$nom."<br/><br/>";
						
						$cpt = 0;
						$check = 0;
						
						while ($check == 0) {
							$tmp = $noms -> item($cpt) -> nodeValue;
							if ($cpt < 10) { echo "0"; }
							echo $cpt." - ".$tmp."<br/>";
							if ($tmp == $idPole) {
								$pole = $noms -> item($cpt) -> parentNode;
								$check = 1;
								echo "<br/>Nom trouvé.<br/>";
							}
							$cpt++;
						}*/
						
						//----------------------
						echo "</form></ul></li>";
						/* Données à envoyer pour la validation :
						$pole1
						$pole2
						$contact
						
						if 
						
						*/
					}
				}
				echo "</ul>";
			}
			
			$file = 'annuaire/annuaire.xml';
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
