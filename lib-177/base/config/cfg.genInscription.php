<?php
return $cfg['genInscription'] = array(
    'save' => array(
        /**/'Pseudo' => array(
					'html' => '<label for="pseudo">Pseudo</label><input id="pseudo" name="pseudo" placeholder="pseudo" maxlength="25" required="required" pattern="[A-Za-z0-9]{2,25}" title="2 à 25 caractères alphanumériques">',
					'verif' => 'Secur::pseudo($_POST[\'pseudo\'])'
			),/**/
        /**/'Email' => array(
					'html' => '<label for="email">E-mail</label><input id="email" name="email" placeholder="email" maxlength="255" required="required" pattern="[\w._-]+@[\w._-]{2,}\.[a-z]{2,4}" title="Adresse e-mail valide">',
					'verif' => 'Secur::email($_POST[\'email\'])'
			),/**/
        /**/'Password' => array(
					'html' => '<label for="Password">Mot de passe</label><input id="Password" name="Password" maxlength="30" required="required" pattern=".{6,30}" title="6 à 30 caractères" type="password">',
					'verif' => 'strlen($_GET[\'Password\']) < 31 && strlen($_GET[\'Password\']) > 1'
			),/**/
        /**/'Password Confirmation' => array(
					'html' => '<label for="PassConfirm">Confirmation</label><input id="PassConfirm" name="PassConfirm" maxlength="30" required="required" pattern=".{6,30}" title="6 à 30 caractères" type="password">',
					'verif' => '$_GET[PassConfirm] == $_GET[\'PassConfirm\']'
			),/**/
        /**/'First name' => array(
					'html' => '<label for="name">Nom</label><input id="name" name="name" placeholder="Nom" maxlength="35" required="required" pattern="[A-Za-z-]{2,35}" title="2 à 35 caractères alphabétiques">',
					'verif' => 'Secur::name($_POST[\'name\'])'
			),/**/
        /**/'Name' => array(
					'html' => '<label for="lastname">Prénom</label><input id="lastname" name="lastname" placeholder="Prénom" maxlength="35" required="required" pattern="[A-Za-z-]{2,35}" title="2 à 35 caractères alphabétiques">',
					'verif' => 'Secur::name($_POST[\'lastname\'])'
			),/**/
        /**/'Secret question' => array(
					'html' => '<label for="quest">Question secrète</label>
<select id="quest" name="quest" required="required">
	<option value=""></option>
	<option value="1">professeur préféré?</option>
	<option value="2">métier de mon grand-père?</option>
	<option value="3">personnage historique préféré?</option>
	<option value="4">lieu de naissance de ma mère?</option>
	<option value="5">quel est le nom de votre amie d\'enfance?</option>
	<option value="6">nom de mon premier animal de compagnie?</option>
</select>',
					'verif' => '$_GET[\'quest\'] > 0 && $_GET[\'quest\'] < 7'
			),/**/
        /**/'Secret answer' => array(
					'html' => '<label for="rep">Réponse</label><input id="rep" name="rep" placeholder="réponse" required="required" maxlength="30">',
					'verif' => 'strlen($_GET[\'rep\']) < 31 && strlen($_GET[\'rep\']) > 1'
			),/**/
        /**/'City' => array(
					'html' => '<label for="ville">Ville</label><input id="ville" name="ville" placeholder="ville" required="required" maxlength="50" pattern="[-\w ]{2,50}">',
					'verif' => 'Secur::name($_POST[\'ville\'])'
			),/**/
        /**/'Postal code' => array(
					'html' => '<label for="cdp">Code postal</label><input id="cdp" name="cdp" placeholder="Code postale" required="required" maxlength="5" pattern="\d{5}">',
					'verif' => 'Secur::codePostal($_POST[\'ville\'])'
			),/**/
        /**/'Birthday' => array(
					'html' => '<label for="birthday">Date de naissance</label><input class="hasDatepicker" id="birthday" name="birthday" placeholder="jj/mm/aaaa" required="required" maxlength="10" pattern="\d{2}/\d{2}/\d{4}">',
					'verif' => 'Secur::birthday($_POST[\'birthday\'])'
			)/**/
    )
); ?>