<?php
/**
 * Nashe
 * 
 * @category Nashe
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Lang.php 61 2012-02-15 20:14:16Z rav $
 */
class Lang extends Phifw_Config
{
    protected function getConfigPath()
    {
        $ret = CONFIGS_DIR.'/langs';
        return $ret;
    }
    
    static function getConfig($file_name)
    {
        return parent::getConfig($file_name, __CLASS__);
    }
    
    static function getLabel($label)
    {
        $o = self::getConfig(Config::getConfig('Lang')->DEFAULT_LANG);
        return $o->getValue($label);
    }
}
