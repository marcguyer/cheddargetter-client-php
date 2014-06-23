<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Adapter interface for caching responses
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Ben Serrette <ben@squadedit.com>
 */

interface CheddarGetter_Cache_AdapterInterface {

	function __construct();
	function load($key);
	function save($key, $value);
	function remove($key);

}
