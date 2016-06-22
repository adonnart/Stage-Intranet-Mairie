{source}
<html>
	<head><title>Annuaire - Modifier</title></head>
	<body>
		<!--<form action="" method="post">
	        	<select size="2" id="pole">
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
			<input class="btn-success" type="submit" value="Modifier"/>
		</form>
		<ul>
			<li>Elus municipaux
				<ul>
					<li>Dominique CAP</li>
					<li>Allain LE ROUX</li>
				</ul>
			</li>
			<li>Pôle Direction Générale
				<li>Philippe LANDRY</li>
				<ul>
					<li>Secrétariat Général - Légalité
						<ul>
							<li>Véronique MARTIN</li>
							<li>Stéphanie SEBILLE</li>
						</ul>
					</li>
					<li>Police municipale
						<ul>
							<li>Rolland MAUGUEN</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>-->
		<?php
			function listeContacts($pole){
				if (!empty($pole->id)){ echo "<li>".$pole->id; }
				echo "<ul>";
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
			echo "</ul>";
		?>
	</body>
</html>

<!-- Test affichage dossiers
<link href="annuaire/annuaire.css" rel="stylesheet">
<ul class="modif">
<li><input type="checkbox" id="c1" />
<i class="fa fa-angle-double-right"></i>
<i class="fa fa-angle-double-down"></i>
<label for="c1">Dossier A</label>
<ul>
<li>Sous dossier A1</li>
<li>Sous dossier A2</li>
<li>Sous dossier A3</li>
</ul>
</li>
<li class="modif"><input type="checkbox" id="c2" />
<i class="fa fa-angle-double-right"></i>
<i class="fa fa-angle-double-down"></i>
<label for="c2">Dossier B</label>
<ul>
<li>Sous dossier B1</li>
<li><input type="checkbox" id="c3" />
<i class="fa fa-angle-double-right"></i>
<i class="fa fa-angle-double-down"></i>
<label for="c3">Sous dossier B2</label>
<ul>
<li>Sous-sous dossier B21</li>
<li>Sous-sous dossier B22</li>
</ul>
</li>
</ul>
</li>
</ul>
-->

{/source}
