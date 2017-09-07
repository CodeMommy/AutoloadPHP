<?php

/**
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use CodeMommy\AutoloadPHP\Autoload;
use NamespaceOne\ClassOne;
use Root\NamespaceTwo\ClassTwo;
use Root\NamespaceThree\ClassThree;

class AutoloadTest extends TestCase
{
    /**
     * Test Directory
     * @return void
     */
    public function testDirectoryClassOne()
    {
        Autoload::directory(__DIR__, '');
        $this->assertEquals(ClassOne::show(), 'ClassOne');
    }

    /**
     * Test Directory
     * @return void
     */
    public function testDirectoryClassTwo()
    {
        Autoload::directory(__DIR__, 'Root');
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