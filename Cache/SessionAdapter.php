<?php

class CheddarGetter_Cache_SessionAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	public function __construct(){
		//	echo "making Session \n";	
	}
		
	public function save($key, $value)
	{
		if(!isset($_SESSION["CGCaching"]))
				$_SESSION["CGCaching"] = array();
		$_SESSION["CGCaching"][$key] = $value;		
		//	echo "Saving \n";
	}	
	public function remove($key)
	{
		if(!isset($_SESSION["CGCaching"][$key]))
			unset($_SESSION["CGCaching"][$key]);
		//	echo "Removing \n";
	}
	public function load($key)
	{
		$value = false;
		if(isset($_SESSION["CGCaching"][$key]))
			$value = $_SESSION["CGCaching"][$key];
		//	echo "Loading \n";
		return $value;
	}
}


