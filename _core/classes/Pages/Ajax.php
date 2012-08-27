<?php
/**
 *
 * @category Source
 * @copyright (c) 2012 DevGu.ru.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Ajax.php 137 2012-08-27 18:21:52Z rav $
 */
/**
 * 
 * @package Pages
 * @subpackage
 */
class Pages_Ajax extends Pages
{
    function saveCode()
    {
        $obj = new stdClass();
        $obj->success = true;

        $errors = array ();

        $name = empty ($this->post->name) ? '' : trim($this->post->name);
        $code = empty ($this->post->code) ? '' : trim($this->post->code);
        $codeLang = empty ($this->post->code_language) ? 'none' : trim($this->post->code_language);
        $comment = empty ($this->post->comment) ? '' : trim($this->post->comment);

        if (empty ($name)){
            $errors['name'] = "Поле не может быть пустым";
        }

        if (empty ($code)){
            $errors['code'] = "Поле не может быть пустым";
        }

        if (!empty ($errors)){
            $obj->errors = $errors;
            $obj->success = false;
        } else {
            $this->_setName($name);
            Source_Codes::insert($name, $code, $codeLang, $comment);
        }

        Ajax::instance($obj)->sendResponse();
    }

    function postComment()
    {
        $obj = new stdClass();
        $obj->success = true;
        $errors = array ();
        $codeId = empty ($this->post->code_id) ? 0 : intval($this->post->code_id);
        $name = empty ($this->post->name) ? '' : trim($this->post->name);
        $comment = empty ($this->post->comment) ? '' : trim($this->post->comment);

        if (empty ($name)){
            $errors['name'] = "Поле не может быть пустым";
        }

        if (empty ($comment)){
            $errors['comment'] = "Поле не может быть пустым";
        }

        if (empty ($codeId)){
            $errors['code_id'] = "Поле не может быть пустым";
        }

        if (!empty ($errors)){
            $obj->errors = $errors;
            $obj->success = false;
        } else {
            $this->_setName($name);
            $helper = new Source_Comments($codeId);
            $helper->insert($name, $comment);
        }

        Ajax::instance($obj)->sendResponse();
    }

    function highlightCode()
    {
        $code = empty ($this->post->code) ? '' : trim($this->post->code);
        $lang = empty ($this->post->lang) ? '' : trim($this->post->lang);
//        geshi_highlight($code, $lang);
        echo Source_Highlight::getHtml($code, $lang);
    }

    protected function _setName($name)
    {
        setcookie('name', $name,  time()+60*60*24*30*365, '/');
    }
}
