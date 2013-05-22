<?php

/**
 * CheddarGetter
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Adapter interface for getting and setting http related data
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Christophe Coevoet <stof@notk.org>
 * @example example/example.php
 */

interface CheddarGetter_Http_AdapterInterface {

	/**
	 * Checks whether a cookie exists.
	 *
	 * @param string $name Cookie name
	 * @return boolean
	 */
	function hasCookie($name);

	/**
	 * Gets the value of a cookie.
	 *
	 * @param string $name Cookie name
	 * @return mixed
	 */
	function getCookie($name);

	/**
	 * Sets the value of a cookie.
	 *
	 * @param string $name Cookie name
	 * @param string $data Value of the cookie
	 * @param int $expire
	 * @param string $path
	 * @param string $domain
	 * @param boolean $secure
	 * @param boolean $httpOnly
	 */
	function setCookie($name, $data, $expire, $path, $domain, $secure = false, $httpOnly = false);

	/**
	 * Gets a request parameter.
	 *
	 * null is returned if the key is not set.
	 *
	 * @param string $key
	 * @return mixed
	 */
	function getRequestValue($key);

	/**
	 * Checks whether the referrer exists
	 * @return boolean
	 */
	function hasReferrer();

	/**
	 * Gets the referrer
	 * @return string
	 */
	function getReferrer();

	/**
	 * Checks if the IP is set
	 * @return boolean
	 */
	function hasIp();

	/**
	 * Gets the IP
	 * @return string
	 */
	function getIp();

}
