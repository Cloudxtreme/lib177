<?php
function logout($ftp){
	$ftp->logout();
	return 'Logout success.';
}
?>