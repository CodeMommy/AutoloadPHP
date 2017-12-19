<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP\Script;

use CodeMommy\TaskPHP\Console;
use CodeMommy\TaskPHP\FileSystem;

/**
 * Class CleanReport
 * @package CodeMommy\AutoloadPHP\Script;
 */
class CleanReport
{
    /**
     * CleanReport constructor.
     */
    public function __construct()
    {
    }

    /**
     * Start
     */
    public static function start()
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
