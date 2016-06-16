{source}
<html>
	<head></head>
	<body>
		<form action="afficheContacts.php" method="get">
			<select size="1" id="combo">
  				<optgroup label="Elus municipaux">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Adjoints et conseillers délégués">
    					<option value="url_21">Lien 1</option>
    					<option value="url_22">Lien 2</option>
    					<option value="url_23">Lien 3</option>
  				</optgroup>
  				<optgroup label="Pôle Direction Générale">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Pôle Finances Administration Générale">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
  				<optgroup label="Catégorie 1">
    					<option value="url_11">Lien 1</option>
    					<option value="url_12">Lien 2</option>
    					<option value="url_13">Lien 3</option>
  				</optgroup>
			</select>
			<input type="submit" value="Ok"/>
		</form>
		<br/><br/>
		<form action="modifContacts.php" method="get">
			<input type="submit" value="Modifier"/>
		</form>
		<?php
			$dom = new DOMDocument();
			//$dom->formatOutput = true;
		
			$dom->load('annuaire/annuaire.xml');
			//, LIBXML_NOBLANKS
			
			$root = $dom->documentElement;
			$newresult = $root->appendChild( $dom->createElement('result') );
		
			$newresult->setAttribute('id', 2);
			$newresult->appendChild( $dom->createElement('name','Max Miller') );
			$newresult->appendChild( $dom->createElement('sgpa','8.7') );
			$newresult->appendChild( $dom->createElement('cgpa','8.2') );
		
			echo ''. $dom->saveXML() .'';
			$dom->save('new_result.xml') or die('XML Manipulate Error');
		?>
	</body>
</html>
{source}
