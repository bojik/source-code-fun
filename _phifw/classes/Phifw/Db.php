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
 * @version $Id: Db.php 12 2012-01-06 10:48:12Z rav $
 */

/**
 * Wrapper for AdoDb
 * @category Phifw
 * @package Phifw
 */
require_once PHIFW_LIBS.'/adodb_lite/adodb-exceptions.inc.php';
require_once PHIFW_LIBS.'/adodb_lite/adodb.inc.php';
class Phifw_Db
{
    private $_driver;
    private $_host;
    private $_user;
    private $_password;
    private $_db;
    private $_port;
    
    /**
     * Constructor
     * 
     * @param string $driver driver
     * @param string $host db host
     * @param string $user db user
     * @param string $password db password
     * @param string $db db name
     * @param string $port db port
     */
    function __construct($driver, $host, $user, $password, $db, $port)
    {
        $this->_driver = $driver;
        $this->_host = $host;
        $this->_user = $user;
        $this->_password = $password;
        $this->_db = $db;
        $this->_port = $port;
    }
    
    /**
     *
     * @return ADOConnection
     */
    function createConnection()
    {
       $ret = ADONewConnection($this->_driver);
       $ret->port = $this->_port;
       $ret->Connect($this->_host, $this->_user, $this->_password, $this->_db);
       return $ret;
    }
    
}
