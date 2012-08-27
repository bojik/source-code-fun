<?php
/**
 *
 * @category code.devgu.ru
 * @copyright (c) 2012 DevGu.ru.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Index.php 137 2012-08-27 18:21:52Z rav $
 */
/**
 * Index page controller
 *
 * @package Pages
 */
class Pages_Index extends Pages
{
    const TOTAL_ROWS_ON_PAGE = 10;

    function Index($lang = 'all', $page = 1)
    {
        if ($lang == 'all'){
            $total = Source_Codes::getCount();
        } else {
            $total = Source_Codes::getCountFilteredByLang($lang);
        }

        $totalPages = ceil($total / self::TOTAL_ROWS_ON_PAGE);
        $offset = ($page - 1) * self::TOTAL_ROWS_ON_PAGE;

        if ($lang == 'all'){
            $rows = Source_Codes::getPublicItems(self::TOTAL_ROWS_ON_PAGE, $offset);
        } else {
            $rows = Source_Codes::getPublicItemsFilteredByLang(self::TOTAL_ROWS_ON_PAGE, $offset, $lang);
        }

        $pagination = new Source_Pagination();
        $pages = $pagination->getHtml($page, $totalPages, '/l/'.$lang.'/%d');

        Template::instance('index.tpl.php')
            ->setParam('rows', $rows)
            ->setParam('pages', $pages)
            ->setParam('lang', $lang)
            ->display();
    }

    function displayCode($codeId)
    {
        $row = Source_Codes::getCodeById($codeId);
        $helper = new Source_Comments($codeId);
        $comments = $helper->select();
        Template::instance('code.tpl.php')
            ->setParam('row', $row)
            ->setParam('codeId', $codeId)
            ->setParam('name', $this->_getName())
            ->setParam('comments', $comments)
            ->display();
    }

    function postCode()
    {
        Template::instance('post.tpl.php')
            ->setParam('name', $this->_getName())
            ->display();
    }

    function displayConverter()
    {
        Template::instance('converter.tpl.php')
            ->display();
    }

    protected function _getName()
    {
        return empty($_COOKIE['name']) ? '' : htmlspecialchars($_COOKIE['name']);
    }
}
