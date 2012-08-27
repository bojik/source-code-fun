<?php
/**
 *
 * @category Source
 * @copyright (c) 2012 DevGu.ru.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id$
 */
class Source_Codes
{
/*
+---------------+---------------------------------+------+-----+---------+----------------+
| code_id       | int(11)                         | NO   | PRI | NULL    | auto_increment |
| author        | varchar(255)                    | YES  |     | NULL    |                |
| code          | text                            | YES  |     | NULL    |                |
| code_comment  | text                            | YES  |     | NULL    |                |
| lang          | enum('text','javascript','php') | YES  |     | NULL    |                |
| creation_date | datetime                        | YES  |     | NULL    |                |
| status        | int(11)                         | YES  |     | 0       |                |
| ip            | varchar(15)                     | YES  |     | NULL    |                |
+---------------+---------------------------------+------+-----+---------+----------------+
*/
    const SQL_INSERT = "INSERT INTO codes(author, code, lang, code_comment, creation_date, ip) VALUES(?, ?, ?, ?, NOW(), ?)";
    const SQL_SELECT = "SELECT *, (SELECT count(*) FROM comments WHERE code_id = c.code_id) AS comment_count FROM codes c WHERE %s ORDER BY creation_date DESC LIMIT ?, ?";
    const SQL_SELECT_BY_ID = "SELECT *, (SELECT count(*) FROM comments WHERE code_id = c.code_id) AS comment_count FROM codes c WHERE code_id = ?";
    const SQL_SELECT_COUNT = "SELECT count(*) FROM codes WHERE %s";

    static function insert($name, $code, $codeLang, $comment)
    {
        Db::instance()->execute(self::SQL_INSERT, array ($name, $code, $codeLang, $comment, $_SERVER['REMOTE_ADDR']));
        return Db::getLastInsertId();
    }

    static function getPublicItems($limit, $offset, $where = 1)
    {
        $sql = sprintf(self::SQL_SELECT, $where);
        $rows = Db::instance()->getAll($sql, array ($offset, $limit));
        return $rows;
    }

    static function getCount($where = 1)
    {
        $sql = sprintf(self::SQL_SELECT_COUNT, $where);
        return Db::instance()->getOne($sql);
    }

    static function getCountFilteredByLang($lang)
    {
        return self::getCount("lang = '".Db::escape($lang)."'");
    }

    static function getPublicItemsFilteredByLang($limit, $offset, $lang)
    {
        return self::getPublicItems($limit, $offset, "lang = '".Db::escape($lang)."'");
    }

    static function getCodeById($id)
    {
        return Db::instance()->getRow(self::SQL_SELECT_BY_ID, array($id));
    }

}