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
 * @version $Id: Container.php 12 2012-01-06 10:48:12Z rav $
 */

/**
 * Base container class
 * @category Phifw
 * @package Phifw
 */

class Phifw_Container extends Phifw
{
    private $params = array ();

    /**
     * Setter
     * @param string $name
     * @param mixed $value
     */
    function  __set($name, $value)
    {
        $this->setParam($name, $value);
    }

    /**
     * Getter
     * @param string $name
     * @return mixed
     */
    function  __get($name)
    {
        return $this->getParam($name);
    }

    /**
     * Checks if params is exists
     * @param string $name
     * @return boolean
     */
    function __isset($name)
    {
        return isset($this->params[$name]);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return Container
     */
    function setParam($name, $value)
    {
        $this->params[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    function getParam($name)
    {
        return !isset($this->params[$name]) ? null : $this->params[$name];
    }

    /**
     * Returns all params
     * @return array
     */
    function getParams()
    {
        return $this->params;
    }
    
}
