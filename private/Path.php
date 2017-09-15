<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace NotPublic;

/**
 * Class Path
 * @package NotPublic
 */
class Path
{
    /**
     * Replace Slash
     * @param $string
     */
    public static function replaceSlash(&$string)
    {
        $string = str_replace('\\', DIRECTORY_SEPARATOR, $string);
        $string = str_replace('/', DIRECTORY_SEPARATOR, $string);
    }
}