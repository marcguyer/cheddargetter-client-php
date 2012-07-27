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
	}

	private function _request() {
		if ($this->_request) {
			return $this->_request;
		}
		$this->_request = Zend_Controller_Front::getInstance()->getRequest();
		return $this->_request;
	}

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function getRequestValue($key) {
		return $this->_request() ? $this->_request()->getParam($key) : null;
	}

	/**
	 * Checks whether a cookie exists.
	 *
	 * @param string $name Cookie name
	 * @return boolean
	 */
	function hasCookie($name) {
		return (bool) $this->getCookie($name);
	}

	/**
	 * Gets the value of a cookie.
	 *
	 * @param string $name Cookie name
	 * @return mixed
	 */
	function getCookie($name) {
		return $this->_request() ? $this->_request()->getCookie($name) : null;
	}

	/**
	 * @return boolean
	 */
	function hasReferrer() {
		return $this->_request() ? (bool) $this->_request()->getServer('HTTP_REFERER') : false;
	}

	/**
	 * @return string
	 */
	function getReferrer() {
		return $this->_request() ? $this->_request()->getServer('HTTP_REFERER') : null;
	}

	/**
	 * @return boolean
	 */
	public function hasIp() {
		return $this->_request() ? (bool) $this->_request()->getServer('REMOTE_ADDR') : false;
	}

	/**
	 * @return string
	 */
	public function getIp() {
		return $this->hasIp() ? $this->_request()->getServer('REMOTE_ADDR') : '';
	}

}
