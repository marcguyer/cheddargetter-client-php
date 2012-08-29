<?php

class CheddarGetter_Cache_SessionAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	public function __construct(){};
		
	public function save($key, $value)
	{
		if(!isset($_SESSION["CGCaching"]))
				$_SESSION["CGCaching"] = array();
		$_SESSION["CGCaching"][$key] = $value;		
	}	
	public function remove($key)
	{
		if(!isset($_SESSION["CGCaching"][$key]))
			unset($_SESSION["CGCaching"][$key]);
	}
	public function load($key)
	{
		//echo "\nget cached\n";
		$value = false;
		if(isset($_SESSION["CGCaching"][$key]))
			$value = $_SESSION["CGCaching"][$key];
		return $value;
	}
}


