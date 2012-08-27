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
 * @version $Id: Routing.php 12 2012-01-06 10:48:12Z rav $
 */

/**
 * Routing of pages
 * @category Phifw
 * @package Phifw
 */
class Phifw_Routing extends Phifw
{
    private static $instance = null;
    private $url_parts = array();
    private $routing_table = array ();
    private $error404 = array ();


    private function __construct(){}
    private function __clone(){}

    /**
     * Reuqest URI key 
     */
    const REQUEST_URI = 'REQUEST_URI';

/**
 * @return Phifw_Routing
 */
    static function instance()
    {
        if (!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }

/**
 * @param array $routing_table
 * @return Phifw_Routing
 */
    function setRoutingTable($routing_table)
    {
        $this->routing_table = $routing_table;
        return $this;
    }
    
    /**
     * Set 404 controller
     * 
     * @param string $class
     * @param string $method
     * @return Phifw_Routing 
     */
    function set404Handler($class, $method = 'Index')
    {
        $this->error404 = array ($class, $method);
        return $this;
    }

    public function getPath()
    {
        $request_uri = $_SERVER[self::REQUEST_URI];
        list($path) = explode('?', $request_uri);
        return $path;
    }
    
/**
 *
 * @return array
 */
    function getController()
    {
        $path = $this->getPath();
        $url_parts = preg_split('!/!', $path, null, PREG_SPLIT_NO_EMPTY);
        foreach ($this->routing_table as $a){
            list($pattern, $class) = $a;
            $method = 'Index';
            if (isset($a[2])){
                $method = $a[2];
            }
            $p = array ();
            if (preg_match('!^'.$pattern.'$!', '/'.implode('/', $url_parts), $p)){
                array_shift($p);
                return array ($class, $method, $p);
            }
        }
        return $this->get404Handler();
    }
    
    
    function get404Handler()
    {
        return array ($this->error404[0], $this->error404[1], array ());
    }
}
