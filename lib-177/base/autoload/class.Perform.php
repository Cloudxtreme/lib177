<?php
/**
 * @Version(name="Perform", version="1.0")
 */
class Perform{
	private static $_lines;
	private static $_time;
	public function __construct(){
		self::$_time = 0;
		self::$_lines = 0;
	}
	public function start(){
		declare(ticks=1);
		register_tick_function('Perform::lineUp');
		self::$_time = microtime(true);
	}
	public static function lineUp(){
		self::$_lines++;
	}
	public function end(){
		self::$_time = (microtime(true) - self::$_time);
		echo '
		<div class="present_diagnostique"><table>
		<tr><td>
			Le compteur a parcourue '.self::$_lines.' lignes de code
			<a href="http://www.php.net/manual/fr/control-structures.declare.php" target="_banck">
			tickables.</a>
		</td></tr>
		<tr><td>
			Temps d\'execution: '.(self::$_time).'s
		</td></tr>
		<tr><td>
			Mémoire alloué à PHP pendant l\'éxécution du script: '.memory_get_usage().' octets
		</td></tr>
		<tr><td>
			Mémoire max alloué par le système à PHP: '.memory_get_peak_usage(true).' octets
		</td></tr>
		</table>';
	}
	public static function lines(){ return self::$_lines; }
	public static function time(){ return self::$_time; }
} ?>