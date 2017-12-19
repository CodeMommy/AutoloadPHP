<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\AutoloadPHP\Script;

use CodeMommy\TaskPHP\Console;
use CodeMommy\TaskPHP\FileSystem;

/**
 * Class Clean
 * @package CodeMommy\AutoloadPHP\Script;
 */
class Clean
{
    /**
     * Clean constructor.
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
            Console::printLine('Clean Finished.', 'success');
        } else {
            Console::printLine('Clean Error.', 'error');
        }
    }
}
