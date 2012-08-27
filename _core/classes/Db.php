<?php
/**
 * Nashe
 * 
 * 
 * @category Nashe
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Db.php 137 2012-08-27 18:21:52Z rav $
 */
class Db
{
    /**
     * @var ADOConnection
     */
    static private $_db;
    
    static function instance()
    {
        if (!(self::$_db instanceof ADOConnection)){
            $config = Config::getConfig('Db')->DB;
            $o = new Phifw_Db($config['DRIVER'], 
                              $config['HOST'], 
                              $config['USER'], 
                              $config['PASSWORD'], 
                              $config['DB'], 
                              $config['PORT']);
            self::$_db = $o->createConnection();
        }
        return self::$_db;
    }
    
    static function getVariables()
    {
        $res = self::instance()->getAll('SHOW VARIABLES');
        return $res;
    }

    /**
     * Returns last insert id
     *
     * @static
     * @return mixed
     */
    static function getLastInsertId()
    {
        return self::instance()->getOne("SELECT LAST_INSERT_ID();");
    }

    static function escape($str)
    {
        return mysql_real_escape_string($str);
    }
}
