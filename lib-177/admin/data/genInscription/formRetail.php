	<label for="pseudo">Pseudo</label><input id="pseudo" name="pseudo" placeholder="pseudo" maxlength="25" required="required" pattern="[A-Za-z0-9]{2,25}" title="2 à 25 caractères alphanumériques">
	<br><br>
	<label for="pseudo">Pseudo</label><input id="pseudo" name="pseudo" placeholder="pseudo" maxlength="25" required="required" pattern="[A-Za-z0-9]{2,25}" title="2 à 25 caractères alphanumériques">
	<br><br>
	<label for="Password">Mot de passe</label><input id="Password" <?php if (!empty($recup['Password'])) echo 'value="'.$recup['Password'].'"'; ?> name="Password" maxlength="30" required="required" pattern=".{6,30}" title="6 à 30 caractères" type="password">
	<br><br>
	<label for="pseudo">Pseudo</label><input id="pseudo" name="pseudo" placeholder="pseudo" maxlength="25" required="required" pattern="[A-Za-z0-9]{2,25}" title="2 à 25 caractères alphanumériques">
	<br><br>
	<label for="Password">Mot de passe</label><input id="Password" name="Password" maxlength="30" required="required" pattern=".{6,30}" title="6 à 30 caractères" type="password">
	<br><br>
	<label for="PassConfirm">Confirmation</label><input id="PassConfirm" name="PassConfirm" maxlength="30" required="required" pattern=".{6,30}" title="6 à 30 caractères" type="password">
	<br><br>
