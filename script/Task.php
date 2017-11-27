<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP\Script;

use Symfony\Component\Filesystem\Filesystem;

/**
 * Class Task
 * @package CodeMommy\AutoloadPHP\Script;
 */
class Task
{
    /**
     * Task constructor.
     */
    public function __construct()
    {
    }

    /**
     * Print Line
     * @param string $text
     * @param string $type
     */
    private static function printLine($text = '', $type = 'normal')
    {
        $colorList = array(
            'normal' => '0',
            'information' => '1;34',
            'success' => '1;32',
            'warning' => '1;33',
            'error' => '1;31'
        );
        $color = isset($colorList[$type]) ? $colorList[$type] : $colorList['normal'];
        $string = sprintf('%s[%sm%s%s[0m%s', chr(27), $color, $text, chr(27), PHP_EOL);
        echo($string);
    }

    /**
     * Update Version
     */
    public static function updateVersion()
    {
        $file = 'composer.json';
        $composer = file_get_contents($file);
        $composer = json_decode($composer, true);
        $version = $composer['version'];
        $version = explode('.', $version);
        $version[2] = intval($version[2]) + 1;
        $version = implode('.', $version);
        $composer['version'] = $version;
        $composer = json_encode($composer, JSON_PRETTY_PRINT);
        $composer = str_replace('\\/', '/', $composer);
        file_put_contents($file, $composer);
        self::printLine(sprintf('Updated version to %s.', $version), 'success');
    }

    /**
     * Clean Report
     */
    public static function cleanReport()
    {
        $removeList = array(
            '.report'
        );
        $fileSystem = new Filesystem();
        foreach ($removeList as $value) {
            $fileSystem->remove($value);
        }
        self::printLine('Clean Report Finished.', 'success');
    }
}