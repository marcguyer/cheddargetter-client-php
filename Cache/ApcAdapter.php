<?php

class CheddarGetter_Cache_ApcAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	public function __construct(){
		//	echo "Making APC \n";	
	}

	public function save($key, $value)
	{
		$key = "CGCaching_".$key;
		apc_store($key, $value);	
		//	echo "Saving \n";
	}	
	public function remove($key)
	{
		$key = "CGCaching_".$key;
		apc_delete($key);
		//	echo "Removing \n";
	}
	public function load($key)
	{
	
		$key = "CGCaching_".$key;
		$value = false;
		if(apc_fetch($key))
			$value = apc_fetch($key);
		//	echo "Loading \n";
		return $value;
	}
}

