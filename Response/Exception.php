<?php
/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Response exception object 
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
 
class CheddarGetter_Response_Exception extends Exception {
	
	const REQUEST_INVALID = 400;
	const NOT_FOUND = 404;
	const PRECONDITION_FAILED = 412;
	const UNPROCESSABLE_ENTITY = 422;
	const DATA_INVALID = 500;
	const USAGE_INVALID = 500;
	const UNKNOWN = 500;
	
	protected $id;
	protected $auxCode;
	
	public function __construct($message = null, $code = 0, $id = null, $auxCode = null) {
		parent::__construct($message, $code);
		$this->setId($id);
		$this->setAuxCode($auxCode);
	}
	
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	public function setAuxCode($auxCode) {
		$this->auxCode = $auxCode;
		return $this;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getAuxCode() {
		return $this->auxCode;
	}
	
}
