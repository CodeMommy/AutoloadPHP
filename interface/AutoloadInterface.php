<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP;

/**
 * Interface AutoloadInterface
 * @package CodeMommy\AutoloadPHP
 */
interface AutoloadInterface
{
    /**
     * AutoloadInterface constructor.
     */
    public function __construct();

    /**
     * Directory
     * @param string $directory
     * @param string $namespaceRoot
     * @return mixed
     */
    public static function directory($directory = '.', $namespaceRoot = '');

    /**
     * File
     * @param string $file
     * @param string $className
     * @return mixed
     */
    public static function file($file = '', $className = '');

    /**
     * Basic
     * @param string $file
     * @param bool $isOnce
     * @return mixed
     */
    public static function basic($file = '', $isOnce = true);
}
