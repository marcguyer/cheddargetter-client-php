<?php
/**
 * CheddarGetter
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Response exception object
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 * @link http://support.cheddargetter.com/kb/api-8/error-handling
 */

class CheddarGetter_Response_Exception extends Exception {

	const REQUEST_INVALID = 400;
	const NOT_FOUND = 404;
	const PRECONDITION_FAILED = 412;
	const UNPROCESSABLE_ENTITY = 422;
	const DATA_INVALID = 500;
	const USAGE_INVALID = 500;
	const UNKNOWN = 500;

	/**
	 * The log id of the error
	 * @var int|null
	 */
	protected $id;
	/**
	 * The auxCode of the error
	 *
	 * The auxCode is set if the error response contains one.
	 * It references additional information about the error.
	 * For more information, see the error handling KB article
	 * @var string|null
	 * @link http://support.cheddargetter.com/kb/api-8/error-handling
	 */
	protected $auxCode;

	/**
	 * Constructor
	 * @param string|null $message The message from the error response
	 * @param int $code The error code from the response (http status code)
	 * @param string|null $id The log id of the error record
	 * @param string|null $auxCode The auxCode from the error response
	 */
	public function __construct($message = null, $code = 0, $id = null, $auxCode = null) {
		parent::__construct($message, $code);
		$this->setId($id);
		$this->setAuxCode($auxCode);
	}

	/**
	 * Set the error log id
	 * @param int
	 * @return CheddarGetter_Response_Exception
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Set the auxCode
	 * @param string
	 * @return CheddarGetter_Response_Exception
	 */
	public function setAuxCode($auxCode) {
		$this->auxCode = $auxCode;
		return $this;
	}

	/**
	 * Get the error log id
	 * @return int|null
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Get the error auxCode
	 * @return string|null
	 */
	public function getAuxCode() {
		return $this->auxCode;
	}

}
