<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use CodeMommy\AutoloadPHP\Autoload;
use NamespaceA\ClassA;
use Root\NamespaceB\ClassB;
use Root\NamespaceC\ClassC;
use Root\NamespaceD\ClassD;
use Root\NamespaceE\ClassE;

/**
 * Class AutoloadTest
 * @package Test
 */
class AutoloadTest extends TestCase
{
    /**
     * Test Directory
     * @return void
     */
    public function testDirectoryClassA()
    {
        Autoload::directory(__DIR__, '');
        $this->assertEquals(ClassA::show(), 'ClassA');
    }

    /**
     * Test Directory
     * @return void
     */
    public function testDirectoryClassB()
    {
        Autoload::directory(__DIR__, 'Root');
        $this->assertEquals(ClassB::show(), 'ClassB');
    }

    /**
     * Test Directory
     * @return void
     */
    public function testDirectoryClassC()
    {
        Autoload::directory(__DIR__, 'Root');
        $this->assertEquals(ClassC::show(), 'ClassC');
    }

    /**
     * Test File
     * @return void
     */
    public function testFile()
    {
        Autoload::file(__DIR__ . '/NamespaceD/ClassD.php', 'Root\NamespaceD\ClassD');
        $this->assertEquals(ClassD::show(), 'ClassD');
    }

    /**
     * Test Basic
     * @return void
     */
    public function testBasic()
    {
        Autoload::basic(__DIR__ . '/NamespaceE/ClassE.php');
        $this->assertEquals(ClassE::show(), 'ClassE');
    }
}