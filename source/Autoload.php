<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP;

/**
 * Class Autoload
 * @package CodeMommy\AutoloadPHP
 */
class Autoload
{
    /**
     * Directory
     *
     * @param $directory
     * @param $namespaceRoot
     */
    public static function directory($directory, $namespaceRoot)
    {
        spl_autoload_register(function ($className) use ($directory, $namespaceRoot) {
            Tool::replaceSlash($directory);
            Tool::removeLastSlash($directory);
            Tool::replaceSlash($namespaceRoot);
            Tool::removeFirstSlash($namespaceRoot);
            Tool::removeLastSlash($namespaceRoot);
            Tool::replaceSlash($className);
            Tool::removeFirstSlash($className);
            Tool::removeLastSlash($className);
            if (substr($className, 0, strlen($namespaceRoot)) == $namespaceRoot) {
                $className = substr($className, strlen($namespaceRoot));
                Tool::removeFirstSlash($className);
            }
            $file = $directory . '/' . $className . '.php';
            if (is_file($file)) {
                require_once($file);
            }
        });
    }

    /**
     * File
     *
     * @param $file
     * @param $className
     */
    public static function file($file, $className)
    {
        spl_autoload_register(function ($name) use ($file, $className) {
            Tool::replaceSlash($className);
            Tool::removeFirstSlash($className);
            Tool::removeLastSlash($className);
            Tool::replaceSlash($name);
            Tool::removeFirstSlash($name);
            Tool::removeLastSlash($name);
            if ($className == $name) {
                if (is_file($file)) {
                    require_once($file);
                }
            }
        });
    }
}