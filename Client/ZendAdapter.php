<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Adapter implementation based on Zend_Http_Client for requesting the CheddarGetter service
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 * @author Christophe Coevoet <stof@notk.org>
 * @example example/example.php
 */

class CheddarGetter_Client_ZendAdapter implements CheddarGetter_Client_AdapterInterface {

	protected $_client;

	/**
	 * @param Zend_Http_Client $client
	 * @throws CheddarGetter_Client_Exception Throws an exception if Zend_Http_Client is not available.
	 */
	public function __construct(Zend_Http_Client $client = null) {
		if (!class_exists('Zend_Http_Client')) {
			throw new CheddarGetter_Client_Exception('The Zend client is not available.', CheddarGetter_Client_Exception::USAGE_INVALID);
		}

		$this->_client = $client;
	}

	/**
	 * Execute CheddarGetter API request
	 *
	 * @param string $url Url to the API action
	 * @param string $username Username
	 * @param string $password Password
	 * @param array|null $args HTTP post key value pairs
	 * @return string Body of the response from the CheddarGetter API
	 * @throws Zend_Http_Client_Exception A Zend_Http_Client_Exception may be thrown under a number of conditions but most likely if the tcp socket fails to connect.
	 */
	public function request($url, $username, $password, array $args = null) {

		if (!$this->_client) {
			$userAgent = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] . ' - CheddarGetter_Client PHP' : 'CheddarGetter_Client PHP';

			$this->_client = new Zend_Http_Client(
				$url,
				array(
					'timeout'		=> 60,
					'useragent'		=> $userAgent
				)
			);
		} else {
			if ($this->_client->getUri() != $url) {
				$this->_client->setUri($url);
			}
		}

		$this->_client->setAuth($username, $password);

		if ($args) {
			$this->_client->setMethod(Zend_Http_Client::POST);
			$this->_client->setParameterPost($args);
		} else {
			$this->_client->setMethod(Zend_Http_Client::GET);
			$this->_client->resetParameters();
		}

		return $this->_client->request()->getBody();

	}

	/**
	 * @return null|Zend_Http_Client
	 */
	public function getClient() {
		return $this->_client;
	}
}
