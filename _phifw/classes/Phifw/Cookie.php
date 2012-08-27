<?php
/** 
 *  @category   Phifw
 *  @copyright  Copyright (c) 2011 smstraffic.ru
 *  @author Alexander Rodionov
 *  @version $Id: Cookie.php 12 2012-01-06 10:48:12Z rav $
 */
class Phifw_Cookie
{
    private $_expire = 0;
    private $_path = '/';
    
    function __construct($expire = 0, $path = '/')
    {
        $this->_expire = $expire;
        $this->_path = $path;
    }
    
    function __get($name)
    {
        return  $this->getParam($name);
    }
    
    function __set($name, $value)
    {
        $this->setParam($name, $value);
    }
    
    /**
     * @param type $name
     * @param type $value
     * @return Phifw_Cookie 
     */
    function setParam($name, $value, $expire = null, $path = null)
    {
        if (is_null($expire)){
            $expire = $this->_expire;
        }
        
        if (is_null($path)){
            $path = $this->_path;
        }
        
        setcookie($name, $value, $expire, $path);
        $_COOKIE[$name] = $value;
        
        return $this;
    }
    
    /**
     *
     * @param type $name
     * @return mixed
     */
    function getParam($name)
    {
        if (!isset($_COOKIE[$name])){
            return null;
        }
        return $_COOKIE[$name];
    }
}
