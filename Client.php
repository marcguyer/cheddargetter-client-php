<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Client object for interacting with the CheddarGetter service
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
 
class CheddarGetter_Client {
	
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
	 * If you don't use Zend Framework, it's ok, the client will fallback to curl (so you need curl).
	 * 
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
	 * @return CheddarGetter_Client
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
	 * @return CheddarGetter_Client
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
	 * @return CheddarGetter_Client
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
	 * @return CheddarGetter_Client
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
					throw new CheddarGetter_Client_Exception('A product code is required for ' . __CLASS__ . '::' . $method . '().  Use ' . __CLASS__ . '::setProductCode()', CheddarGetter_Client_Exception::USAGE_INVALID);
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
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getPlans(array $filters = null) {
		return new CheddarGetter_Response( $this->request('/plans/get', $filters) );
	}
	
	/**
	 * Get a single pricing plan
	 *
	 * @param string $code Your code for the plan
	 * @param string|null $id CG id for the plan
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getPlan($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request('/plans/get/' . (($id) ? 'id/'.$id : 'code/'.$code) )
		);
	}
	
	/**
	 * Create new plan
	 *
	 * This method is not currently supported and could change in the future.
	 * Use at your own risk.
	 *
	 * @param array|null $data
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 *//*
	public function newPlan(array $data) {
		return new CheddarGetter_Response($this->request('/plans/new', $data));
	}*/
	
	/**
	 * Change plan information
	 *
	 * This method is not currently supported and could change in the future.
	 * Use at your own risk.
	 * 
	 * @param string $code Your code for the plan
	 * @param string|null $id CG id for the plan
	 * @param array|null $data
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 *//*
	public function editPlan($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/plans/edit/' . (($id) ? 'id/'.$id : 'code/'.$code), 
				$data
			)
		);
	}*/
	
	/**
	 * Delete a plan
	 *
	 * @param string $code Your code for the plan
	 * @param string|null $id CG id for the plan
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function deletePlan($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/plans/delete/' . (($id) ? 'id/'.$id : 'code/'.$code)
			)
		);
	}
	
	/**
	 * Get customers
	 *
	 * Get all customers in the product
	 *
	 * @param array|null $filters
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getCustomers(array $filters = null) {
		return new CheddarGetter_Response($this->request('/customers/get', $filters));
	}
	
	/**
	 * Get a single customer
	 *
	 * Get all plans in the product
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getCustomer($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request('/customers/get/' . (($id) ? 'id/'.$id : 'code/'.$code) )
		);
	}
	
	/**
	 * Get all customers
	 *
	 * Get all customers subscribed to any product
	 *
	 * @param array|null $filters
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Client_Exception
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getAllCustomers(array $filters = null) {
		if ($this->getProductCode()) {
			throw new CheddarGetter_Client_Exception("Can't use a productCode when requesting getAllCustomers()", CheddarGetter_Client_Exception::USAGE_INVALID);
		}
		return new CheddarGetter_Response($this->request('/customers/get-all', $filters));
	}
	
	/**
	 * Create new customer
	 *
	 * @param array|null $data
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function newCustomer(array $data) {
		return new CheddarGetter_Response($this->request('/customers/new', $data));
	}
	
	/**
	 * Change customer information
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array|null $data
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function editCustomer($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/edit/' . (($id) ? 'id/'.$id : 'code/'.$code), 
				$data
			)
		);
	}
	
	/**
	 * Delete a customer
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function deleteCustomer($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/delete/' . (($id) ? 'id/'.$id : 'code/'.$code)
			)
		);
	}
	
	/**
	 * Change subscription information
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array|null $data
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function editSubscription($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/edit-subscription/' . (($id) ? 'id/'.$id : 'code/'.$code),
				$data
			)
		);
	}
	
	/**
	 * Cancel subscription
	 *
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function cancelSubscription($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/cancel/' . (($id) ? 'id/'.$id : 'code/'.$code)
			)
		);
	}
	
	/**
	 * Increment a usage item quantity
	 * 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and [quantity]
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function addItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/add-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.$code),
				$data
			)
		);
	}
	
	/**
	 * Decrement a usage item quantity
	 * 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and [quantity]
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function removeItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/remove-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.$code),
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
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function setItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/set-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.$code),
				$data
			)
		);
	}
	
	/**
	 * Add a custom charge (debit) or credit to the current invoice
	 * 
	 * A positive 'eachAmount' will result in a debit. If negative, a credit.
	 * 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data chargeCode, quantity, eachAmount[, description]
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function addCharge($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/add-charge/' . (($id) ? 'id/'.$id : 'code/'.$code),
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
	 * @throws CheddarGetter_Client_Exception Throws an exception if neither Zend_Http_Client nor php-curl is available.  Also, when curl is used, this exception is thrown if the curl session results in an error.  When Zend_Http_Client is used, a Zend_Http_Client_Exception may be thrown under a number of conditions but most likely if the tcp socket fails to connect.
	 */
	protected function request($path, array $args = null) {
		$url = $this->_url . '/xml' . $path . ( ($this->getProductCode()) ? '/productCode/' . $this->getProductCode() : '' );
		
		$http = null; //$this->getHttpClient();
		
		if (class_exists('Zend_Http_Client') && (!$http || $http instanceof Zend_Http_Client)) {
			if (!$http) {
				$userAgent = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] . ' - CheddarGetter_Client PHP' : 'CheddarGetter_Client PHP';
				
				$http = new Zend_Http_Client(
					$url, 
					array(
						'timeout'		=> 60,
						'useragent'		=> $userAgent
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
				$userAgent = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] . ' - CheddarGetter_Client PHP' : 'CheddarGetter_Client PHP';
				$options = array(
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_SSL_VERIFYHOST => false,
					CURLOPT_CONNECTTIMEOUT => 10,
					CURLOPT_TIMEOUT => 60,
					CURLOPT_USERAGENT => $userAgent,
					CURLOPT_USERPWD => $this->getUsername() . ':' . $this->_getPassword(),
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_MAXREDIRS => 10
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
				throw new CheddarGetter_Client_Exception('cUrl session resulted in an error: (' . curl_errno($http) . ')' . curl_error($http), CheddarGetter_Client_Exception::UNKNOWN); 
			}
			
			return $result;
		}
		
		throw new CheddarGetter_Client_Exception("Either Zend_Http_Client and it's dependencies or the php curl extension is required.", CheddarGetter_Client_Exception::USAGE_INVALID);
		
	}
	
	/**
	 * Set http client
	 *
	 * @param $client Zend_Http_Client|resource Either a Zend_Http_Client or curl resource.
	 * @return CheddarGetter_Client
	 * @throws CheddarGetter_Client_Exception 
	 */
	public function setHttpClient($client) {
		if ($client instanceof Zend_Http_Client || (is_resource($client) && get_resource_type($client) == 'curl')) { 
			$this->_httpClient = $client;
			return $this;
		} else {
			throw new CheddarGetter_Client_Exception("httpClient can only be an instance of Zend_Http_Client or a php curl resource.", CheddarGetter_Client_Exception::USAGE_INVALID);
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
	 * @throws CheddarGetter_Client_Exception if neither identifier exists
	 */
	private function _requireIdentifier($code, $id) {
		if (!$code && !$id) {
			throw new CheddarGetter_Client_Exception('Either a code or id is required', CheddarGetter_Client_Exception::USAGE_INVALID);
		}
		return true;
	}
	
}
