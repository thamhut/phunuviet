<?php
namespace App\Helpers;

use OE\Object;
use Phalcon\Exception;
use Transliterator;

class String extends Object {
	
	/**
	 * Cut string by length
	 * 
	 * @param unknown $text
	 * @param number $length
	 * @param string $tail
	 * @return string
	 */
	public static function snippet($text, $length= 100, $tail="...") {
		$text = trim($text);
		if(strlen($text) > $length) {
			if($spacePos = strpos($text, " ", $length)) {
				return substr($text, 0, $spacePos) . $tail;
			} else {
				return substr($text, 0, $length) . $tail;
			}
		}
		return $text;
	}

	public static function slug($string)
	{
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug.'-'.md5(microtime());
	}
}