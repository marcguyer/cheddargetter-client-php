<?php

class CheddarGetter_Cache_MemcacheAdapter implements CheddarGetter_Cache_AdapterInterface 
{
	private $cache;
	public function __construct()
	{
		$this->cache = new Memcache;
		$this->cache->connect("localhost");
	};

	public function save($key, $value)
	{
		$key = "CGCaching_".$key;
		$this->cache->set($key, $value);	
	}	
	public function remove($key)
	{
		$key = "CGCaching_".$key;
		$this->cache->delete($key);
	}
	public function load($key)
	{
		//echo "\nget cached\n";
		$value = false;
		$key = "CGCaching_".$key;
		if($this->cache->get($key))
			$value = $this->cache->get($key);
		return $value;
	}
}

