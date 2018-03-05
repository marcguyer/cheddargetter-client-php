<?php

/**
 * CheddarGetter
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Marc Guyer <marc@cheddargetter.com>
 */
/**
 * Adapter implementation using the ZF1 abstraction for getting and
 * setting http related data
 * @category CheddarGetter
 * @package CheddarGetter
 * @author Christophe Coevoet <stof@notk.org>
 * @example example/example.php
 * @todo use the ZF abstraction for other methods
 */

class CheddarGetter_Http_ZendAdapter extends CheddarGetter_Http_NativeAdapter
{

    /**
     * The request object
     *
     * @var Zend_Controller_Request_Abstract|null
     */
    private $_request;

    /**
     * Constructor
     * @throws CheddarGetter_Client_Exception Throws an exception if
     * Zend_Controller_Front is not available.
     */
    public function __construct()
    {
        if (!class_exists('Zend_Controller_Front', false)) {
            throw new CheddarGetter_Client_Exception(
                'The Zend front controller is not available.',
                CheddarGetter_Client_Exception::USAGE_INVALID
            );
        }
    }

    /**
     * Get the reqeust object
     * @return Zend_Controller_Request_Abstract
     */
    private function _request()
    {
        if ($this->_request) {
            return $this->_request;
        }
        $this->_request = Zend_Controller_Front::getInstance()->getRequest();
        return $this->_request;
    }

    /**
     * Get a request param
     * @param string $key
     * @return mixed
     */
    public function getRequestValue($key)
    {
        return $this->_request() ? $this->_request()->getParam($key) : null;
    }

    /**
     * Checks whether a cookie exists.
     *
     * @param string $name Cookie name
     * @return boolean
     */
    public function hasCookie($name)
    {
        return (bool) $this->getCookie($name);
    }

    /**
     * Gets the value of a cookie.
     *
     * @param string $name Cookie name
     * @return mixed
     */
    public function getCookie($name)
    {
        return $this->_request() ?
            $this->_request()->getCookie($name) :
            null;
    }

    /**
     * Check if the http referrer is set
     * @return boolean
     */
    public function hasReferrer()
    {
        return $this->_request() ?
            (bool) $this->_request()->getServer('HTTP_REFERER') :
            false;
    }

    /**
     * Get the http referrer
     * @return string
     */
    public function getReferrer()
    {
        return $this->_request() ?
            $this->_request()->getServer('HTTP_REFERER') :
            null;
    }

    /**
     * Check if the remote ip is known
     * @return boolean
     */
    public function hasIp()
    {
        return (bool) $this->_getIp();
    }

    /**
     * Get the remote ip
     * @return string
     */
    public function getIp()
    {
        return $this->_getIp();
    }

    /**
     * Get a good ipv4
     * @return string
     */
    protected function _getIp()
    {
        if (!$this->_request()) {
            return null;
        }
        $ip = $this->_request()->getClientIp();

        if ($this->_isValidIpv4($ip)) {
            return $ip;
        }

        // sometimes the value is multiple IPs separated by commas
        // (when there are multiple proxies, for example)
        $ips = explode(',', $ip, 2);
        $ip = trim($ips[0]);
        if ($this->_isValidIpv4($ip)) {
            return $ip;
        }

        return null;
    }

    /**
     * Validate IPv4
     */
    protected function _isValidIpv4($val)
    {
        return filter_var($val, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
}
