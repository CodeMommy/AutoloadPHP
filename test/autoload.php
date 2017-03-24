<?php

/**
 * @author   Candison November <www.kandisheng.com>
 */

require_once(__DIR__ . '/../source/Autoload.php');

use CodeMommy\AutoloadPHP\Autoload;

Autoload::load(__DIR__, '');
Autoload::load(__DIR__, 'Root');
Autoload::file(__DIR__ . '/NamespaceThree/ClassThree.php', 'Root\NamespaceThree\ClassThree');

use NamespaceOne\ClassOne;
use Root\NamespaceTwo\ClassTwo;
use Root\NamespaceThree\ClassThree;

ClassOne::show();
ClassTwo::show();
ClassThree::show();