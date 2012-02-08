<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Adapter implementation using the ZF1 abstraction for getting and setting http related data
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Christophe Coevoet <stof@notk.org>
 * @example example/example.php
 * @todo use the ZF abstraction for other methods
 */

class CheddarGetter_Http_ZendAdapter extends CheddarGetter_Http_NativeAdapter {

	private $_request;

	public function __construct() {
		if (!class_exists('Zend_Controller_Front')) {
			throw new CheddarGetter_Client_Exception('The Zend front controller is not available.', CheddarGetter_Client_Exception::USAGE_INVALID);
		}
		$this->_request = Zend_Controller_Front::getInstance()->getRequest();
	}

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function getRequestValue($key) {
		return $this->_request->getParam($key);
	}

	/**
	 * Checks whether a cookie exists.
	 *
	 * @param string $name Cookie name
	 * @return boolean
	 */
	function hasCookie($name) {
		return $this->getCookie($name) !== null;
	}

	/**
	 * Gets the value of a cookie.
	 *
	 * @param string $name Cookie name
	 * @return mixed
	 */
	function getCookie($name) {
		return ($this->_request) ? $this->_request->getCookie($name) : null;
	}

	/**
	 * @return boolean
	 */
	function hasReferrer() {
		return $this->_request->getServer('HTTP_REFERER') !== null;
	}

	/**
	 * @return string
	 */
	function getReferrer() {
		return $this->_request->getServer('HTTP_REFERER');
	}

}
