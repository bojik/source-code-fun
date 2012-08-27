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
 * @version $Id: Application.php 12 2012-01-06 10:48:12Z rav $
 */

/**
 * Main class of application 
 * @category Phifw
 * @package Phifw
 */
class Phifw_Application extends Phifw
{
    const CLASSNAME_PREFIX = 'Phifw';
    
    private static $_instance = null;
    
    private function __construct()
    {
    }
    
    private function __clone()
    {
        
    }
    
    /**
     * Returns instance of Phifm
     * @return Phifm
     */
    static function instance()
    {
       if (!(self::$_instance instanceof self)){
           self::$_instance = new self();
       }
       return self::$_instance;
    }
    
    public function init()
    {
        $this->_registerAutoload();
        
        if (get_magic_quotes_gpc()){
            $_REQUEST = $this->_removeMagicQuotes($_REQUEST);
            $_POST = $this->_removeMagicQuotes($_POST);
            $_GET = $this->_removeMagicQuotes($_GET);
        }
        
    }
    
    private function _registerAutoload()
    {
        Phifw_Loader::instance()->registerClassPath(self::CLASSNAME_PREFIX, PHIFW_CLASSES);
    }
    
    /**
     * Removes magic quotes recursively
     * 
     * @param mixed $val
     * @return mixed 
     */
    private function _removeMagicQuotes($val)
    {
        if (!is_array($val)){
            return stripslashes($val);
        }
        foreach ($val as $key => $value){
            $val[$key] = $this->_removeMagicQuotes($value);
        }
        return $val;
    }
    
}
