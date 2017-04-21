<?php

/**
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use CodeMommy\AutoloadPHP\Autoload;
use NamespaceOne\ClassOne;
use Root\NamespaceTwo\ClassTwo;
use Root\NamespaceThree\ClassThree;

class AutoloadTest extends TestCase
{
    /**
     * Test Load
     * @return void
     */
    public function testLoad1()
    {
        Autoload::load(__DIR__, '');
        $this->assertEquals(ClassOne::show(), 'ClassOne');
    }

    /**
     * Test Load
     * @return void
     */
    public function testLoad2()
    {
        Autoload::load(__DIR__, 'Root');
        $this->assertEquals(ClassTwo::show(), 'ClassTwo');
    }

    /**
     * Test File
     * @return void
     */
    public function testFile()
    {
        Autoload::file(__DIR__ . '/NamespaceThree/ClassThree.php', 'Root\NamespaceThree\ClassThree');
        $this->assertEquals(ClassThree::show(), 'ClassThree');
    }
}