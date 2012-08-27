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
 * @version $Id: Loader.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * Class file loader
 * Example 
 * 
 * Phifw_Loader::instance()->init();
 * 
 * @category Phifw
 * @package Phifw
 * @subpackage Loader
 */
class Phifw_Loader extends Phifw
{
    private static $_instance = null;
    private $_classPathes = array ();
    
    /**
     * @param array $params 
     */
    private function __construct()
    {
        spl_autoload_register(array ($this, '_loadClass'));
    }
    
    private function __clone()
    {
        
    }
    
    /**
     * Returns instance of class
     * 
     * @return Phifw_Loader
     */
    static function instance()
    {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Append new class path by prefix. If prefix already exists it will rewrite it
     * 
     * @param string $classPrefix class namespace 
     * @param string $classRoot full path to class dir
     * @param string $extension extension of class file
     * @return Phifw_Loader
     */
    function registerClassPath($classPrefix, $classPath, $extension = '.php')
    {
        $this->_classPathes[$classPrefix] = array ($classPath, $extension);
        return $this;
    }
    
    /**
     * Removes class path from search params
     * @param string $classPrefix class namespace
     */
    function unregisterClassPath($classPrefix)
    {
        unset($this->_classPathes[$classPrefix]);
    }
    

   private function _loadClass($className)
   {
       foreach ($this->_classPathes as $namespace => $params){
           list($path, $extension) = $params;
           if ($namespace == substr($className, 0, strlen($namespace))){
               $fileName = $this->_getFileName($className, $path, $extension);
               if ($fileName !== false){
                   require_once $fileName;
                   break;
               }
           }
       }
           
   }
   
   private function _getFileName($class, $path, $extension)
   {
       $path = $path.DIRECTORY_SEPARATOR.str_replace('_', DIRECTORY_SEPARATOR, $class).$extension;
       if (file_exists($path)){
           return $path;
       }
       return false;
   }
}
