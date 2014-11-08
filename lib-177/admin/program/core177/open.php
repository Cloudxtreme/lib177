<?php
namespace Core177
{
	function open($file)
	{
		if(empty($file))
			\Error::brut('Empty path.');
		if(!file_exists($file))
			\Error::brut('File not found.');
		if (substr(php_uname(), 0, 7) == "Windows")
		    exec('START '.$file);
		else
		{
			/* For run this script add:
			   daemon      ALL=(ALL) NOPASSWD: ALL
			   at the end of /etc/sudoers (with the commande sudo visudo and nothing else!)
			   After that, update the two variables undermentioned for your usage. */ 

			$user = 'lp177';/* My user name for this session */
			$editor = '/usr/bin/sublime';/* Absolute path of my favorite editor */

			//exec('sudo kill `ps aux | grep -m 1 '.$editor.' | sed -re \'s/[^ ]*[ ]*//\' | cut -d" " -f1` && sleep 0.1');
		    exec('sudo -u '.$user.' nohup '.$editor.' '.$file.' >/dev/null 2>&1 --display=:0 &', $error, $out);
		    /*Fix:
		    For sublime text: he open always new windows add in Setting - User
		    ,"open_files_in_new_window": false

		    Nothing open on click: if you have verify your visudo ans two variables php can be identify with other
		    name than "daemon", write and launch in an script php:
		    execute('whoami', $error, $out);print_r($error);print_r($out);die;
		    for know this name and replace daemon in visudo.
		    */
		}
	}
}
?>