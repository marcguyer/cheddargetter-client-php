<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@sproutbox.com>
 */
/**
 * Client object for interacting with the CheddarGetter service
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@sproutbox.com>
 */
 
class CG_Client {
	
	/**
	 * @var string Username credential for accessing the CheddarGetter API
	 */
	private $_username;
	
	/**
	 * @var string Password credential for accessing the CheddarGetter API
	 */
	private $_password;
	
	/**
	 * @var string URL for accessing the CheddarGetter API
	 */
	private $_url;
	
	/**
	 * @var string Product identifier
	 */
	private $_productCode;
	
	/**
	 * @var Zend_Http_Client 
	 */
	private $_httpClient;
	
	/**
	 * Constructor
	 *
	 * @param $url string
	 * @param $username string
	 * @param $password string
	 * @param $productCode string
	 */
	public function __construct($url, $username, $password, $productCode = null) {
		
		$this->setUrl($url);
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setProductCode($productCode);
		
	}
	
	/**
	 * Set URL neccessary for for accessing the CheddarGetter API
	 *
	 * @param $url string
	 * @return CG_Client
	 */
	public function setUrl($url) {
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * Get URL
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->_url;
	}
	
	/**
	 * Set username neccessary for for accessing the CheddarGetter API
	 *
	 * @param $username string
	 * @return CG_Client
	 */
	public function setUsername($username) {
		$this->_username = $username;
		return $this;
	}
	
	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername() {
		return $this->_username;
	}
	
	/**
	 * Set password neccessary for accessing the CheddarGetter API
	 *
	 * @param $password string
	 * @return CG_Client
	 */
	public function setPassword($password) {
		$this->_password = $password;
		return $this;
	}
	
	/**
	 * Get current password
	 *
	 * @return string
	 */
	private function _getPassword() {
		return $this->_password;
	}
	
	/**
	 * Set product code (required for all calls except getAllCustomers)
	 *
	 * @param $productCode string
	 * @return CG_Client
	 */
	public function setProductCode($productCode) {
		$this->_productCode = $productCode;
		return $this;
	}
	
	/**
	 * Get current product code 
	 *
	 * @return string
	 */
	public function getProductCode() {
		return $this->_productCode;
	}
	
	/**
	 * Magic method wrapper
	 *
	 * Essentially just a sanity check making sure we have a productCode for those methods that require it
	 *
	 * @param string $method
	 * @param array $args
	 */
	public function __call($method, $args) {
		switch ($method) {
			case 'getUrl': 
			case 'setUrl': 
			case 'getUsername': 
			case 'setUsername': 
			case 'setPassword': 
			case 'getProductCode': 
			case 'setProductCode': 
			case 'getAllCustomers':
				return call_user_func_array(array($this, $method), $args);
				break;
			default:
				if (!$this->getProductCode()) {
					throw new CG_Client_Exception('A product code is required for ' . __CLASS__ . '::' . $method . '().  Use ' . __CLASS__ . '::setProductCode()', CG_Client_Exception::USAGE_INVALID);
				}
		}
		return call_user_func_array(array($this, $method), $args);
	}
	
	/**
	 * Get pricing plans
	 *
	 * Get all plans in the product
	 *
	 * @param array|null $filters 
	 * @return CG_Response
	 */
	public function getPlans(array $filters = null) {
		return new CG_Response( $this->request('/plans/get', $filters) );
	}
	
	/**
	 * Get a single pricing plan
	 *
	 * @param string $code Your code for the plan
	 * @param string|null $id CG id for the plan
	 * @return CG_Response
	 */
	public function getPlan($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CG_Response($this->request('/plans/get/' . (($id) ? '/id/'.$id : '/code/'.$code) ), 
			($id) ? 'id' : 'code'
		);
	}
	
	/**
	 * Get customers
	 *
	 * Get all customers in the product
	 *
	 * @param array|null $filters
	 * @return CG_Response
	 */
	public function getCustomers(array $filters = null) {
		return new CG_Response($this->request('/customers/get', $filters));
	}
	
	/**
	 * Get a single customer
	 *
	 * Get all plans in the product
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CG_Response
	 */
	public function getCustomer($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CG_Response($this->request('/customers/get/' . (($id) ? '/id/'.$id : '/code/'.$code) ), 
			($id) ? 'id' : 'code'
		);
	}
	
	/**
	 * Get all customers
	 *
	 * Get all customers subscribed to any product
	 *
	 * @param array|null $filters
	 * @return CG_Response
	 * @throws CG_Client_Exception
	 */
	public function getAllCustomers(array $filters = null) {
		if ($this->getProductCode()) {
			throw new CG_Client_Exception("Can't use a productCode when requesting getAllCustomers()", CG_Client_Exception::USAGE_INVALID);
		}
		return new CG_Response($this->request('/customers/get-all', $filters));
	}
	
	/**
	 * Create new customer
	 *
	 * @param array|null $data
	 * @return CG_Response
	 */
	public function newCustomer(array $data) {
		return new CG_Response($this->request('/customers/new', $data));
	}
	
	/**
	 * Change customer information
	 *
	 * @param array|null $data
	 * @return CG_Response
	 */
	public function editCustomer(array $data) {
		return new CG_Response($this->request('/customers/edit', $data));
	}
	
