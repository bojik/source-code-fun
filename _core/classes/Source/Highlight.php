<?php
require_once CORE_ROOT.'/libs/geshi.php';

class Source_Highlight
{
    static function getHtml($source, $lang)
    {
        return geshi_highlight($source, $lang, null, true);
    }
}
