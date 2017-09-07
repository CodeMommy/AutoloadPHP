<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP;

/**
 * Class Tool
 * @package CodeMommy\AutoloadPHP
 */
class Tool
{
    /**
     * Remove First Slash
     *
     * @param $string
     */
    public static function removeFirstSlash(&$string)
    {
        if (substr($string, 0, 1) == '/') {
            $string = substr($string, 1);
        }
    }

    /**
     * Remove Last Slash
     *
     * @param $string
     */
    public static function removeLastSlash(&$string)
    {
        if (substr($string, -1) == '/') {
            $string = substr($string, 0, -1);
        }
    }

    /**
     * Replace Slash
     *
     * @param $string
     */
    public static function replaceSlash(&$string)
    {
        $string = str_replace('\\', '/', $string);
    }
}