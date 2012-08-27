<?php
/**
 * Phi Framework
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
 * @category Phifm
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Request.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * 
 * @category Phi_Framework
 * @package
 * @subpackage
 */
class Phifw_Request extends Phifw
{
    private $vars = array ();

    function  __construct($vars)
    {
        //$this->request;
        $this->vars = $vars;
    }

    function __get($name)
    {
        return $this->getParam($name);
    }

    function  __isset($name)
    {
        return isset($this->vars[$name]);
    }

    function getParam($name)
    {
        return !isset($this->vars[$name]) ? null : $this->vars[$name];
    }
    
}
