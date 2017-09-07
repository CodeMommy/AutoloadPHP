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
     * Remove First Slash
     * @param $string
     */
    public static function removeFirstSlash(&$string)
    {
        if (substr($string, 0, 1) == '/' || substr($string, 0, 1) == '\\') {
            $string = substr($string, 1);
            self::removeFirstSlash($string);
        }
    }

    /**
     * Remove Last Slash
     * @param $string
     */
    public static function removeLastSlash(&$string)
    {
        if (substr($string, -1) == '/' || substr($string, -1) == '\\') {
            $string = substr($string, 0, -1);
            self::removeLastSlash($string);
        }
    }

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