<?php
Head::insert('login', 'Connection au pannel admin local', 'Login');
echo '
<h1 class="ongletTitre">Login</h1>
<section class="corp">
	<form action="login" method="post" id="formLoginExt">
		<input name="pseudo" placeholder="pseudo" value="'.$pseudo.'">
		<input name="mdp" placeholder="mdp" type="password">
		<input type="submit" value="Connect">
	</form>
</section>';
Foot::insert();