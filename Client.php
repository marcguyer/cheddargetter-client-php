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
 * @example example/example.php
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
	 * @var string Product identifier (not necessary if productCode is used)
	 */
	private $_productId;
	
	/**
	 * @var string Name to use for the marketing cookie
	 * @see setMarketingCookie
	 */
	private $_marketingCookieName = 'CGMK';
	
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
	public function __construct($url, $username, $password, $productCode = null, $productId = null) {
		
		$this->setUrl($url);
		$this->setUsername($username);
		$this->setPassword($password);
		$this->setProductCode($productCode);
		$this->setProductId($productId);
		
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
	 * Set product id (required for all calls except getAllCustomers unless productCode is used)
	 *
	 * @param $productId string
	 * @return CheddarGetter_Client
	 */
	public function setProductId($productId) {
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * Get current product id 
	 *
	 * @return string
	 */
	public function getProductId() {
		return $this->_productId;
	}
	
	/**
	 * Set name for marketing metrics cookie
	 *
	 * @see setMarketingCookie
	 * @param $name string
	 * @return CheddarGetter_Client
	 */
	public function setMarketingCookieName($name) {
		$this->_marketingCookieName = $name;
		return $this; 
	}
	
	/**
	 * Get marketing cookie name
	 *
	 * @see setMarketingCookie
	 * @return string
	 */
	public function getMarketingCookieName() {
		return $this->_marketingCookieName;
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
				if (!$this->getProductCode() && !$this->getProductId()) {
					throw new CheddarGetter_Client_Exception('A product code is required for ' . __CLASS__ . '::' . $method . '().  Use ' . __CLASS__ . '::setProductCode()', CheddarGetter_Client_Exception::USAGE_INVALID);
				}
		}
		return call_user_func_array(array($this, $method), $args);
	}
	
	/**
	 * Get pricing plans
	 *
	 * Get all plans in the product.
	 *
	 * @link https://cheddargetter.com/developers#all-plans
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
	 * @link https://cheddargetter.com/developers#single-plan
	 * @param string $code Your code for the plan
	 * @param string|null $id CG id for the plan
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getPlan($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request('/plans/get/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)) )
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
				'/plans/edit/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)), 
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
				'/plans/delete/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code))
			)
		);
	}
	
	/**
	 * Get customers
	 *
	 * Get all customers in the product
	 *
	 * @link https://cheddargetter.com/developers#all-customers
	 * @param array|null $filters {@link https://cheddargetter.com/developers#all-customers}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getCustomers(array $filters = null) {
		return new CheddarGetter_Response($this->request('/customers/get', $filters));
	}
	
	/**
	 * Get a single customer
	 *
	 * @link https://cheddargetter.com/developers#single-customer
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function getCustomer($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request('/customers/get/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)) )
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
		
		// this doesn't work yet
		throw new CheddarGetter_Client_Exception("This method is a stub for future functionality.  You're probable looking for CheddarGetter_Client::getCustomers()", CheddarGetter_Client_Exception::USAGE_INVALID);
		
		if ($this->getProductCode()) {
			throw new CheddarGetter_Client_Exception("Can't use a productCode when requesting getAllCustomers()", CheddarGetter_Client_Exception::USAGE_INVALID);
		}
		return new CheddarGetter_Response($this->request('/customers/get-all', $filters));
	}
	
	/**
	 * Create new customer
	 *
	 * @link https://cheddargetter.com/developers#add-customer
	 * @see setMarketingCookie
	 * @param array|null $data {@link https://cheddargetter.com/developers#add-customer}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function newCustomer(array $data) {
		
		if (isset($_COOKIE[$this->getMarketingCookieName()])) {
			// if there's marketing cookie information, add it to the data
			$marketingFields = array(
				'firstContactDatetime',
				'referer',
				'campaignTerm', 
				'campaignName', 
				'campaignSource', 
				'campaignMedium', 
				'campaignContent'			
			);
			$intersect = array_intersect($marketingFields, array_keys($data));
			if (empty($intersect)) {
				$cookieData = json_decode($_COOKIE[$this->getMarketingCookieName()]);
				foreach ($marketingFields as $f) {
					$data[$f] = $cookieData->{$f};
				}
			}
		}
		
		return new CheddarGetter_Response($this->request('/customers/new', $data));
	}
	
	/**
	 * Change customer and subscription information
	 *
	 * @link https://cheddargetter.com/developers#update-customer-subscription
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array|null $data {@link https://cheddargetter.com/developers#update-customer-subscription}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function editCustomer($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/edit/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)), 
				$data
			)
		);
	}
	
	/**
	 * Change customer information only
	 *
	 * @link https://cheddargetter.com/developers#update-customer
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array|null $data {@link https://cheddargetter.com/developers#update-customer}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function editCustomerOnly($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/edit-customer/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)), 
				$data
			)
		);
	}
	
	/**
	 * Delete a customer
	 *
	 * @link https://cheddargetter.com/developers#delete-customer
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function deleteCustomer($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/delete/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code))
			)
		);
	}
	
	/**
	 * Delete all customers
	 *
	 * WARNING: This will delete all customers and all related data in 
	 * CheddarGetter and will delete all customer data at the gateway 
	 * if a gateway is configured.
	 *
	 * @link https://cheddargetter.com/developers#delete-all-customers
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function deleteCustomers() {
		return new CheddarGetter_Response(
			$this->request(
				'/customers/delete-all/confirm/1'
			)
		);
	}
	
	/**
	 * Change subscription information
	 *
	 * @link https://cheddargetter.com/developers#update-subscription
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array|null $data {@link https://cheddargetter.com/developers#update-subscription}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function editSubscription($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/edit-subscription/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
				$data
			)
		);
	}
	
	/**
	 * Cancel subscription
	 *
	 * @link https://cheddargetter.com/developers#cancel-subscription
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function cancelSubscription($code, $id = null) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/cancel/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code))
			)
		);
	}
	
	/**
	 * Increment a usage item quantity
	 *
	 * @link https://cheddargetter.com/developers#add-item-quantity
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and [quantity] {@link https://cheddargetter.com/developers#add-item-quantity}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function addItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/add-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
				$data
			)
		);
	}
	
	/**
	 * Decrement a usage item quantity
	 *
	 * @link https://cheddargetter.com/developers#remove-item-quantity
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and [quantity] {@link https://cheddargetter.com/developers#remove-item-quantity}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function removeItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/remove-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
				$data
			)
		);
	}
	
	/**
	 * Set a usage item quantity
	 *
	 * @link https://cheddargetter.com/developers#set-item-quantity
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data Your (itemCode or CG itemId) and quantity {@link https://cheddargetter.com/developers#set-item-quantity}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function setItemQuantity($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/set-item-quantity/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
				$data
			)
		);
	}
	
	/**
	 * Add a custom charge (debit) or credit to the current invoice
	 * 
	 * A positive 'eachAmount' will result in a debit. If negative, a credit.
	 *
	 * @link https://cheddargetter.com/developers#add-charge 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data chargeCode, quantity, eachAmount[, description] {@link https://cheddargetter.com/developers#add-charge}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function addCharge($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/add-charge/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
				$data
			)
		);
	}
	
	/**
	 * Delete a custom charge (debit) or credit from the customer's current invoice
	 * 
	 * CG's chargeId is required (found in the customers/get response)
	 *
	 * @link https://cheddargetter.com/developers#delete-charge 
	 * @param string $code Your code for the customer
	 * @param string|null $id CG id for the customer
	 * @param array $data chargeId {@link https://cheddargetter.com/developers#delete-charge}
	 * @return CheddarGetter_Response
	 * @throws CheddarGetter_Response_Exception
	 */
	public function deleteCharge($code, $id = null, array $data) {
		$this->_requireIdentifier($code, $id);
		return new CheddarGetter_Response(
			$this->request(
				'/customers/delete-charge/' . (($id) ? 'id/'.$id : 'code/'.urlencode($code)),
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
		$url = $this->_url . '/xml' . $path;
		if ($this->getProductId()) {
			$url .= '/productId/' . urlencode($this->getProductId());
		} else if ($this->getProductCode()) {
			$url .= '/productCode/' . urlencode($this->getProductCode());
		}
		
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
	
	/**
	 * Convenience wrapper of setcookie() for setting a persistent cookie containing marketing metrics compatible with CheddarGetter's marketing metrics tracking.
	 * 
	 * Running this method on every request to your marketing site sets or refines the marketing cookie data over time.  There is no performance disadvantage to running this method on every request.
	 * 
	 * If a lead has this cookie set at the time of signup, CheddarGetter_Client::newCustomer() will automatically add the data to the customer record.  In other words, simply run this method on every request and there's nothing else to do to take advantage of the metrics tracking in CheddarGetter. 
	 * 
	 * {@link http://support.cheddargetter.com/faqs/marketing-metrics/marketing-metrics More about CheddarGetter's marketing metrics tracking } 
	 * 
	 * @see newCustomer
	 * @param string $cookieName 
	 * @param int $expire 
	 * @param string $path
	 * @param string $domain
	 * @param bool $secure
	 * @param bool $httpOnly
	 * @throws CheddarGetter_Client_Exception if headers are already sent
	 */
	public static function setMarketingCookie($cookieName = 'CGMK', $expire = null, $path = '/', $domain = null, $secure = false, $httpOnly = false) {
		
		// default to a two year cookie
		if (!$expire) {
			$expire = time() + 60*60*24*365*2;
		}
		
		$utmParams = array(
			'utm_term' => 'campaignTerm', 
			'utm_campaign' => 'campaignName', 
			'utm_source' => 'campaignSource', 
			'utm_medium' => 'campaignMedium', 
			'utm_content' => 'campaignContent' 
		);
	
		// no cookie yet -- set the first contact date and referer in the cookie
		// (only first request)
		if (!isset($_COOKIE[$cookieName])) {
	
			// when did this lead first find us? (right now!)
			// we'll use this to determine the customer "vintage"
			$cookieData = array('firstContactDatetime' => date('c'));
	
			// if there's a __utma cookie, we can get a more accurate time
			// which helps us get better data from visitors who first found us
			// before we started setting our own cookie
			if ( isset($_COOKIE['__utma']) ) {
				list(
					$domainHash, $visitorId, $initialVisit, $previousVisit, $currentVisit, $visitCounter
				) = explode('.', $_COOKIE['__utma']);
				if (isset($initialVisit) && $initialVisit && is_int($initialVisit)) {
					$cookieData['firstContactDatetime'] = date('c', $initialVisit);
				}
			}
	
			// set the raw referer (defaults to 'direct')
			$cookieData['referer'] = 'direct';
			if (isset($_SERVER['HTTP_REFERER'])) {
				$cookieData['referer'] = $_SERVER['HTTP_REFERER'];
			}
	
			// if there's some utm vars
			// When tagging your inbound links for google analytics 
			//   http://www.google.com/support/analytics/bin/answer.py?answer=55518
			// our cookie will also benenfit by the added params
			foreach ($utmParams as $key=>$val) {
				// do it with the Zend Framework front controller if available 
				if (class_exists('Zend_Controller_Front')) {
					$fc = Zend_Controller_Front::getInstance();
					$cookieData[$val] = $fc->getRequest()->getParam($key);
				} else {
					$cookieData[$val] = ($_REQUEST[$key]) ? $_REQUEST[$key] : null;
				}
			}
			
			if (!headers_sent()) {
				// set the cookie and make it last 2 years
				return setcookie($cookieName, json_encode($cookieData), $expire, $path, $domain, $secure, $httpOnly);
			}
		
		// cookie is already set but maybe we can refine it with __utmz data
		// (second and subsequent requests)
		} else if (isset($_COOKIE['__utmz'])) {
			// get the existing cookie information
			$cookieData = (array) json_decode($_COOKIE[$cookieName]);
			
			// see if the cookie is baked
			// it's baked when it has firstContact, referer and at least one other value
			if (isset($cookieData['firstContactDatetime']) && isset($cookieData['referer'])
				&& $cookieData['firstContactDatetime'] && $cookieData['referer']
			) {
				$baked = false;
				foreach ($utmParams as $key=>$val) {
					if ($cookieData[$val]) {
						$baked = true;
						break;
					}
				}
				if (!$baked) {
					// split the __utmz cookie on periods
					list(
						$domainHash, $timestamp, $sessionNumber, $campaignNumber, $campaignData
					) = explode('.', $_COOKIE['__utmz']);
	
					// parse the data
					parse_str(strtr($campaignData, "|", "&"));
	
					// see if it's a google adwords lead 
					// in this case, we only get the keyword
					if (isset($utmgclid) && $utmgclid) {
						$cookieData['campaignSource'] = 'google';
						$cookieData['campaignMedium'] = 'ppc';
						$cookieData['campaignTerm'] = (isset($utmctr)) ? $utmctr : '';
					} else {
						$cookieData['campaignSource'] = (isset($utmcsr)) ? $utmcsr : '';
						$cookieData['campaignName'] = (isset($utmccn)) ? $utmccn : '';
						$cookieData['campaignMedium'] = (isset($utmcmd)) ? $utmcmd : '';
						$cookieData['campaignTerm'] = (isset($utmctr)) ? $utmctr : '';
						$cookieData['campaignContent'] = (isset($utmcct)) ? $utmcct : '';
					}
					
					if (!headers_sent()) {
						// set the cookie again
						return setcookie($cookieName, json_encode($cookieData), $expire, $path, $domain, $secure, $httpOnly);
					}
				}
			}
		}
	 	 
	 }
	
}
