<?php

class CheddarGetter_Cache_ApcAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	public function __construct(){};

	public function save($key, $value)
	{
		$key = "CGCaching_".$key;
		apc_store($key, $value);	
	}	
	public function remove($key)
	{
		$key = "CGCaching_".$key;
		apc_delete($key);
	}
	public function load($key)
	{
		//echo "\nget cached\n";
		$value = false;
		if(apc_fetch($key))
			$value = apc_fetch($key);
		return $value;
	}
}

