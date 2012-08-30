<?php

class CheddarGetter_Cache_MemcacheAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	private $cache;
	public function __construct()
	{
		$this->cache = new Memcache;
		$this->cache->connect("localhost");
		//echo "making memcache\n";
	}

	public function save($key, $value)
	{
		$key = "CGCaching_".$key;
		$this->cache->set($key, $value);	
		//echo "Saving \n";
	}	
	public function remove($key)
	{
		$key = "CGCaching_".$key;
		$this->cache->delete($key);
		//echo "Removing\n";
	}
	public function load($key)
	{
		$value = false;
		$key = "CGCaching_".$key;
		if($this->cache->get($key))
			$value = $this->cache->get($key);
		//echo "Loading \n";
		return $value;
	}
}

