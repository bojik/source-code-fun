<?php
/**
 * Nashe
 * 
 * @category Phifm
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Template.php 61 2012-02-15 20:14:16Z rav $
 */
/**
 * 
 * @package
 * @subpackage
 */
class Template extends Phifw_Template
{
    /**
     * @param string $page
     * @return Template
     */
    static function instance($page)
    {
        $o = new self($page);
        return $o;
    }
    
    function _getTemplateDir()
    {
        return TEMPLATES_DIR;
    }
    
    function display()
    {
        header("Content-type:text/html;charset=UTF-8");
        parent::display();
    }
}
