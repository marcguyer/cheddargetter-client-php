<?php
/**
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@sproutbox.com>
 */
/**
 * Response exception object 
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@sproutbox.com>
 */
 
class CheddarGetter_Client_Exception extends Exception {
	
	const REQUEST_INVALID = 400;
	const PRECONDITION_FAILED = 412;
	const NOT_FOUND = 404;
	const DATA_INVALID = 500;
	const USAGE_INVALID = 500;
	const UNKNOWN = 500;
	
}
