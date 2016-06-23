{source}
<html>
<head>
	<title>Annuaire - Modifier</title>
	<link href="annuaire/annuaire.css" rel="stylesheet">
	<script>
		function refuserToucheEntree(event){
			if (!event && window.event){ event = window.event; }
			if (event.keyCode == 13){ event.returnValue = false; event.cancelBubble = true; }
			if (event.which == 13){ event.preventDefault(); event.stopPropagation(); }
		}
	</script>
</head>
<body>
	<fieldset><form action="" method='post'>
	<label for='pole'>Pôle : </label>
	<input type='text' id='pole' name='pole' onkeypress='refuserToucheEntree(event);' />
	<label for='nom'>Nom : </label>
	<input type='text' id='nom' name='nom' onkeypress='refuserToucheEntree(event);' />
	<label for='poste'>Poste : </label>
	<input type='text' id='poste' name='poste' onkeypress='refuserToucheEntree(event);' />
	<label for='fixe'>Fixe : </label>
	<input type='text' id='fixe' name='fixe' onkeypress='refuserToucheEntree(event);' />
	<label for='port'>Portable : </label>
	<input type='text' id='port' name='port' onkeypress='refuserToucheEntree(event);' />
	<br/><input type='submit' name='save' value='Sauvegarder' /><br/>
<?php
if (!empty($_POST)){
	$nom = $_POST['nom'];
	$poste = $_POST['poste'];
	$fixe = $_POST['fixe'];
	$port = $_POST['port'];
	$idPole = $_POST['pole'];

	$file = 'annuaire/annuaire.xml';
	
	$dom = new DOMDocument('1.0');
	$dom -> preserveWhiteSpace = false;
	$dom -> load($file);
	$dom -> validate();
	echo "<br/>Fichier ouvert.<br/>";
	
	$contact = $dom -> createElement('contact');
	
	if ($poste != ""){ $contact -> appendChild($dom -> createElement('poste',$poste)); }
	if ($nom != "")	 { $contact -> appendChild($dom -> createElement('nom',$nom)); }
	if ($port != "") { $contact -> appendChild($dom -> createElement('port',$port)); }
	if ($fixe != "") { $contact -> appendChild($dom -> createElement('fixe',$fixe)); }

	$ids = $dom -> getElementsByTagName('id');
	
	//echo "<br/>Pôle recherché : ".$idPole."<br/><br/>";
	
	$cpt = 0;
	$check = 0;
	
	while ($check == 0) {
		$tmp = $ids -> item($cpt) -> nodeValue;
		/*if ($cpt < 10) { echo "0"; }
		echo $cpt." - ".$tmp."<br/>";*/
		if ($tmp == $idPole) {
			$pole = $ids -> item($cpt) -> parentNode;
			echo "<br/>> ".$cpt." - ".$tmp."<br/>";
			$check = 1;
			//echo "<br/>Contact créé.<br/>";
		}
		$cpt++;
	}
	
	$pole -> appendChild($contact);

	$dom->formatOutput = true;
	$dom->normalizeDocument();
	$dom -> save($file);
	echo "<br/>Sauvegarde effectuée.<br/>";
}
?>
</form></fieldset>
</body>
</html>
{/source}
