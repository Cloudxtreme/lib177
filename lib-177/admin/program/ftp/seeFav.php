<?php
function seeFav()
{
	$favoris = Ftp::favor();
	return Viewer::ftpFavor($favoris);
}