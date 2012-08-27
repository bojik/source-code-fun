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
 * @version $Id: Template.php 136 2012-08-27 18:19:58Z rav $
 */

/**
 * Template engine
 * @category Phifw
 * @package Phifw
 */

abstract class Phifw_Template extends Phifw_Container
{
    private $page = '';

    function  __construct($page)
    {
        $this->page = $page;
    }

    /**
     * Include file to template
     * 
     * @param string $file
     * @param type $vars 
     */
    function includeFile($file, $vars = array())
    {
        $vars = array_merge($this->getParams(), $vars);
        extract($vars, EXTR_SKIP);
        include $this->_getTemplateDir().'/'.$file;
    }

    /**
     * Display page
     */
    function display()
    {
        $error_reporting = error_reporting(E_ALL^E_NOTICE);
        $this->includeFile($this->page);
        error_reporting($error_reporting);
    }

    /**
     * Returns html instead of displaying it
     */
    function fetch()
    {
        ob_start();
        $this->display();
        return ob_get_clean();
    }
    
    abstract function _getTemplateDir();
}