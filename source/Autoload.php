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
class Autoload implements AutoloadInterface
{
    /**
     * Autoload constructor.
     */
    public function __construct()
    {
    }

    /**
     * Directory
     * @param string $directory
     * @param string $namespaceRoot
     */
    public static function directory($directory = '.', $namespaceRoot = '')
    {
        spl_autoload_register(function ($className) use ($directory, $namespaceRoot) {
            $directory = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $directory);
            $directory = rtrim($directory, '/\\');
            $namespaceRoot = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $namespaceRoot);
            $namespaceRoot = trim($namespaceRoot, '/\\');
            $className = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $className);
            $className = trim($className, '/\\');
            if (substr($className, 0, strlen($namespaceRoot)) == $namespaceRoot) {
                $className = substr($className, strlen($namespaceRoot));
                $className = ltrim($className, '/\\');
            }
            $extensionList = array('php', 'class.php');
            foreach ($extensionList as $extension) {
                $file = $directory . DIRECTORY_SEPARATOR . $className . '.' . $extension;
                if (is_file($file) && is_readable($file)) {
                    require_once($file);
                }
            }
        });
    }

    /**
     * File
     * @param string $file
     * @param string $className
     */
    public static function file($file = '', $className = '')
    {
        spl_autoload_register(function ($name) use ($file, $className) {
            $className = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $className);
            $className = trim($className, '/\\');
            $name = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $name);
            $name = trim($name, '/\\');
            if ($className == $name) {
                if (is_file($file) && is_readable($file)) {
                    require_once($file);
                }
            }
        });
    }

    /**
     * Basic
     * @param string $file
     * @param bool $isOnce
     */
    public static function basic($file = '', $isOnce = true)
    {
        if (is_file($file) && is_readable($file)) {
            $isOnce ? require_once($file) : require($file);
        }
    }
}
