<?php

/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Response object
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
 
class CheddarGetter_Response extends DOMDocument {
	
	private $_responseType;
	private $_array;
	
	/**
	 * Constructor
	 *
	 * @param $response string well formed xml
	 * @throws CheddarGetter_Response_Exception in the even the xml is not well formed
	 */
	public function __construct($response) {
		$this->_array = null;
		parent::__construct('1.0', 'UTF-8');
		if (!$this->loadXML($response)) {
			throw new CheddarGetter_Response_Exception("Response failed to load into the DOM.\n\n$response", CheddarGetter_Response_Exception::UNKNOWN);
		}
		
		if ($this->documentElement->nodeName == 'error') {
			$this->_responseType = 'error';
			$this->handleError();
		}
		$this->_responseType = $this->documentElement->nodeName;
	}
	
	/**
	 * Get the response type for this request object -- usually corresponds to the root node name
	 *
	 * @return string
	 */
	public function getResponseType() {
		return $this->_responseType;
	}
	
	/**
	 * Get a nested array representation of the response doc
	 *
	 * @return array
	 */
	public function toArray() {
		if ($this->_array) {
			return $this->_array;
		}
		$root = $this->documentElement;
		if ($root == 'error') {
			return array(
				0 => array(
					'code' => $root->getAttribute('code'),
					'message' => $root->firstChild->nodeValue
				)
			);
		}
		$this->_array = $this->_toArray($root->childNodes);
		return $this->_array;
		
	}
	
	/**
	 * Get a JSON encoded string representation of the response doc
	 *
	 * @return string
	 */
	public function toJson() {
		return json_encode($this->toArray());
	}
	
	/**
	 * Recursive method to traverse the dom and produce an array
	 *
	 * @return array
	 */
	protected function _toArray(DOMNodeList $nodes) {
		foreach ($nodes as $node) {
			if ($node->nodeType != XML_ELEMENT_NODE) {
				continue;
			}
			
			if ($node->hasAttributes()) { // deep
				if ($node->hasAttribute('code') && $node->getAttribute('code')) {  
					$key = $node->getAttribute('code');
					$array[$key] = array();
					if ($node->hasAttribute('id')) {
						$array[$key] = array(
							'id' => $node->getAttribute('id')
						);
					}
					$array[$key] = $array[$key] + array('code'=>$key);
				} else {
					$key = $node->getAttribute('id');
					$array[$key] = array();
				}
				$array[$key] = $array[$key] + $this->_toArray($node->childNodes);
			} else {
				if ($node->childNodes->length > 1) { // sub array
					$array[$node->tagName] = $this->_toArray($node->childNodes);
				} else {
					$array[$node->tagName] = $node->nodeValue;
				}
			}
		}
		return $array;
	}
	
	/**
	 * Get an array representation of a single customer node
	 *
	 * @return array
	 */
	public function getCustomer($code = null) {
		if ($this->getResponseType() != 'customers') {
			throw new CheddarGetter_Response_Exception("Can't get a customer from a response doc that isn't of type 'customers'", CheddarGetter_Response_Exception::USAGE_INVALID);
		}
		if (!$code && $this->getElementsByTagName('customer')->length > 1) {
			throw new CheddarGetter_Response_Exception("This response contains more than one customer so you need to provide the code for the customer you wish to get", CheddarGetter_Response_Exception::USAGE_INVALID);
		}
		if (!$code) {
			return current($this->toArray());
		}
		$array = $this->toArray();
		return $array[$code];
	}
	
	/**
	 * Get an array representation of a single customer's current subscription
	 *
	 * @return array
	 */
	public function getCustomerSubscription($code = null) {
		$customer = $this->getCustomer($code);
		return current($customer['subscriptions']);
	}
	
	/**
	 * Get an array representation of a single customer's currently subscribed plan
	 *
	 * @return array
	 */
	public function getCustomerPlan($code = null) {
		$subscription = $this->getCustomerSubscription($code);
		return current($subscription['plans']);
	}
	
	/**
	 * Get an array representation of a single customer's current invoice
	 *
	 * @return array
	 */
	public function getCustomerInvoice($code = null) {
		$subscription = $this->getCustomerSubscription($code);
		return current($subscription['invoices']);
	}
	
	/**
	 * Get an array of a customer's item quantity and quantity included
	 *
	 * @return array 2 keys: 'item' (item config for this plan) and 'quantity' the customer's current quantity usage
	 */
	public function getCustomerItemQuantity($code = null, $itemCode = null) {
		$subscription = $this->getCustomerSubscription($code);
		if (!$itemCode && count($subscription['items']) > 1) {
			throw new CheddarGetter_Response_Exception("This customer's subscription contains more than one item so you need to provide the code for the item you wish to get", CheddarGetter_Response_Exception::USAGE_INVALID);
		}
		$plan = $this->getCustomerPlan($code);
		if ($itemCode) {
			$item = $plan['items'][$itemCode];
			$itemQuantity = $subscription['items'][$itemCode];
		} else {
			$item = current($plan['items']);
			$itemQuantity = current($subscription['items']);
		}
		return array(
			'item' => $item,
			'quantity' => $itemQuantity
		);
	}
	
	protected function handleError() {
		throw new CheddarGetter_Response_Exception($this->documentElement->firstChild->nodeValue, $this->documentElement->getAttribute('code'));
	}
	
	public function __toString() {
		return $this->saveXML();
	}
	
}
