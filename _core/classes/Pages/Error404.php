<?php
/**
 * Nashe
 * 
 * @category Nashe
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Error404.php 132 2012-08-04 18:02:41Z rav $
 */
/**
 * Internal server error controller
 * 
 * @package Pages
 */
class Pages_Error404
{
    function index($e = null)
    {
        header("HTTP/1.1 404 Page Not Found");
        $template = Template::instance('404.tpl.php');
        $template->error = $e;
        $template->display();
    }
}
