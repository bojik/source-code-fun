<?php
/**
 * Phifw
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * 
 * @category Phifw
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Ajax.php 66 2012-02-19 10:38:53Z rav $
 */

/**
 * Response of ajax requests
 * 
 * @category Phifw
 * @package Phifw
 */
class Phifw_Ajax extends Phifw
{
    private $data = array();

    function  __construct($data = array ())
    {
        $this->data = $data;
    }
    
    /**
     * @param string $key
     * @param mixed $value
     * @return Phifw_Ajax
     */
    static function instance($data = array ())
    {
        $class = __CLASS__;
        return new $class($data);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Phifw_Ajax
     */
    function setParam($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    function getParam($key)
    {
        return !isset($this->data[$key]) ? null : $this->data[$key];
    }

    function __get($key)
    {
        return $this->getParam($key);
    }

    function __set($key, $value)
    {
        $this->setParam($key, $value);
    }

    function sendResponse()
    {
        header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
        header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
        header( 'Cache-Control: no-store, no-cache, must-revalidate' );
        header( 'Cache-Control: post-check=0, pre-check=0', false );
        header( 'Pragma: no-cache' );         
        echo json_encode($this->data);
        exit;
    }
    
}
