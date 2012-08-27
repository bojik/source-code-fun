<?php
/*
+---------------+--------------+------+-----+---------+----------------+
| comment_id    | int(11)      | NO   | PRI | NULL    | auto_increment |
| code_id       | int(11)      | YES  |     | NULL    |                |
| creation_date | datetime     | YES  |     | NULL    |                |
| comment       | text         | YES  |     | NULL    |                |
| author        | varchar(255) | YES  |     | NULL    |                |
+---------------+--------------+------+-----+---------+----------------+
 */
class Source_Comments
{
    protected $_codeId;

    const SQL_INSERT_COMMENT = "INSERT INTO comments (code_id, creation_date, author, comment, ip) VALUES (?, NOW(), ?, ?, ?)";
    const SQL_SELECT_COMMENTS = "SELECT * FROM comments WHERE code_id = ? ORDER BY code_id";

    function __construct($codeId)
    {
        $this->_codeId = $codeId;
    }

    function insert($name, $comment)
    {
        Db::instance()->execute(self::SQL_INSERT_COMMENT, array ($this->_codeId, $name, $comment, $_SERVER['REMOTE_ADDR']));
    }

    function select()
    {
        $rows = Db::instance()->getAll(self::SQL_SELECT_COMMENTS, array ($this->_codeId));
        return $rows;
    }
}
