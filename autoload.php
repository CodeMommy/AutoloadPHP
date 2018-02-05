<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

require_once('library/Autoload.php');

use CodeMommy\AutoloadPHP\Library\Autoload;

$autoloaDirectory = array(
    'library' => 'CodeMommy\\AutoloadPHP\\Library',
    'class' => 'CodeMommy\\AutoloadPHP',
    'interface' => 'CodeMommy\\AutoloadPHP'
);

Autoload::directory($autoloaDirectory);
