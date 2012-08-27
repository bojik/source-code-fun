<?php
/** 
 *  @category   Phifw
 *  @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 *  @author Alexander Rodionov
 *  @version $Id: Session.php 66 2012-02-19 10:38:53Z rav $
 */

class Phifw_Session
{
    private $namespace = '';
    function  __construct($namespace)
    {
        if (!isset($_SESSION)){
            session_start();
        }
        $this->namespace = $namespace;
    }

    function  __get($name)
    {
        return $this->getParam($name);
    }

    function  __set($name, $value)
    {
        $this->setParam($name, $value);
    }

    function  __isset($name) {
        return isset ($_SESSION[$this->namespace][$name]);
    }


    /**
     * @param string $name
     * @return mixed
     */
    function getParam($name)
    {
        if (!isset ($_SESSION[$this->namespace][$name])){
            return null;
        }
        return $_SESSION[$this->namespace][$name];
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return Session
     */
    function setParam($name, $value)
    {
        $_SESSION[$this->namespace][$name] = $value;
        return $this;
    }

    /**
     * @param string $namespace
     * @return Session
     */
    static function instance($namespace)
    {
        $class = __CLASS__;
        return new $class($namespace);
    }

    function clear()
    {
        unset($_SESSION[$this->namespace]);
    }

/**
 * Destroys all data into session
 * @return boolean
 */
    static function clearAll()
    {
        $_SESSION = array ();
        return session_destroy();
    }
}
