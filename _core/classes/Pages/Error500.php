<?php
/**
 * Nashe
 * 
 * @category Nashe
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Error500.php 61 2012-02-15 20:14:16Z rav $
 */
/**
 * Internal server error controller
 * 
 * @package Pages
 */
class Pages_Error500
{
    function index($e)
    {
        header("HTTP/1.1 500 Internal Server Error");
        $template = Template::instance('500.tpl.php');
        $template->error = $e;
        $template->display();
    }
}
