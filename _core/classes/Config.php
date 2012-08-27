<?php
/**
 * Nashe
 * 
 * @category Nashe
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Config.php 61 2012-02-15 20:14:16Z rav $
 */
/**
 * 
 * @category Nashe
 * @package
 * @subpackage
 */
class Config extends Phifw_Config
{
    protected function getConfigPath()
    {
        return CONFIGS_DIR;
    }
    
    static function getConfig($file_name)
    {
        return parent::getConfig($file_name, __CLASS__);
    }
}
