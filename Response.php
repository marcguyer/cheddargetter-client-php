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
 
class CheddarGetter_Response extends DOMDocument {
	
	private $_responseType;
	
	public function __construct($response) {
		parent::__construct('1.0', 'UTF-8');
		if (!$this->loadXML($response)) {
			throw new CheddarGetter_Response_Exception("Response failed to load into the DOM.", CheddarGetter_Response_Exception::UNKNOWN);
		}
		
		if ($this->documentElement->nodeName == 'error') {
			$this->_responseType = 'errors';
			$this->handleError();
		}
	}
	
	public function getReponseType() {
		return $this->_responseType;
	}
	
	public function toArray() {
		$root = $this->documentElement;
		if ($root == 'error') {
			$this->_responseType = 'errors';
			return array(
				0 => array(
					'code' => $root->getAttribute('code'),
					'message' => $root->firstChild->nodeValue
				)
			);
		}
		
		$this->_responseType = $root->nodeName;
		set_time_limit(5);
		return $this->_toArray($root->childNodes);
		
	}
	
	public function toJson() {
		return json_encode($this->toArray());
	}
	
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
	
	protected function handleError() {
		throw new CheddarGetter_Response_Exception($this->documentElement->firstChild->nodeValue, $this->documentElement->getAttribute('code'));
	}
	
	public function __toString() {
		return $this->saveXML();
	}
	
}
