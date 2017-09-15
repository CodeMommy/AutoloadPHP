<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP;

require_once(__DIR__ . '/../private/Path.php');

use NotPublic\Path;

/**
 * Class Autoload
 * @package CodeMommy\AutoloadPHP
 */
class Autoload
{
    /**
     * Directory
     * @param $directory
     * @param $namespaceRoot
     */
    public static function directory($directory, $namespaceRoot)
    {
        spl_autoload_register(function ($className) use ($directory, $namespaceRoot) {
            Path::replaceSlash($directory);
            $directory = rtrim($directory, '/\\');
            Path::replaceSlash($namespaceRoot);
            $namespaceRoot = trim($namespaceRoot, '/\\');
            Path::replaceSlash($className);
            $className = trim($className, '/\\');
            if (substr($className, 0, strlen($namespaceRoot)) == $namespaceRoot) {
                $className = substr($className, strlen($namespaceRoot));
                $className = ltrim($className, '/\\');
            }
            $extensionList = array('php', 'class.php');
            foreach ($extensionList as $extension) {
                $file = $directory . '/' . $className . '.' . $extension;
                if (is_file($file)) {
                    require_once($file);
                }
            }
        });
    }

    /**
     * File
     * @param $file
     * @param $className
     */
    public static function file($file, $className)
    {
        spl_autoload_register(function ($name) use ($file, $className) {
            Path::replaceSlash($className);
            $className = trim($className, '/\\');
            Path::replaceSlash($name);
            $name = trim($name, '/\\');
            if ($className == $name) {
                if (is_file($file)) {
                    require_once($file);
                }
            }
        });
    }

    /**
     * Basic
     * @param $file
     * @param bool $isOnce
     */
    public static function basic($file, $isOnce = true)
    {
        if (is_file($file)) {
            if ($isOnce) {
                require_once($file);
            } else {
                require($file);
            }
        }
    }
}