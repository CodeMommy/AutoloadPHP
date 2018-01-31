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
use Root\NamespaceFile\ClassFile;
use Root\NamespaceBasic\ClassBasic;

/**
 * Class AutoloadTest
 * @package Test
 */
class AutoloadTest extends TestCase
{
    /**
     * AutoloadTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test Construct
     */
    public function testConstruct()
    {
        new Autoload();
        $this->assertTrue(true);
    }

    /**
     * Test Directory
     * @return void
     */
    public function testDirectory()
    {
        $directory = __DIR__ . '/case/directory';
        Autoload::directory($directory, '');
        $this->assertEquals(ClassA::show(), 'ClassA');
        Autoload::directory($directory, 'Root');
        $this->assertEquals(ClassB::show(), 'ClassB');
        Autoload::directory($directory, 'Root');
        $this->assertEquals(ClassC::show(), 'ClassC');
    }

    /**
     * Test File
     * @return void
     */
    public function testFile()
    {
        $file = __DIR__ . '/case/file/ClassFile.php';
        Autoload::file($file, 'Root\NamespaceFile\ClassFile');
        $this->assertEquals(ClassFile::show(), 'ClassFile');
    }

    /**
     * Test Basic
     * @return void
     */
    public function testBasic()
    {
        $file = __DIR__ . '/case/basic/ClassBasic.php';
        // $isOnce = true
        Autoload::basic($file);
        $this->assertEquals(ClassBasic::show(), 'ClassBasic');
        // $isOnce = false
        Autoload::basic($file, false);
        Autoload::basic($file, false);
        $this->assertEquals(ClassBasic::show(), 'ClassBasic');
    }
}
