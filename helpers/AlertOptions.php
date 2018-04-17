<?php
namespace rmontuan\helpers;

class AlertOptions
{
	public $url;
	public $title;
	public $message;
	public $icon;
	public $target;
	
	/**
     * Return un array containing the pair key=>value just for the properties that aren't empties.
     * 
     * @return array
     */
	public function getArray(){
		
		$array = [];
		
		foreach(get_object_vars($this) as $index=>$value){
			if(!empty($value))
				$array[$index] = $value;
		}
		
		return $array;
	}
}
