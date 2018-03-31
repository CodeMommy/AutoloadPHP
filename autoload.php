<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

require_once('library/Autoload.php');

use CodeMommy\AutoloadPHP\Library\Autoload;

$autoloadDirectory = array(
    'library' => 'CodeMommy\\AutoloadPHP\\Library',
    'interface' => 'CodeMommy\\AutoloadPHP',
    'class' => 'CodeMommy\\AutoloadPHP'
);

Autoload::directory($autoloadDirectory);
