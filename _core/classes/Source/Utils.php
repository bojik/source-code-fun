<?php
class Source_Utils
{
    static function escapeText($text)
    {
        $text = preg_replace('!(\r?\n){2,}!', "\\1", $text);
        return nl2br(htmlspecialchars($text));
    }

    static function formatDate($date)
    {
        $time = strtotime($date);
        return date("d.m.Y H:i", $time);
    }
}
