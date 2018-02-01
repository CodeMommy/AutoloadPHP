<?php

/**
 * CodeMommy AutoloadPHP
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

namespace CodeMommy\AutoloadPHP\Test;

use CodeMommy\AutoloadPHP\Autoload;
use NamespaceA\ClassA;
use Root\NamespaceB\ClassB;
use Root\NamespaceC\ClassC;
use Root\NamespaceFile\ClassFile;

/**
 * Class AutoloadTest
 * @package CodeMommy\AutoloadPHP\Test
 */
class AutoloadTest extends BaseTest
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
        $directory = $this->getTestCasePath('directory');
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
        $file = $this->getTestCasePath('file/ClassFile.php');
        Autoload::file($file, 'Root\NamespaceFile\ClassFile');
        $this->assertEquals(ClassFile::show(), 'ClassFile');
    }
}
