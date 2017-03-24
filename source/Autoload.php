<?php

/**
 * CodeMommy AutoloadPHP
 * @author  Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP;

/**
 * Class Autoload
 * @package CodeMommy\AutoloadPHP
 */
class Autoload
{
    /**
     * Remove First Slash
     *
     * @param $string
     */
    private static function removeFirstSlash(&$string)
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
    private static function removeLastSlash(&$string)
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
    private static function replaceSlash(&$string)
    {
        $string = str_replace('\\', '/', $string);
    }

    /**
     * Load
     *
     * @param $path
     * @param $namespaceRoot
     */
    public static function load($path, $namespaceRoot)
    {
        spl_autoload_register(function ($className) use ($path, $namespaceRoot) {
            self::replaceSlash($path);
            self::removeLastSlash($path);
            self::replaceSlash($namespaceRoot);
            self::removeFirstSlash($namespaceRoot);
            self::removeLastSlash($namespaceRoot);
            self::replaceSlash($className);
            self::removeFirstSlash($className);
            self::removeLastSlash($className);
            if (substr($className, 0, strlen($namespaceRoot)) == $namespaceRoot) {
                $className = substr($className, strlen($namespaceRoot));
                self::removeFirstSlash($className);
            }
            $file = $path . '/' . $className . '.php';
            if (is_file($file)) {
                require_once($file);
            }
        });
    }

    /**
     * File
     *
     * @param $path
     * @param $name
     */
    public static function file($path, $name)
    {
        spl_autoload_register(function ($className) use ($path, $name) {
            self::replaceSlash($name);
            self::removeFirstSlash($name);
            self::removeLastSlash($name);
            self::replaceSlash($className);
            self::removeFirstSlash($className);
            self::removeLastSlash($className);
            if ($name == $className) {
                if (is_file($path)) {
                    require_once($path);
                }
            }
        });
    }
}