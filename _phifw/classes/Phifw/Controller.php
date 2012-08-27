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
 * @version $Id: Controller.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * 
 * @category Phifw
 * @package Phifw
 * @subpackage
 * @uses Phifw_Routing
 * @uses Phifw_Request
 */

class Phifw_Controller extends Phifw
{
        /**
     * @var Request
     */
    protected $post;
    /**
     * @var Request
     */
    protected $get;

    /**
     * @var Request
     */
    protected $request;

    function  __construct()
    {
        $this->post = new Phifw_Request($_POST);
        $this->get = new Phifw_Request($_GET);
        $this->request = new Phifw_Request($_REQUEST);
    }

    function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    function send404()
    {
        list($class, $method) = Phifw_Routing::instance()->get404Handler();
        $page = new $class();
        $page->$method();
        exit;
    }

    function redirect($uri)
    {
        header("Location: $uri");
        exit;
    }

}
