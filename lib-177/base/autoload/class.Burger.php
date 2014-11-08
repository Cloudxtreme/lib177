<?php
/**
 * @Version(name="Burger", version="1.0")
 */
class Burger
{
	protected static $_time_cuisson;
	protected static $_pain;
	protected static $_sauce;
	protected static $_steack;
	protected static $_echallote;
	public function __construct($sauce){
		setSauce($sauce);
		self::$_time_cuisson = time();
		self::$_steack = new Steack('surgelé');
		self::$_pain = new Pain();
		self::$_echallote = new Echallote();
		Cuisson::start('feux_doux');
	}
	public static function VerifTime(){
		if((time() - $time_cuisson) > 3)/*mn*/
			self::$_steack->retourne();
		if($time_cuisson > 7){/*mn*/
			self::$_steack->retourne();
			self::$_pain->grille();
			self::$_echallote->coupe();
		}
		if($time_cuisson > 9){/*mn*/
			Cuisson::end();
			Assemble::ingredients(array(self::$_pain, self::$_sauce, self::$_salade, self::$_echallote, self::$_steack));
		}
	}
	public function setSauce($sauce){
		$sauce_accepte = array('ketchup', 'barbecue', 'burger', 'curry');
		if(GreyList::white_list($sauce_accepte, $sauce))
			self::$_sauce = $sauce;
	}
}