	/**
	 * Increment a usage item quantity
	 * 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and [quantity]
	 * @return CG_Response
	 */
	public function addItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CG_Response(
			$this->request(
				'/customers/add-item-quantity/' . (($id) ? '/id/'.$id : '/code/'.$code),
				$data
			)
		);
	}
	
	/**
	 * Set a usage item quantity
	 * 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and quantity
	 * @return CG_Response
	 */
	public function setItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CG_Response(
			$this->request(
				'/customers/set-item-quantity/' . (($id) ? '/id/'.$id : '/code/'.$code),
				$data
			)
		);
	}
	
	
	/**
	 * Execute CheddarGetter API request
	 *
	 * @param string $path Path to the API action
	 * @param array|null $args HTTP post key value pairs
	 * @return string Body of the response from the CheddarGetter API
	 * @throws CG_Client_Exception Throws an exception if neither Zend_Http_Client nor php-curl is available.  Also, when curl is used, this exception is thrown if the curl session results in an error.  When Zend_Http_Client is used, a Zend_Http_Client_Exception may be thrown under a number of conditions but most likely if the tcp socket fails to connect.
	 */
	protected function request($path, array $args = null) {
		$url = $this->_url . '/xml/' . $path . ( ($this->getProductCode()) ? '/productCode/' . $this->getProductCode() : '' );
		$url = preg_replace('~(\w)/+~', '\1/', $url);
		
		$http = null; //$this->getHttpClient();
		
		if (class_exists('Zend_Http_Client') && (!$http || $http instanceof Zend_Http_Client)) {
			if (!$http) {
				$userAgent = (isset($_SERVER['SERVER_NAME']) && isset($_SERVER['SERVER_SIGNATURE'])) ? $_SERVER['SERVER_NAME'] . ' - ' . $_SERVER['SERVER_SIGNATURE'] : 'CG_Client PHP';
				
				$http = new Zend_Http_Client(
					$url, 
					array(
						'timeout'		=> 60,
						'useragent'		=> $userAgent/*,
						'keepalive'		=> true*/
					)
				);
				$this->setHttpClient($http);
			} else {
				if ($http->getUri() != $url) {
					$http->setUri($url);
				}
			}
			
			$http->setAuth($this->getUsername(), $this->_getPassword());
			
			if ($args) {
				$http->setMethod(Zend_Http_Client::POST);
				$http->setParameterPost($args);
			} else {
				$http->setMethod(Zend_Http_Client::GET);
				$http->resetParameters();
			}
			
			return $http->request()->getBody();
		} else if (function_exists('curl_init') && (!$http || (is_resource($http) && get_resource_type($http) == 'curl')) ) {
			if (!$http) {
				$http = curl_init($url);
				$this->setHttpClient($http);
				$options = array(
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_CONNECTTIMEOUT => 10,
					CURLOPT_TIMEOUT => 60,
					CURLOPT_USERAGENT => $_SERVER['SERVER_NAME'] . ' - ' . $_SERVER['SERVER_SIGNATURE'],
					CURLOPT_USERPWD => $this->getUsername() . ':' . $this->_getPassword()
				);
				foreach ($options as $key=>$val) {
					curl_setopt($http, $key, $val);
				}
			} else {
				curl_setopt($http, CURLOPT_USERPWD, $this->getUsername() . ':' . $this->_getPassword());
				curl_setopt($http, CURLOPT_HTTPGET, true);
			}
				
			if ($args) {
				curl_setopt($http, CURLOPT_POST, true);
				curl_setopt($http, CURLOPT_POSTFIELDS, http_build_query($args, null, '&'));
			}
			
			$result = curl_exec($http);
			
			if ($result === false || curl_error($http) != '') {
				throw new CG_Client_Exception('cUrl session resulted in an error: (' . curl_errno($http) . ')' . curl_error($http), CG_Client_Exception::UNKNOWN); 
			}
			
			return $result;
		}
		
		throw new CG_Client_Exception("Either Zend_Http_Client and it's dependencies or the php curl extension is required.", CG_Client_Exception::USAGE_INVALID);
		
	}
	
	/**
	 * Set http client
	 *
	 * @param $client Zend_Http_Client|resource Either a Zend_Http_Client or curl resource.
	 * @return CG_Client
	 * @throws CG_Client_Exception 
	 */
	public function setHttpClient($client) {
		if ($client instanceof Zend_Http_Client || (is_resource($client) && get_resource_type($client) == 'curl')) { 
			$this->_httpClient = $client;
			return $this;
		} else {
			throw new CG_Client_Exception("httpClient can only be an instance of Zend_Http_Client or a php curl resource.", CG_Client_Exception::USAGE_INVALID);
		}
	}
	
	/**
	 * Get the current http client
	 *
	 * @return Zend_Http_Client|resource
	 */
	public function getHttpClient() {
		return $this->_httpClient;
	}
	
	/**
	 * Convenience method for requiring an identifier
	 *
	 * @param string $code
	 * @param string $id
	 * @return bool true if $code or $id exists
	 * @throws CG_Client_Exception if neither identifier exists
	 */
	private function _requireIdentifier($code, $id) {
		if (!$code && !$id) {
			throw new CG_Client_Exception('Either a code or id is required', CG_Client_Exception::USAGE_INVALID);
		}
		return true;
	}
	
}
