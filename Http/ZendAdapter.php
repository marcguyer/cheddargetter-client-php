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

	public function __construct() {
		if (!class_exists('Zend_Controller_Front')) {
			throw new CheddarGetter_Client_Exception('The Zend front controller is not available.', CheddarGetter_Client_Exception::USAGE_INVALID);
		}
	}

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function getRequestValue($key) {
		$fc = Zend_Controller_Front::getInstance();

		return $fc->getRequest()->getParam($key);
	}
}
