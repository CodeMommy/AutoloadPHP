<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP\Script;

use CodeMommy\TaskPHP\Console;
use CodeMommy\TaskPHP\FileSystem;
use CodeMommy\TaskPHP\Composer;

/**
 * Class Command
 * @package CodeMommy\AutoloadPHP\Script;
 */
class Command
{
    /**
     * Command constructor.
     */
    public function __construct()
    {
    }

    /**
     * Update Version
     */
    public static function updateVersion()
    {
        $file = 'composer.json';
        $newVersion = Composer::updateVersion($file);
        Console::printLine(sprintf('Updated version to %s.', $newVersion), 'success');
    }

    /**
     * Clean Report
     */
    public static function cleanReport()
    {
        $removeList = array(
            '.report'
        );
        $result = FileSystem::remove($removeList);
        if ($result) {
            Console::printLine('Clean Report Finished.', 'success');
        } else {
            Console::printLine('Error.', 'error');
        }
    }
}
