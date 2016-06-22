<html><body>
	<form action="" method="post">
		<label>Nom : </label>
		<input type='text' name='nom' value='<?php echo $contact->nom;?>'/>
		<label>Poste : </label>
		<input type='text' name='poste' value='<?php echo $contact->poste;?>'/>
		<label>Fixe : </label>
		<input type='text' name='fixe' value='<?php echo $contact->fixe;?>'/>
		<label>Portable : </label>
		<input type='text' name='port' value='<?php echo $contact->port;?>'/>
		<input class='saisie' type="submit" value="Sauvegarder"/>
	</form>
</body></html>
