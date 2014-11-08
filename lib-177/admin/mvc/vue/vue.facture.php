<?php Head::insert('facture', 'Zone admin', 'Facture');
echo '
<h1 class="ongletTitre">Facture</h1>
<div class="corp" id="facturePresent">
	<form action="facture" method="post" class="center">
		<input value="'.$client.'" name="client" placeholder="Client"><br>
		<input value="'.$entreprise.'" name="entreprise" placeholder="Entreprise"><br>
		<input value="'.$siret.'" name="siret" placeholder="siret"><br>
		<input value="'.$adresse.'" name="adresse" placeholder="Adresse"><br>
		<input value="'.$cp.'" name="cp" placeholder="CP Ville"><br>
		<input value="'.$tel.'" name="tel" placeholder="Téléphone"><br>
		<input value="'.$mail.'" name="mail" placeholder="E-mail"><br>
		<input value="'.$date.'" name="date" placeholder="date"><br>
		<input type="submit" value="Générer">
	</form>
</div>';
Foot::insert(array('facturePresente.js')); ?>