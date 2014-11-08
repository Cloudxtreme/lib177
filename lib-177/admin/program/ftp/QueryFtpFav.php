<?php
function QueryFtpFav($action, $cible)
{
    switch($action)
    {
        case 'create':
            Program::getProgram('ftp', 'createFav.php');
            return createFav($cible);
        break;
        case 'modif':
            Program::getProgram('ftp', 'modifFav.php');
            return modifFav($cible);
        break;
        case 'delete':
            Program::getProgram('ftp', 'deleteFav.php');
            return deleteFav($cible);
        break;
        case 'connect':
            Program::getProgram('ftp', 'connectFav.php');
            return connectFav($cible);
        break;
        case 'login':
            Program::getProgram('ftp', 'loginFav.php');
            return loginFav();
        break;
        case 'logout':
            Program::getProgram('ftp', 'logoutFav.php');
            return logoutFav();
        break;
        case 'seeFav':
            Program::getProgram('ftp', 'seeFav.php');
            return seeFav($cible);
        break;
        default:
			Program::getProgram('ftp', 'seeFav.php');
			return seeFav($cible);
    }
}
?>